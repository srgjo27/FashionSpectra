<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// root
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('do_register');
Route::post('/login', [AuthController::class, 'login'])->name('do_login');

Route::middleware(['auth'])->group(function () {
    // admin route
    Route::prefix('admin')->group(function () {
        // admin dashboard route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.admin.dashboard');

        // admin product route
        Route::get('/product-clothes', [ProductController::class, 'indexClothes'])->name('auth.admin.product-clothes');
        Route::get('/product-shoes', [ProductController::class, 'indexShoes'])->name('auth.admin.product-shoes');
        Route::get('/product/create', [ProductController::class, 'create'])->name('auth.admin.product.create');
        Route::post('/product', [ProductController::class, 'store'])->name('auth.admin.product.store');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('auth.admin.product.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('auth.admin.product.update');
        Route::delete('/product/{id}/delete', [ProductController::class, 'destroy'])->name('auth.admin.product.delete');
        Route::get('/product/{id}/show', [ProductController::class, 'show'])->name('auth.admin.product.show');

        Route::get('/logout', [AuthController::class, 'logout'])->name('do_logout');
    });

    // user route
    Route::prefix('user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.user.dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('do_logout');
    });
});
