<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Models\User;
use App\Models\UserSocialmedia;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsermanageController extends Controller {
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function manage(Request $request) {
        $userQuery = User::whereHas('profile')->latest();

        if ($request->plan) {
            $package = Package::where('name', $request->plan)->first();

            if ($package) {
                $users = $userQuery->get();

                $users = $users->filter(function ($user) use ($package) {
                    return $user->currentPackage()->id === $package->id;
                });

                return view('backend.user.manage', compact('users'));
            }

        }

        $users = $userQuery->get();

        return view('backend.user.manage', compact('users'));
    }

    public function incomplete() {
        $users = User::doesntHave('profile')->latest()->get();

        return view('backend.user.incomplete', compact('users'));
    }

    public function add() {
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();

        return view('backend.user.add', compact('hobbies'));
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'name'            => 'required|string|max:200',
            'email'           => 'required|email|string',
            'phone'           => 'required|string|min:11|max:16|unique:users',
            'password'        => 'required|string',
            'bio'             => 'required',
            'gender'          => 'required|string',
            'city_id'         => 'required|string',
            'sub_district'    => 'nullable|string',
            'religion'        => 'required|string',
            'language'        => 'required|string',
            'birth_date'      => 'required|date',
            'height'          => 'required|numeric|min:30|max:300',
            'weight'          => 'required|numeric|min:10|max:300',
            'fathers_name'    => 'required|string|max:200',
            'mothers_name'    => 'required|string|max:200',
            'address'         => 'required|string|max:255',
            'type'            => 'required|string',
            'profile_for'     => 'nullable|string|max:50',
            'working_with'    => 'nullable|string|max:255',
            'company_name'    => 'nullable|string|max:200',
            'profession_area' => 'nullable|string|max:255',
            'salary'          => 'nullable|string|max:20',
            'experience'      => 'nullable|string|max:20',
            'degree'          => 'nullable|string|max:200',
            'college'         => 'nullable|string|max:200',
            'school'          => 'nullable|string|max:200',
            'whatsApp'        => 'nullable|string|max:200',
            'facebook'        => 'nullable|string|max:200',
            'instagram'       => 'nullable|string|max:200',
            'x'               => 'nullable|string|max:200',
            'youtube'         => 'nullable|string|max:200',
            'linkedin'        => 'nullable|string|max:200',
            'hobbies'         => 'nullable|array',
            'image'           => [
                'required',
                'image',
                'mimes:png,jpg,jpeg',
            ],
        ]);

        $user = $this->userService->createUser($request->all());

        $this->userService->updateUserProfile($request->all(), $user);

        Toastr::success('User Created Successfully');

        return redirect()->route('admin.user.manage');
    }

    public function edit($id) {
        $user    = User::with('profile')->find($id);
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();

        return view('backend.user.edit', compact('user', 'hobbies'));
    }

    public function update(Request $request) {
        // dd($request->all());
        $userId = $request->user_id;
        $user   = User::find($userId);

        $request->validate([
            'name'            => 'required|string|max:200',
            'email'           => 'required|email|string',
            'profile_for'     => 'nullable|string|max:50',
            'gender'          => 'required|string',
            'city_id'         => 'required|string',
            'sub_district'    => 'nullable|string',
            'religion'        => 'required|string',
            'language'        => 'required|string',
            'birth_date'      => 'required|date',
            'height'          => 'required|numeric|min:30|max:300',
            'weight'          => 'required|numeric|min:10|max:300',
            'fathers_name'    => 'required|string|max:200',
            'mothers_name'    => 'required|string|max:200',
            'address'         => 'required|string|max:255',
            'type'            => 'required|string',
            'bio'             => 'nullable|string',
            'working_with'    => 'nullable|string|max:255',
            'company_name'    => 'nullable|string|max:200',
            'profession_area' => 'nullable|string|max:255',
            'salary'          => 'nullable|string|max:20',
            'experience'      => 'nullable|string|max:20',
            'degree'          => 'nullable|string|max:200',
            'college'         => 'nullable|string|max:200',
            'school'          => 'nullable|string|max:200',
            'whatsApp'        => 'nullable|string|max:200',
            'facebook'        => 'nullable|string|max:200',
            'instagram'       => 'nullable|string|max:200',
            'x'               => 'nullable|string|max:200',
            'youtube'         => 'nullable|string|max:200',
            'linkedin'        => 'nullable|string|max:200',
            'hobbies'         => 'nullable|array',
            'image'           => [
                Rule::requiredIf(!$user->profile || !$user->profile->image),
                'nullable',
                'image',
                'mimes:png,jpg,jpeg',
            ],
        ]);

        $updated_user = $this->userService->updateUser($request->all(), $user);
        $userProfile  = $this->userService->updateUserProfile($request->all(), $user);

        Toastr::success('Profile Updated Successfully');

        return redirect()->back();
    }

    public function delete($id) {
        $user = User::findOrFail($id);

        $user->profile()->delete();
        $user->profileViews()->delete();
        $user->profileLikes()->delete();
        $user->profileClicks()->delete();
        $user->invitations()->delete();

        if ($user->profile) {
            $user->profile->images()->delete();
        }

        $user->delete();

        Toastr::success('User Deleted Successfully');

        return redirect()->back();
    }

    public function bill($id) {
        $billingInfo = PackagePayment::with('user')
            ->where('user_id', $id)->get();

        // dd($billingInfo);

        return view('backend.user.bill', compact('billingInfo'));
    }

    public function show($id) {
        $data['user']        = User::with('profile')->find($id);
        $data['hobbies']     = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();
        $data['socialLinks'] = UserSocialmedia::whereStatus(true)->where('user_id', $id)->get();
        // dd($data);

        return view('backend.user.show', $data);
    }

}
