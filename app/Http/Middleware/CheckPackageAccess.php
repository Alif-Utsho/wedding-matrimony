<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Toastr;
use App\Models\Package;
use App\Models\User;

class CheckPackageAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $feature): Response
    {
        $user = Auth::guard('user')->user();
        if(!$user){
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Please login first!',
                    'redirect_url' => url('/plans')
                ], 403);
            }

            Toastr::error('Please login first!');
            return redirect('/user/login')->with('error', 'Please login first');
        }

        $access = true;

        if($feature === 'profile-view'){
            $profile = User::where('slug', $request->route('slug'))->first();

            if (!$profile->canViewProfile($user)) {
                $access = false;
            }
        }

        if($feature === 'send-interest'){
            $recipient = User::findOrFail($request->input('userId'));

            if (!$recipient->canReceiveInterestRequests()) {
                $access = false;
            }
        }

        if (!$user->hasAccessTo($feature)) {
            $access = false;
        }

        if(!$access){
            if ($request->ajax() || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Upgrade to access this feature!',
                    'redirect_url' => url('/plans')
                ], 403); 
            }

            Toastr::error('Upgrade to access this feature!');
            return redirect('/plans');
        }

        return $next($request);
    }
}
