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
            return redirect()->route('profile.edit')->with('error', 'Please update your profile to continue.');
        }

        return $next($request);
    }
}
