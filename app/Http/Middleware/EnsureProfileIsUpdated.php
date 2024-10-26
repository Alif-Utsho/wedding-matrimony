<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class EnsureProfileIsUpdated
{
    
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('user')->user();
        if (!$user->profile || !$user->profile->isComplete()) {
            if (!$request->is('user/profile-edit') && !$request->is('user/profile-edit-submit')) {
                if ($request->ajax()) {
                    return response()->json([
                        'message' => 'Profile incomplete',
                        'redirect_url' => route('user.profileEdit')
                    ], 403); 
                }

                return redirect()->route('user.profileEdit')->with('error', 'Please update your profile to continue.');
            }
            // return redirect()->route('user.profileEdit')->with('error', 'Please update your profile to continue.');
        }

        return $next($request);
    }
}
