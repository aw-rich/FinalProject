<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        return view('users.create');
    }

    public function store(Request $request)
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,staff,customer'],
        ]);

        User::create([
            ...$data,
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,staff,customer'],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
