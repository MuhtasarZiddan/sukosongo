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
    if (auth()->user()->hasRole('superadmin')) {
        $roles = Role::orderBy('name')->get();
    } elseif (auth()->user()->hasRole('admin')) {
        $roles = Role::whereIn('name', ['admin', 'operator'])
            ->orderBy('name')
            ->get();
    } else {
        abort(403, 'Anda tidak memiliki akses.');
    }

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
        'role' => 'required|exists:roles,name',
    ]);

    // Role yang diizinkan
    if (auth()->user()->hasRole('superadmin')) {
        $allowedRoles = Role::pluck('name')->toArray();
    } elseif (auth()->user()->hasRole('admin')) {
        $allowedRoles = ['admin', 'operator'];
    } else {
        abort(403, 'Anda tidak memiliki akses.');
    }

    // Cegah manipulasi request
    if (!in_array($request->role, $allowedRoles)) {
        abort(403, 'Anda tidak diizinkan membuat user dengan role tersebut.');
    }

    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make($request->password),
    ]);

    $user->assignRole($request->role);

    return redirect()
        ->route('users.index')
        ->with('success', 'User berhasil ditambahkan.');
}

    /**
     * Show the form for editing the specified resource.
     */
public function edit(User $user)
{
    if (auth()->user()->hasRole('superadmin')) {
        $roles = Role::orderBy('name')->get();
    } elseif (auth()->user()->hasRole('admin')) {
        $roles = Role::whereIn('name', ['admin', 'operator'])
            ->orderBy('name')
            ->get();

        // Admin tidak boleh mengedit user Super Admin
        if ($user->hasRole('Super Admin')) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah Super Admin.');
        }
    } else {
        abort(403, 'Anda tidak memiliki akses.');
    }

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
        'role' => 'required|exists:roles,name',
    ]);

    // Tentukan role yang boleh dipilih
    if (auth()->user()->hasRole('Super Admin')) {
        $allowedRoles = Role::pluck('name')->toArray();
    } elseif (auth()->user()->hasRole('Admin')) {
        $allowedRoles = ['Admin', 'Operator'];

        // Admin tidak boleh mengedit Super Admin
        if ($user->hasRole('Super Admin')) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah Super Admin.');
        }
    } else {
        abort(403, 'Anda tidak memiliki akses.');
    }

    // Cegah manipulasi request
    if (!in_array($request->role, $allowedRoles)) {
        abort(403, 'Anda tidak diizinkan memberikan role tersebut.');
    }

    $user->name = $request->name;
    $user->username = $request->username;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    $user->syncRoles([$request->role]);

    return redirect()
        ->route('users.index')
        ->with('success', 'User berhasil diperbarui.');
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
