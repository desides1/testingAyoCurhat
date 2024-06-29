<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Petugas';

        $status = $request->input('status');
        $query = User::role('Petugas');

        if ($status == 'active') {
            $query->where('user_status', 'active');
        } elseif ($status == 'inactive') {
            $query->where('user_status', 'inactive');
        }

        $users = $query->get();

        return view('user.index', compact('title', 'users', 'status'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Petugas');

        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan data petugas');
    }

    public function show(User $user)
    {
        $title = 'Detail Petugas';

        return view('user.show', compact('title', 'user'));
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
            'email' => 'required|email',
            'phone_number' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Data petugas berhasil diperbarui');
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

        return redirect()->route('users.index')->with('success', 'Status petugas berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data petugas berhasil dihapus');
    }
}
