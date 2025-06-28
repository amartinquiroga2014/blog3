<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\http\Middleware\TrimStrings;
use Illuminate\Auth\Middleware\RedirectIftAuthenticated;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\CommentsForbiddenWords;
use App\Http\Middleware\TestMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        TrimStrings::except([
             'clave',
        ]);

        RedirectIfAuthenticated::redirectUsing(function ($request) {
                return route('admin');             // /admin
        });

        // $middleware->web(CommentsForbiddenWords::class);
        $middleware->web(TestMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
