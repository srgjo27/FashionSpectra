<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function index()
    {
        return view('pages.auth.login');
    }

    public function registerPage()
    {
        return view('pages.auth.registration');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_or_email' => 'required',
            'password' => 'required|min:8',
        ], [
            'username_or_email.required' => 'Username atau email harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter.',
        ]);

        $loginField = filter_var($request->username_or_email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $request->username_or_email,
            'password' => $request->password,
        ];

        $errorMessage = 'Invalid credentials.';

        if ($loginField === 'email') {
            $errorMessage = 'Email atau password salah.';
        } elseif ($loginField === 'username') {
            $errorMessage = 'Username atau password salah.';
        }

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('auth.admin.dashboard');
            } elseif (Auth::user()->role === 'user') {
                return redirect()->route('auth.user.home');
            }
        }

        return redirect()->back()->withInput($request->only('username_or_email'))->withErrors([
            'login_error' => $errorMessage,
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:20|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'confirm_email' => 'required|same:email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ], [
            'name.required' => 'Nama harus diisi.',
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username harus memiliki setidaknya 3 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 20 karakter.',
            'username.unique' => 'Username telah digunakan.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email telah digunakan.',
            'confirm_email.required' => 'Konfirmasi email harus diisi.',
            'confirm_email.same' => 'Konfirmasi email harus sama dengan email.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter.',
            'confirm_password.required' => 'Konfirmasi password harus diisi.',
            'confirm_password.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Akun berhasil didaftarkan!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
