<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::all();
        return view('pages.web.home.main', ['users' => $users, 'products' => $products]);
    }
}
