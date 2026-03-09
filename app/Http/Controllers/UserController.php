<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form to create a user
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'department' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'department' => $request->department,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('users.index')
            ->with('success','User account created successfully.');
    }

    /**
     * Show the form for editing a user
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update a user
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'department' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'department' => $request->department,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()->route('users.index')
            ->with('success','User updated successfully.');
    }

    /**
     * Delete a user
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully.');
    }
}