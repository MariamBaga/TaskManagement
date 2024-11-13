<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //

    public function markAsRead($notificationId)
{
    $notification = Auth::user()->notifications()->where('id', $notificationId)->first();
    $notification->markAsRead();
    return back();
}

}
