<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use app\Models\User;

class CheckIfBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Closure $next next page to go to
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() &&  Auth::user()->isBanned) {
            Auth::logout();
            return redirect()->route('login')
                ->with('error', 'Votre compte a été banni.');
        }
        return $next($request);
    }
}
