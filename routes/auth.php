<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthenticateController::class, 'create'])->name('login');
Route::post('login', [AuthenticateController::class, 'store'])->name('login.store');

Route::get('register', [RegisteredUserController::class, 'create']);
Route::get('register', [RegisteredUserController::class, 'store']);

Route::group(['middleware' => ['web', 'auth']], function () {
   Route::post('logout', [AuthenticateController::class, 'destroy'])->name('logout');
});

