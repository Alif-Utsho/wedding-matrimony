<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller {

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $phoneOrEmail = $request->input('email');
        $password     = $request->input('password');

        $isEmail = filter_var($phoneOrEmail, FILTER_VALIDATE_EMAIL);

        try {

            if ($isEmail) {
                $credentials = ['email' => $phoneOrEmail, 'password' => $password];
            } else {
                $credentials = ['phone' => $phoneOrEmail, 'password' => $password];
            }

            if (!$token = Auth::guard('api')->attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json([
            'success'    => true,
            'token_type' => 'bearer',
            'token'      => $token,
        ]);
    }

    public function loginWithPhone(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'phone'    => 'required',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $phoneOrEmail = $request->input('phone');
        $password     = $request->input('password');

        try {

            if ($phoneOrEmail) {
                $credentials = ['phone' => $phoneOrEmail, 'password' => $password];
            }

            if (!$token = Auth::guard('api')->attempt($credentials)) {

                return response()->json(['error' => 'Invalid credentials'], 401);
            }

        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json([
            'success'    => true,
            'token_type' => 'bearer',
            'token'      => $token,
        ]);
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email|max:255',
            'phone'       => 'required|numeric|digits_between:10,15',
            'profile_for' => 'nullable|string|max:50',
            'password'    => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $userService = new UserService();
        $user        = $userService->createUser($request->all());

        $phoneOrEmail = $request->input('email');
        $password     = $request->input('password');

        if ($user) {
            $credentials = ['email' => $phoneOrEmail, 'password' => $password];
        } else {
            $credentials = ['phone' => $phoneOrEmail, 'password' => $password];
        }

        $token = Auth::guard('api')->attempt($credentials);

        return response()->json([
            'status' => 'success',
            'user'   => $user,
            'token'  => $token,
        ], 201);
    }

    public function logout() {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

}
