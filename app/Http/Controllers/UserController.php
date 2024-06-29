<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Petugas';

        $users = User::role('Petugas')->get();
        return view('user.index', compact('title', 'users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'user_status' => 'active',
        ]);

        $user->assignRole('Petugas');

        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan data petugas');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function updateUserStatus(Request $request, $id)
    {
        $users = User::findOrFail($id);

        if ($request->status == 'active') {
            $users->user_status = 'active';
        } elseif ($request->status == 'inactive') {
            $users->user_status = 'inactive';
        }

        $users->save();

        return redirect()->route('petugas.index')->with('success', 'Status petugas berhasil diperbarui');
    }
}
