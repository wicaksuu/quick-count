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
        // Definisikan kebijakan keamanan konten (CSP)
        $policy = "default-src 'self';"; // Izin semua sumber daya dari domain aplikasi sendiri

        // Tambahkan domain yang diperbolehkan (whitelist)
        $allowedDomains = [
            'example.com',
            'subdomain.example.com',
        ];

        foreach ($allowedDomains as $domain) {
            // Menambahkan domain ke whitelist untuk sumber daya CSS, gambar, dan skrip
            $policy .= "style-src 'self' $domain;"; // CSS
            $policy .= "img-src 'self' $domain;"; // Gambar
            $policy .= "script-src 'self' $domain;"; // Skrip
            // Anda dapat menambahkan kebijakan untuk jenis sumber daya lainnya seperti font, media, dll. sesuai kebutuhan
        }

        // Set header CSP pada respons
        $response = $next($request);
        $response->header('Content-Security-Policy', $policy);

        return $response;
    }



}
