<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    // Redirection op basis van gebruikersrol (rolename)
    $role = Auth::user()->rolename;

    return match ($role) {
        'tandarts'           => redirect()->route('tandarts.index'),
        'assistent'          => redirect()->route('assistent.index'),
        'mondhygienist'      => redirect()->route('mondhygienist.index'),
        'patient'            => redirect()->route('patient.index'),
        'praktijkmanagement' => redirect()->route('praktijkmanagement.index'),
        default              => redirect()->intended(route('dashboard', absolute: false)),
    };
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
