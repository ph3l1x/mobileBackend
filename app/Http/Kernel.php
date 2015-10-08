<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $middleware = [
      \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
      \App\Http\Middleware\EncryptCookies::class,
      \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
      \Illuminate\Session\Middleware\StartSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      \App\Http\Middleware\Cors::class
        // \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    protected $routeMiddleware = [
      'auth' => \App\Http\Middleware\Authenticate::class,
      'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
      'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
      'jwt.auth' => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
      'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class
    ];
}