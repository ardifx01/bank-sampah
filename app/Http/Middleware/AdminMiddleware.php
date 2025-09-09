<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- TAMBAHKAN BARIS INI
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah login DAN rolenya adalah 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') { // Diubah menggunakan Auth Facade
            // Jika ya, izinkan akses ke halaman berikutnya
            return $next($request);
        }

        // Jika tidak, arahkan kembali ke dashboard dengan pesan error
        return redirect('/dashboard')->with('error', 'Anda tidak punya akses ke halaman ini.');
    }
}