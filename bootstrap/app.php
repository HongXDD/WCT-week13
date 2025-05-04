<?php

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
<<<<<<< HEAD
        $middleware->validateCsrfTokens(except: ['*']);
=======
        //
>>>>>>> 5b8bdf94fa502fad8db313ef38140d5d119705f9
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
