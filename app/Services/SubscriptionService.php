<?php

namespace App\Services;

use App\Enums\PaymentStatus;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;

class SubscriptionService {
    public function subscribe($userId, $package_id) {
        $package = Package::findOrFail($package_id);
        $user    = User::find($userId);

        $expirationDate = Carbon::now()->addDays($package->duration);

        $payment = PackagePayment::create([
            'user_id'        => $user->id,
            'transaction_id' => null,
            'package_name'   => $package->name,
            'amount'         => $package->price,
            'duration'       => $package->duration,
            'expired_at'     => $expirationDate,
            'status'         => PaymentStatus::PAID,
        ]);

        $userPackage = UserPackage::create([
            'user_id'    => $user->id,
            'package_id' => $package->id,
            'payment_id' => $payment->id,
            'expired_at' => $expirationDate,
        ]);
    }
}
