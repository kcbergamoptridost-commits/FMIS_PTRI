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
    
    public function create(): View
    {
        return view('auth.login');
    }

   
    public function store(Request $request)
{
    $request->validate([
        'employee_id' => ['required', 'string'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt([
        'employee_id' => $request->employee_id,
        'password' => $request->password
    ])) {
        return back()->withErrors([
            'employee_id' => 'Invalid Employee ID or password.',
        ]);
    }

    $request->session()->regenerate();

    return redirect()->intended('/dashboard');
}

    
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
