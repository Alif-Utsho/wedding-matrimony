<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function subscribe(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id' => 'required|integer',
            'package_id' => 'required|integer',
        ]);

        $userId = Auth::guard('api')->id();
        dd($userId);
        $this->subscriptionService->subscribe($userId, $request->id, $request->package_id);

        Toastr::success('Subscription successful!');

        return redirect()->route('user.plan');

    }
}
