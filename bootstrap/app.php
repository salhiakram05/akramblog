<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\GuestUser;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\TrustProxies;
use Illuminate\Http\Request;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' => GuestUser::class,
            'auth' => AuthUser::class
        ]);
        $middleware->trustProxies(at: '*');

    })
->create();
