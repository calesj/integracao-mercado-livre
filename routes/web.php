<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['middleware' => ['ml.auth', 'ml.checkToken']], function () {
        /** Produtos */
        Route::resource('products', ProductController::class);
    });
});

include __DIR__.'/auth.php';
include __DIR__.'/mercadolivre.php';
