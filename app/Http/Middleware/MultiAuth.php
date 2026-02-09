<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MultiAuth
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Ambil guard dari session jika tidak dikirim
        $guard = $guard ?? session('guard');

        if ($guard && Auth::guard($guard)->check()) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
