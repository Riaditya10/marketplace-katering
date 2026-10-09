<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['role:merchant'])->prefix('merchant')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\MerchantController::class, 'dashboard'])->name('merchant.dashboard');
        Route::get('/profile', [App\Http\Controllers\MerchantController::class, 'profile'])->name('merchant.profile');
        Route::post('/profile', [App\Http\Controllers\MerchantController::class, 'updateProfile'])->name('merchant.profile.update');
        Route::get('/menus', [App\Http\Controllers\MerchantController::class, 'menus'])->name('merchant.menus');
        Route::get('/menus/create', [App\Http\Controllers\MerchantController::class, 'createMenu'])->name('merchant.menus.create');
        Route::post('/menus', [App\Http\Controllers\MerchantController::class, 'storeMenu'])->name('merchant.menus.store');
        Route::get('/menus/{menu}/edit', [App\Http\Controllers\MerchantController::class, 'editMenu'])->name('merchant.menus.edit');
        Route::put('/menus/{menu}', [App\Http\Controllers\MerchantController::class, 'updateMenu'])->name('merchant.menus.update');
        Route::delete('/menus/{menu}', [App\Http\Controllers\MerchantController::class, 'deleteMenu'])->name('merchant.menus.destroy');
        Route::get('/orders', [App\Http\Controllers\MerchantController::class, 'orders'])->name('merchant.orders');
        Route::get('/invoices/{invoice}', [App\Http\Controllers\MerchantController::class, 'invoice'])->name('merchant.invoice');
    });

    Route::middleware(['role:customer'])->prefix('customer')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\CustomerController::class, 'dashboard'])->name('customer.dashboard');
        Route::get('/search', [App\Http\Controllers\CustomerController::class, 'search'])->name('customer.search');
        Route::get('/merchant/{merchant}', [App\Http\Controllers\CustomerController::class, 'catalog'])->name('customer.catalog');
        Route::post('/orders', [App\Http\Controllers\CustomerController::class, 'storeOrder'])->name('customer.orders.store');
        Route::get('/orders', [App\Http\Controllers\CustomerController::class, 'orders'])->name('customer.orders');
        Route::get('/invoices/{invoice}', [App\Http\Controllers\CustomerController::class, 'invoice'])->name('customer.invoice');
    });
});
