<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Models\UserPackage;
use Carbon\Carbon;
use App\Enums\PaymentStatus;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Toastr;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $package = Package::findOrFail($request->package_id);
        $user = Auth::guard('user')->user();

        $expirationDate = Carbon::now()->addDays($package->duration);

        $payment = PackagePayment::create([
            'user_id' => $user->id,
            'transaction_id' => null,
            'package_name' => $package->name,
            'amount' => $package->price,
            'duration' => $package->duration,
            'expired_at' => $expirationDate,
            'status' => PaymentStatus::PAID,
        ]);

        $userPackage = UserPackage::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'payment_id' => $payment->id,
            'expired_at' => $expirationDate,
        ]);


        Toastr::success('Subscription successful!');
        return redirect()->route('user.plan');
    }
}
