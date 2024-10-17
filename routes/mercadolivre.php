<?php

use App\Http\Controllers\MLController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'ml'], function () {
    Route::get('oauth', [MLController::class, 'oauth'])->name('oauth');
    Route::get('access-token/{code}', [MLController::class, 'accessToken'])->name('access-token');
});

