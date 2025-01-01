<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPackage;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller {
    protected $subscriptionService;

    function __construct(SubscriptionService $subscriptionService) {
        $this->subscriptionService = $subscriptionService;
    }

    public function subscribe(Request $request) {
        $validator = Validator::make($request->all(), [
            'id'         => 'required|integer',
            'package_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'Validation failed',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userId = Auth::guard('api')->id();

        $this->subscriptionService->subscribe($userId, $request->id, $request->package_id);

        return response()->json([
            'status'  => 'success',
            'message' => 'Successfully subscribed',
        ], Response::HTTP_OK);
    }

    public function subscribeSpecial(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'Validation failed',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userId = Auth::guard('api')->id();

        $this->subscriptionService->subscribeSpecialPackage($userId, $request->id);

        return response()->json([
            'status'  => 'success',
            'message' => 'Successfully subscribed',
        ], Response::HTTP_OK);
    }

    public function currentPackage() {

        $user        = User::find(Auth::guard('api')->id());
        $userPackage = UserPackage::with('specialcategory', 'subpackage')->where('user_id', $user->id)
            ->where('expired_at', '>', now())
            ->latest()
            ->first();

// if ($userPackage) {

//     $package = Package::find($userPackage->package_id);

// } else {

//     $package = Package::where('price', 0)->first();
        // }

        return response()->json([
            'status' => 'success',
            'data'   => [
                'subscription' => $userPackage,
            ],
        ], Response::HTTP_OK);
    }

}
