<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Controleren of de gebruiker is ingelogd
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Controleren of de rol van de gebruiker overeenkomt met de vereiste rol
        if (Auth::user()->rolename !== $role) {
            abort(403, 'Onbevoegde toegang. Je hebt niet de juiste rol.');
        }

        return $next($request);
    }
}