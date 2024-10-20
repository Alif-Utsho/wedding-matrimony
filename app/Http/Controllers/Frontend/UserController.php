<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Hobby;
use App\Models\User;
use App\Models\UserCareer;
use App\Models\UserHobby;
use App\Models\UserProfile;
use App\Models\UserSocialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function index() {
        return view('frontend.user.dashboard');
    }

    public function profileEdit() {
        $user    = User::find(Auth::guard('user')->id());
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();
        $cities  = City::whereStatus(true)->orderBy('name', 'ASC')->get();

        return view('frontend.user.profile-edit', compact('user', 'hobbies', 'cities'));
    }

    public function profileEditSubmit(Request $request) {
        // Validate the request
        $request->validate([
            'name'         => 'required|string|max:200',
            'gender'       => 'required|string',
            'city_id'      => 'required|string',
            'birth_date'   => 'required|date',
            'height'       => 'required|numeric|min:30|max:300',
            'weight'       => 'required|numeric|min:10|max:300',
            'fathers_name' => 'required|string|max:200',
            'mothers_name' => 'required|string|max:200',
            'address'      => 'required|string|max:255',
            'type'         => 'required|string',
            'company_name' => 'nullable|string|max:200',
            'salary'       => 'nullable|string|max:20',
            'experience'   => 'nullable|string|max:20',
            'degree'       => 'nullable|string|max:200',
            'college'      => 'nullable|string|max:200',
            'school'       => 'nullable|string|max:200',
            'whatsApp'     => 'nullable|string|max:200',
            'facebook'     => 'nullable|string|max:200',
            'instagram'    => 'nullable|string|max:200',
            'x'            => 'nullable|string|max:200',
            'youtube'      => 'nullable|string|max:200',
            'linkedin'     => 'nullable|string|max:200',
            'hobbies'      => 'nullable|array',
        ]);

        $userId = Auth::guard('user')->id();
// Get the current logged-in user ID

        // Update user_profiles table
        $userProfile = UserProfile::updateOrCreate(
            ['user_id' => $userId],
            [
                'gender'       => $request->gender,
                'city_id'      => $request->city_id,
                'birth_date'   => $request->birth_date,
                'height'       => $request->height,
                'weight'       => $request->weight,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'address'      => $request->address,
                'age'          => $request->age,
            ]
        );

        UserCareer::updateOrCreate(
            ['user_id' => $userId, 'user_profile_id' => $userProfile->id],
            [
                'type'         => $request->type,
                'company_name' => $request->company_name,
                'salary'       => $request->salary,
                'experience'   => $request->experience,
                'degree'       => $request->degree,
                'college'      => $request->college,
                'school'       => $request->school,
            ]
        );

        UserHobby::where('user_profile_id', $userProfile->id)->delete();

        // Add new hobbies
        if ($request->hobbies) {
            foreach ($request->hobbies as $hobbyId) {
                UserHobby::create([
                    'user_id'         => $userId,
                    'user_profile_id' => $userProfile->id,
                    'hobby_id'        => $hobbyId,
                ]);
            }

        }

        UserSocialmedia::updateOrCreate(
            ['user_id' => $userId, 'user_profile_id' => $userProfile->id],
            [
                'whatsApp'  => $request->whatsApp,
                'facebook'  => $request->facebook,
                'instagram' => $request->instagram,
                'youtube'   => $request->youtube,
                'linkedin'  => $request->linkedin,
                'x'         => $request->x,
            ]
        );

        return redirect('/user/dashboard')->with('success', 'Profile Updated Successfully');
    }

}
