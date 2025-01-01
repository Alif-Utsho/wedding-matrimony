<?php

namespace App\Services;

use App\Enums\PaymentStatus;
use App\Models\PackagePayment;
use App\Models\SpecialPackageCategory;
use App\Models\SubPackage;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;

class SubscriptionService {

    public function subscribe($userId, $id, $package_id) {

        $package = SubPackage::with('package')->findOrFail(['id' => $id, 'package_id' => $package_id]);

        $user = User::find($userId);

        $expirationDate = Carbon::now()->addDays($package->duration);

        $payment = PackagePayment::create([
            'user_id'        => $user->id,
            'transaction_id' => null,
            'package_name'   => $package->package->name,
            'amount'         => $package->price,
            'duration'       => $package->duration,
            'expired_at'     => $expirationDate,
            'status'         => PaymentStatus::PAID,
        ]);

        UserPackage::create([
            'user_id'    => $user->id,
            'package_id' => $package->package_id,
            'sub_pkg_id' => $package->id,
            'payment_id' => $payment->id,
            'expired_at' => $expirationDate,
        ]);
    }

    public function subscribeSpecialPackage($userId, $id) {

        $package = SpecialPackageCategory::with('specialpackage')->find($id);
        $user    = User::find($userId);
        
        $expirationDate = Carbon::now()->addDays($package->duration);

        $payment = PackagePayment::create([

            'user_id'        => $user->id,
            'transaction_id' => null,
            'package_name'   => $package->specialpackage->name,
            'amount'         => $package->price,
            'duration'       => $package->duration,
            'expired_at'     => $expirationDate,
            'status'         => PaymentStatus::PAID,
        ]);

        UserPackage::create([
            'user_id'    => $user->id,
            'package_id' => $package->special_id,
            'sub_pkg_id' => $package->id,
            'payment_id' => $payment->id,
            'expired_at' => $expirationDate,
        ]);
    }
}
