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
        session_start();
        $ip = $request->getClientIp();

        if ($request->method() === 'GET') {
            Session::forget($ip);
        }

        $data = Session::get('visitor', []);

        if (!in_array($ip, $data)) {
            $data[] = $ip;
            Session::put('visitor', $data);
        }
        return $next($request);
    }
}
