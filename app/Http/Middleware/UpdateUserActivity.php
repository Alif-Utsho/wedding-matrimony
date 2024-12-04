<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserActivity {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {

        if (Auth::guard('user')->check() || Auth::guard('api')->check()) {
            $userId = Auth::guard('user')->id() ?? Auth::guard('api')->id();

            $user = User::find($userId);

            if ($user) {
                $user->last_active   = Carbon::now();
                $user->active_status = true;
                $user->save();
            }

        }

        User::where(function ($query) {
            $query->where('last_active', '<', Carbon::now()->subMinute(2))
                  ->orWhereNull('last_active');
        })->update(['active_status' => false]);

        return $next($request);

    }

}
