<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   public function store(Request $request)
{
    $request->validate([
        'employee_id' => ['required', 'string', 'max:50', 'unique:users'],
        'name' => ['required', 'string', 'max:255'],
        'department' => ['required', 'string', 'max:255'],
        'role' => ['required', 'string'],
        'password' => ['required', 'confirmed'],
    ]);

    $user = User::create([
        'employee_id' => $request->employee_id,
        'name' => $request->name,
        'department' => $request->department,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')
        ->with('success', 'Registration successful. Please login.');
}
}
