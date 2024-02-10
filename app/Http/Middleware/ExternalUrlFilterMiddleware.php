<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExternalUrlFilterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Hanya memeriksa permintaan untuk file statis (CSS, JS, gambar)
        if ($this->isStaticFile($request)) {
            // Mendapatkan URL dari permintaan
            $url = $request->url();

            // Memeriksa apakah URL eksternal
            if ($this->isExternalUrl($url)) {
                // Daftar URL yang diizinkan
                $allowedUrls = [
                    'https://example.com', // Ganti dengan URL yang diizinkan
                    // Tambahkan URL lain yang diizinkan jika diperlukan
                ];

                // Memeriksa apakah URL termasuk dalam daftar yang diizinkan
                if (!in_array($url, $allowedUrls)) {
                    // Jika tidak, kembalikan respons dengan pesan error atau tindakan lain yang diinginkan
                    return response()->json(['error' => 'Akses ke URL eksternal tidak diizinkan.'], 403);
                }
            }
        }

        // Jika permintaan bukan untuk file statis atau diizinkan, lanjutkan permintaan
        return $next($request);
    }

    // Metode untuk memeriksa apakah permintaan adalah permintaan untuk file statis (CSS, JS, gambar)
    private function isStaticFile($request)
    {
        return preg_match('/\.(css|js|jpg|jpeg|png|gif|ico|svg)$/i', $request->getPathInfo());
    }

    // Metode untuk memeriksa apakah URL adalah URL eksternal
    private function isExternalUrl($url)
    {
        return parse_url($url, PHP_URL_HOST) !== parse_url(config('app.url'), PHP_URL_HOST);
    }

}
