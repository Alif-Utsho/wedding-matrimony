<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\PackagePayment;
use App\Models\User;
use App\Services\PushNotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function dashboard() {

        $data             = [];
        $today_registered = User::whereStatus(true)->whereDate('created_at', Carbon::today())
            ->count();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek   = Carbon::now()->endOfWeek();

        $weeklyRegistered = User::whereStatus(true)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $users = User::whereStatus(true)->count();

        $platinumEarnings = PackagePayment::where('package_name', 'Platinum')->sum('amount');
        $goldEarnings     = PackagePayment::where('package_name', 'Gold')->sum('amount');
        $totalEarnings    = $platinumEarnings + $goldEarnings;

        $monthlyEarnings = [];
        $currentYear     = Carbon::now()->year;

        for ($month = 1; $month <= 12; $month++) {
            $monthlyEarnings[$month] = PackagePayment::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->sum('amount');
        }

        $userList = User::whereStatus(true)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        $sevenDaysAgo = Carbon::today()->subDays(7);
        $today        = Carbon::today();

        $subscriptions = PackagePayment::with('user')
            ->whereBetween('expired_at', [$sevenDaysAgo, $today])
            ->where('status', 'Paid')
            ->get();


        $data['users']            = $users;
        $data['today_registered'] = $today_registered;
        $data['totalEarnings']    = $totalEarnings;
        $data['monthlyEarnings']  = $monthlyEarnings;
        $data['weeklyRegistered'] = $weeklyRegistered;
        $data['platinumEarnings'] = $platinumEarnings;
        $data['goldEarnings']     = $goldEarnings;
        $data['userList']         = $userList;
        $data['subscriptions']    = $subscriptions;

        return view('backend.dashboard.index', $data);
    }

    public function pushNotification() {
        $users = User::whereStatus(true)->get();

        return view('backend.dashboard.push-notification', compact('users'));
    }

    public function pushNotificationSend(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $notification = [
            'title'  => $validated['title'],
            'body'   => $validated['body'],
            'userId' => $request->send_to,
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
