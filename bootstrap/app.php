<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\IpCheck;
use App\Http\Middleware\EveningCheck;
use App\Http\Middleware\RedirectIfAuthenticatedUser;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('checkMid',[
            AgeCheck::class,
            AdminCheck::class,
            IpCheck::class,
            EveningCheck::class,
        ]);
        $middleware->alias(['ifAuthenticated' => RedirectIfAuthenticatedUser::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
