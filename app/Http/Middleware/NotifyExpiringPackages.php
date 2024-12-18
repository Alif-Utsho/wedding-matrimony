<?php

namespace App\Http\Middleware;

use App\Models\NotificationHistory;
use App\Models\User;
use App\Models\UserPackage;
use App\Services\PushNotificationService;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotifyExpiringPackages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $notificationDaysBefore = 3;

        $currentDate = Carbon::now();
        $expirationThreshold = $currentDate->clone()->addDays($notificationDaysBefore);

        $expiringPackages = UserPackage::where('expired_at', '<=', $expirationThreshold)
            ->where('expired_at', '>', $currentDate)
            ->get();

        foreach ($expiringPackages as $package) {
            $user = User::find($package->user_id);

            if ($user) {
                $title = "Package Expiry Warning";
                $message = "Your package will expire on " . Carbon::parse($package->expired_at)->format('Y-m-d') . ". Please renew to continue.";

                $alreadyNotified = NotificationHistory::where('user_id', $user->id)
                    ->whereDate('created_at', '=', $currentDate->toDateString())
                    ->where('title', $title)
                    ->exists();

                if (!$alreadyNotified) {

                    $notification = [
                        "title"  => $title,
                        "body"   => $message,
                        "userId" => $user->id,
                    ];
                    PushNotificationService::send($notification);
                }
            }
        }

        return $next($request);
    }
}
