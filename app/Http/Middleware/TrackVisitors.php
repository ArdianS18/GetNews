<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        $visitorsKey = 'visitors';

        if (!Cache::has($visitorsKey)) {
            Cache::put($visitorsKey, []);
        }

        $visitors = Cache::get($visitorsKey);

        if (!in_array($ipAddress, $visitors)) {
            $visitors[] = $ipAddress;
            Cache::put($visitorsKey, $visitors);
        }

        return $next($request);
    }
}
