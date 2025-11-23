<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaticTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('X-STATIC-TOKEN');
        $validToken = env('STATIC_TOKEN', 'changeme');

        if ($token !== $validToken) {
            return response()->json([
                'message' => 'Invalid static token'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
