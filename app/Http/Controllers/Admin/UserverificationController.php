<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserverificationController extends Controller {

    public function manage(Request $request) {

        $userQuery = User::whereHas('profile');

        if ($request->status == 'pending') {
            $userQuery->where('verified', 0);
        } elseif ($request->status == 'verified') {
            $userQuery->where('verified', 1);
        }

        $users = $userQuery->whereNotNull('verified')->latest()->get();

        return view('backend.user.verification-pending', compact('users'));
    }

    public function verify(Request $request) {
        
        $request->validate([
            'verification_id' => 'required|exists:user_verifications,id',
        ]);

        $userVerification = UserVerification::find($request->verification_id);

        if (!$userVerification) {
            return redirect()->back()->with('error', 'Verification record not found.');
        }

        $userVerification->status = 1;
        $userVerification->save();

        $user = User::find($userVerification->user_id);

        if ($user) {
            $user->verified = 1;
            $user->save();
        }

        Toastr::success('Account verified successfully');

        return redirect()->back();
    }

    public function delete($id) {
        $userverificaion = UserVerification::findOrFail($id);
        User::find($userverificaion->user_id)->update(['verified' => null]);

        if ($userverificaion->image && File::exists(public_path($userverificaion->image))) {
            File::delete(public_path($userverificaion->image));
        }

        if ($userverificaion->image_back && File::exists(public_path($userverificaion->image_back))) {
            File::delete(public_path($userverificaion->image_back));
        }

        $userverificaion->delete();

        Toastr::success('Verification deleted Successfully');

        return redirect()->back();
    }

}
