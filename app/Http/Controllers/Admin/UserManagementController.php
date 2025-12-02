<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        // Ambil daftar user dengan pagination
        $users = User::orderBy('name', 'asc')->paginate(5);

        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()
            ->route('admin.users')
            ->with('success', 'Role user berhasil diperbarui.');
    }


    public function destroy(User $user)
    {
        // Jangan hapus diri sendiri
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }
}
