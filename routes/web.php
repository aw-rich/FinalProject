

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/', [AuthController::class, 'login'])->name('home');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->middleware('role:admin');


    Route::get('/customer/dashboard', function () {
        return view('dashboard.customer');
    })->middleware('role:customer');

    Route::resource('products', ProductController::class)->except(['show']);
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    Route::resource('users', UserController::class)->middleware('role:admin');
});
