<?php

use App\Http\Middleware\CheckAndRefreshMLToken;
use App\Http\Middleware\CheckMLAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'ml.checkToken' => CheckAndRefreshMLToken::class, // Atualiza o token automaticamente
            'ml.auth' => CheckMLAuth::class // Verifica se o usuario já fez autenticação oauth no mercado livre
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
