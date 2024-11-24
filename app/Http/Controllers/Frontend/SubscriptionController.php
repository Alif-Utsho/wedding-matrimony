<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller {
    protected $subscriptionService;

    function __construct(SubscriptionService $subscriptionService) {
        $this->subscriptionService = $subscriptionService;
    }

    public function subscribe(Request $request) {
        $request->validate([
            'package_id' => 'required|integer',
        ]);

        $userId = Auth::guard('user')->id();

        $this->subscriptionService->subscribe($userId, $request->package_id);

        Toastr::success('Subscription successful!');

        return redirect()->route('user.plan');
    }
}
