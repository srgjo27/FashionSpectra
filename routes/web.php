<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController as UserProduct;
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
Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Authentication route
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::post('/register', [AuthController::class, 'register'])->name('do_register');
    Route::post('/login', [AuthController::class, 'login'])->name('do_login');

    // Guest route
    Route::get('/product', [UserProduct::class, 'index'])->name('user.product');
    Route::get('/product/{id}/show', [UserProduct::class, 'show'])->name('user.product.show');

    Route::middleware(['auth'])->group(function () {
        // admin route
        Route::prefix('admin')->group(function () {
            // admin dashboard route
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('auth.admin.dashboard');

            // admin product route
            Route::get('/product-clothes', [AdminProduct::class, 'indexClothes'])->name('auth.admin.product-clothes');
            Route::get('/product-shoes', [AdminProduct::class, 'indexShoes'])->name('auth.admin.product-shoes');
            Route::get('/product-accessories', [AdminProduct::class, 'indexAccessories'])->name('auth.admin.product-accessories');
            Route::get('/product-beauty', [AdminProduct::class, 'indexBeauty'])->name('auth.admin.product-beauty');
            Route::get('/product/create', [AdminProduct::class, 'create'])->name('auth.admin.product.create');
            Route::get('/product/create/{id}', [AdminProduct::class, 'getSizeProduct']);
            Route::post('/product', [AdminProduct::class, 'store'])->name('auth.admin.product.store');
            Route::get('/product/{id}/edit', [AdminProduct::class, 'edit'])->name('auth.admin.product.edit');
            Route::put('/product/{id}', [AdminProduct::class, 'update'])->name('auth.admin.product.update');
            Route::delete('/product/{id}/delete', [AdminProduct::class, 'destroy'])->name('auth.admin.product.delete');
            Route::get('/product/{id}/show', [AdminProduct::class, 'show'])->name('auth.admin.product.show');

            Route::get('/logout', [AuthController::class, 'logout'])->name('do_logout');
        });

        // user route
        Route::prefix('user')->group(function () {
            // user home route
            Route::get('/home', [HomeController::class, 'index'])->name('auth.user.home');

            // user product route
            Route::get('/product', [UserProduct::class, 'index'])->name('auth.user.product');
            Route::get('/product/{id}/show', [UserProduct::class, 'show'])->name('auth.user.product.show');

            Route::get('/logout', [AuthController::class, 'logout'])->name('do_logout');
        });
    });
});
