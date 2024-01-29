<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;
use Symfony\Component\HttpFoundation\Response;

class DumyPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $isDumy): Response
    {
        switch ($isDumy) {
            case 'false':
                $isDumy = false;
                break;

            default:
                $isDumy = true;
                break;
        }
        if (Auth::user()->is_dumy == $isDumy) {
            return $next($request);
        }else{
            Toaster::error('Mohon merubah password anda, masukkan password dari admin dan password baru.');
            return redirect(route('profile.show'));
        }
    }
}
