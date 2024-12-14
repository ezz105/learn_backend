<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    
    {
        $roles = Role::all(); // Fetch roles from the database
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed', // min:8
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'role_id' => 'required|exists:roles,id', // Validate against roles table
            'status' => 'nullable|in:active,inactive', // Optional validation for user status
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone'], // Matches 'phone' from validation
            'address' => $validated['address'],
            'role_id' => $validated['role_id'], // Set the selected role
            'status' => $validated['status'] ?? 'active', // Default status
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }
}
