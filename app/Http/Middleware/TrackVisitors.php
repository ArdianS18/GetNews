<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $ip = $request->getClientIp();

        dd($ip);
        $visitors = Session::get('visitors', []);

        if (!in_array($ip, $visitors)) {
            $visitors[] = $ip;
            Session::put('visitors', $visitors);
        }

        return $next($request);
    }
}
