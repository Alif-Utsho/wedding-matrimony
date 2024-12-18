<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function login() {
        return view('frontend.auth.login');
    }

    public function login_submit(Request $request) {

        $request->validate([
            // 'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (isset($request->email) && isset($request->password) && !empty($request->email) && !empty($request->password)) {
            $credentials = $request->only('email', 'password');
        } elseif (isset($request->phone) && isset($request->password) && !empty($request->phone) && !empty($request->password)) {
            $credentials = $request->only('phone', 'password');
        }

        $remember = $request->has('remember');

        if (Auth::guard('user')->attempt($credentials, $remember)) {

            if ($request->ajax()) {
                return response()->json(['success' => true], 200);
            }

            return redirect()->intended('user/dashboard');
        }

        if ($request->ajax()) {
            return response()->json([
                'errors' => [
                    'email' => ['The provided credentials do not match our records.'],
                ],
            ], 422);
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email', 'remember'));
    }

    public function register() {
        return view('frontend.auth.register');
    }

    public function registerSubmit(Request $request) {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email|max:255',
            'phone'       => 'required|numeric|digits_between:10,15',
            'profile_for' => 'nullable|string|max:50',
            'password'    => 'required|string|min:6',
            'agree'       => 'accepted',
        ]);

        $userService = new UserService();
        $user        = $userService->createUser($request->all());

        Auth::guard('user')->login($user);

        return redirect()->intended('user/dashboard');
    }

    public function logout(Request $request) {
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Toastr::success('You have been successfully logged out.');

        return redirect()->route('user.login');
    }

}
