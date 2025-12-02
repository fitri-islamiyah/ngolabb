<?php

namespace App\Helpers;

use App\Models\Notification;

class Notify
{
    public static function send($userId, $title, $message, $url = null)
    {
        Notification::create([
            'user_id' => $userId,
            'title'   => $title,
            'message' => $message,
            'url'     => $url,
            'is_read' => false,
        ]);
    }
}
