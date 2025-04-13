<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');


Route::prefix('vendors')->group(function () {
    Route::get('register', [VendorController::class, 'create']);
    Route::post('register', [VendorController::class, 'store']);
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('vendors', [VendorController::class, 'index']);
    Route::post('vendors/{vendor}/approve', [VendorController::class, 'approve']);
});

Route::resource('products', ProductController::class);
