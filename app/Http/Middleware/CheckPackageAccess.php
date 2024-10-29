<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Toastr;



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
            Toastr::error('Please login first!');
            return redirect('/user/login')->with('error', 'Please login first');
        }

        $package = $user->currentPackage();
        $accesses = $package ? $package->accesses->pluck('name')->toArray() : [];

        if (!$package || !in_array($feature, $accesses)) {
            Toastr::error('Upgrade to access this feature!');
            return redirect('/plans');
        }

    
        return $next($request);
    }
}
