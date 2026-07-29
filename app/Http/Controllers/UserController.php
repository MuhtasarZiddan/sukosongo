<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::with('roles');

        if (!auth()->user()->hasRole('superadmin')) {
            $query->whereDoesntHave('roles', function ($q) {
                $q->where('name', 'superadmin');
            });
        }
        $users = $query->latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,name'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole($request->role);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required|exists:roles,name'
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Tidak boleh menghapus akun sendiri
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        // Tidak boleh menghapus Super Admin terakhir
        if (
            $user->hasRole('super_admin') &&
            User::role('super_admin')->count() === 1
        ) {
            return back()->with(
                'error',
                'Minimal harus ada satu Super Admin.'
            );
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
