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
         // Mendapatkan IP pengguna
         $ip = $request->ip();

         // Mendapatkan semua IP yang sudah disimpan dalam sesi
         $visitors = Session::get('visitors', []);

         // Jika IP pengguna belum ada dalam sesi, tambahkan dan tambahkan satu ke jumlah pengunjung
         if (!in_array($ip, $visitors)) {
             $visitors[] = $ip;
             Session::put('visitors', $visitors);
         }

         return $next($request);
    }
}
