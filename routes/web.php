<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MLController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthenticateController::class, 'create'])->name('login');
Route::post('login', [AuthenticateController::class, 'store'])->name('login.store');

Route::get('ml-access', [AuthenticateController::class, 'accessToken']);

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['middleware' => ['ml.auth']], function () {
        Route::get('categories', [MLController::class, 'categories'])->name('ml.categories');

        /** Produtos */
        Route::resource('products', ProductController::class);
    });
});

include __DIR__.'/auth.php';
include __DIR__.'/mercadolivre.php';
