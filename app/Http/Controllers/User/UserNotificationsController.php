<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotificationsController extends Controller
{
    public function notifications()
    {
        $notifications = user_notification::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('user.notification.notificationList', compact('notifications'));
    }


    public function notifications_status_change(Request $request)
    {
        $notification = user_notification::where('id', $request->user_noti_id)->first();
        $notification->is_view = 2;
        $notification->save();
        return back()->with('success', 'Notification Marked as Read');
    }

}
