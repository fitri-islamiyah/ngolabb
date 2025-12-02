<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('notifications.index', compact('notifications'));
    }

    public function read(Notification $notification)
    {
        // hanya user pemilik yang boleh baca
        if ($notification->user_id !== auth()->id()) {
            abort(403);
        }

        $notification->is_read = true;
        $notification->save();

        // Jika URL ada → arahkan ke URL itu
        if ($notification->url) {
            return redirect($notification->url);
        }

        // fallback kalau tidak ada URL
        return redirect()->route('dashboard');
    }




    public function markAll()
    {
        Notification::where('user_id', auth()->id())
            ->update(['is_read' => true]);

        return back()->with('success', 'Semua notifikasi telah dibaca.');
    }

}
