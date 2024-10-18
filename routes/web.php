<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth']], function () {


    Route::group(['middleware' => ['ml.auth', 'ml.checkToken']], function () {
        Route::get('/', [ProductController::class, 'index'])->name('dashboard.index');
        Route::get('products/create', [ProductController::class, 'index'])->name('products.create');
        Route::post('products/store', [ProductController::class, 'index'])->name('products.store');
    });
});

include __DIR__.'/auth.php';
include __DIR__.'/mercadolivre.php';
