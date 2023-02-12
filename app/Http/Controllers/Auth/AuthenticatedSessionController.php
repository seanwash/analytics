<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return Inertia::render('signin');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)) {
            return redirect()->back()->withErrors([
                'email' => "The provided credentials don't match our records.",
            ]);
        }

        $request->session()->regenerate();

        return Inertia::location(
            redirect()->intended(
                route('websites.index')
            )
        );
    }
}
