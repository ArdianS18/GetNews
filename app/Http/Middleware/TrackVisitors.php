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
        $ipList = $request->ips();

        $visitors = Session::get('visitor', []);

        foreach ($ipList as $ip) {
            if (!in_array($ip, $visitors)) {
                $visitors[] = $ip; // Menambahkan IP baru ke daftar pengunjung jika belum ada
            }
        }

        return $next($request);
    }
}
