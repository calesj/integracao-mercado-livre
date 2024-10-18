<?php
/*
 * Este código foi desenvolvido como parte de um processo seletivo.
 * Desenvolvido por Cales Junes em Outubro de 2024.
 * Todos os direitos reservados. Este código não pode ser reutilizado ou distribuído sem permissão.
 */


use App\Http\Controllers\MLController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'ml'], function () {
    Route::get('oauth', [MLController::class, 'oauth'])->name('oauth');
    Route::get('access-token/{code}', [MLController::class, 'accessToken'])->name('access-token');
});

