<?php

use App\Http\Controllers\AuthenticateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticateController::class, 'index']);

Route::get('ml-access', [AuthenticateController::class, 'accessToken']);
