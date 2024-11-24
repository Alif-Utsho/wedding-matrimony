<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware {
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string {
        return $request->expectsJson() ? null : route('user.login');
    }

    protected function unauthenticated($request, array $guards) {

        if ($request->is('api/*')) {
            abort(response()->json(['message' => 'Please login first.'], 401));
        }

        parent::unauthenticated($request, $guards);
    }

}
