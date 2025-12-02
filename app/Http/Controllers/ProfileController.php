<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Halaman utama profil
    public function show()
    {
        return view('profile.show');
    }

    // Halaman edit profil
    public function edit()
    {
        return view('profile.edit');
    }

    // Update profil
    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = auth()->user();
        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    // Halaman ganti password
    public function password()
    {
        return view('profile.password');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Password berhasil diperbarui!');
    }
}
