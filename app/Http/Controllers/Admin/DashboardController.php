<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PushNotificationService;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function dashboard() {
        return view('backend.dashboard.index');
    }

    public function pushNotification (){
        $users = User::whereStatus(true)->get();
        return view('backend.dashboard.push-notification', compact('users'));
    }

    public function pushNotificationSend(Request $request){
        $validated = $request->validate([
            'send_to' => 'required|exists:users,id',
            'title'   => 'required|string|max:255',
            'body'    => 'required|string',
        ]);

        $notification = [
            'title'  => $validated['title'],
            'body'   => $validated['body'],
            'userId' => $validated['send_to'],
        ];

        try {
            PushNotificationService::send($notification);

            Toastr::success('Notification sent successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error('Failed to send notification: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
