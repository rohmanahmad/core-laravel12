<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // ...existing code...
    ];

    protected $middlewareGroups = [
        'web' => [
            // ...existing code...
        ],

        'api' => [
            // ...existing code...
        ],
    ];

    protected $routeMiddleware = [
        // ...existing code...
        'rate.limiter' => \App\Http\Middleware\RateLimiterMiddleware::class,
        'jwt.auth' => \App\Http\Middleware\JwtAuthMiddleware::class,
        'static.token' => \App\Http\Middleware\StaticTokenMiddleware::class,
    ];
}
