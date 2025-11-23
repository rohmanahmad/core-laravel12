<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RateLimiterMiddleware
{
    protected $maxAttempts = 60;
    protected $decaySeconds = 60;

    public function handle(Request $request, Closure $next)
    {
        $maxAttempts = $this->maxAttempts;
        $decaySeconds = $this->decaySeconds;

        // Support custom values via middleware parameters
        $params = func_get_args();
        if (isset($params[2]) && is_numeric($params[2])) {
            $maxAttempts = (int) $params[2];
        }
        if (isset($params[3]) && is_numeric($params[3])) {
            $decaySeconds = (int) $params[3];
        }

        $key = $this->resolveRequestKey($request);
        $attempts = Cache::get($key, 0);

        if ($attempts >= $maxAttempts) {
            return response()->json([
                'message' => 'Too Many Requests'
            ], Response::HTTP_TOO_MANY_REQUESTS);
        }

        Cache::put($key, $attempts + 1, $decaySeconds);
        return $next($request);
    }

    protected function resolveRequestKey(Request $request)
    {
        return 'rate_limit:' . $request->ip();
    }
}
