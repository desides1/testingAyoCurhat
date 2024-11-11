<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        } elseif ($status) {
            return redirect()->route('users.index');
        }

        $users = $query->get();

        return view('user.index', compact('title', 'users', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
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

        session()->flash('success', 'Data berhasil disimpan!');

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
            'name' => 'required',
            'password' => 'nullable',
            'email' => 'nullable',
            'phone_number' => 'nullable',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Data petugas berhasil diperbarui');
    }

    public function indexProfile(User $user)
    {
        $title = 'Profil Saya';

        return view('user.index-profile', compact('title', 'user'));
    }

    public function editProfile(User $user)
    {
        $title = 'Edit Profil Saya';

        return view('user.edit-profile', compact('title', 'user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'phone_number' => 'nullable',
            'complete_address' => 'nullable',
        ]);

        User::find(auth()->user()->id)->update([
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'complete_address' => $request->complete_address,
        ]);

        return redirect()->route('users.profile');
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

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
