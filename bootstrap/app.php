<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\UserAuthenticator;
use App\Http\Middleware\GerenteAuthenticator;
use App\Http\Middleware\AdminAuthenticator;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'user' => UserAuthenticator::class,
            'gerente' => GerenteAuthenticator::class,
            'admin' => AdminAuthenticator::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
