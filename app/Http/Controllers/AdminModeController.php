<?php

namespace App\Http\Controllers;

class AdminModeController extends Controller
{
    public function toggle()
    {
        $current = session('admin_mode', 'admin');

        $new = $current === 'admin' ? 'user' : 'admin';

        session(['admin_mode' => $new]);

        return back()->with('success', 'Mode diubah ke ' . strtoupper($new));
    }
}
