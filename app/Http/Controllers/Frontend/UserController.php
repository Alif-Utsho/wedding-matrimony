<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\PaymentStatus;
use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\PackagePayment;
use App\Models\SubPackage;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\UserProfile;
use App\Models\UserVerification;
use App\Services\MessageService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    protected $userService, $messageService;

    public function __construct(UserService $userService, MessageService $messageService)
    {
        $this->userService = $userService;
        $this->messageService = $messageService;
    }

    public function index()
    {

        $user = User::find(Auth::guard('user')->id());

        $userPackage = UserPackage::where('user_id', $user->id)
            ->where('expired_at', '>', now())
            ->latest()
            ->with('subpackage', 'specialcategory')
            ->first();

        if ($userPackage) {
            $package = SubPackage::with('package')->find($userPackage->sub_pkg_id);
        } else {
            $package = SubPackage::with('package')->where('price', 0)->first();
        }

        $chatListUsers = $this->messageService->list($user->id);

        $matchingUsers = $this->userService->getMatchingUsers($user->id);

        $profile_completion = $this->userService->getProfileCompletion($user->id);

        $data['package'] = $package;
        $data['chatListUsers'] = $chatListUsers;
        $data['userPackage'] = $userPackage;
        $data['matchingUsers'] = $matchingUsers;
        $data['profile_completion'] = $profile_completion;

        // dd($data);

        return view('frontend.user.dashboard', $data);
    }

    public function profile()
    {
        $user = User::find(Auth::guard('user')->id());

        $profile_completion = $this->userService->getProfileCompletion($user->id);

        $userPackage = UserPackage::where('user_id', $user->id)
            ->where('expired_at', '>', now())
            ->latest()
            ->with('subpackage', 'specialcategory')
            ->first();

        if ($userPackage) {

            $package = SubPackage::with('package')->find($userPackage->sub_pkg_id);

        } else {

            $package = SubPackage::with('package')->where('price', 0)->first();

        }

        return view('frontend.user.profile', compact('user', 'profile_completion', 'userPackage', 'package'));
    }

    public function profileEdit()
    {
        $user = User::find(Auth::guard('user')->id());
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();

        return view('frontend.user.profile-edit', compact('user', 'hobbies'));
    }

    public function profileEditSubmit(Request $request)
    {
        $userId = Auth::guard('user')->id();
        $user = User::find($userId);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:200',
            'gender' => 'required|string',
            'city_id' => 'required|string',
            'religion' => 'required|string',
            'language' => 'required|string',
            'birth_date' => 'required|date',
            'height' => 'required|numeric|min:30|max:300',
            'weight' => 'required|numeric|min:10|max:300',
            'fathers_name' => 'required|string|max:200',
            'mothers_name' => 'required|string|max:200',
            'address' => 'required|string|max:255',
            'type' => 'required|string',
            'marital_status' => 'required|string|max:20',
            'bio' => 'nullable|string',
            'company_name' => 'nullable|string|max:200',
            'salary' => 'nullable|string|max:20',
            'experience' => 'nullable|string|max:20',
            'degree' => 'nullable|string|max:200',
            'college' => 'nullable|string|max:200',
            'school' => 'nullable|string|max:200',
            'whatsApp' => 'nullable|string|max:200',
            'facebook' => 'nullable|string|max:200',
            'instagram' => 'nullable|string|max:200',
            'x' => 'nullable|string|max:200',
            'youtube' => 'nullable|string|max:200',
            'linkedin' => 'nullable|string|max:200',
            'hobbies' => 'nullable|array',
            // 'image'        => 'if $user->profile->image == null required else nullable|image|png, jpg, jpeg'
            'image' => [
                Rule::requiredIf(!$user->profile || !$user->profile->image),
                'nullable',
                'image',
                'mimes:png,jpg,jpeg',
            ],
        ]);

        $userProfile = $this->userService->updateUserProfile($request->all(), $user);

        Toastr::success('Profile Updated Successfully');

        return redirect('/user/profile');
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'images' => [
                'required',
                'array',
                'min:1',
            ],
            'images.*' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $userId = Auth::guard('user')->id();
        $userProfile = UserProfile::where('user_id', $userId)->first();

        if (!$userProfile) {
            return response()->json(['message' => 'User profile not found'], 404);
        }

        $uploaded = $this->userService->uploadProfileImages($request->file('images'), $userId);

        Toastr::success("$uploaded Images uploaded successfully!");

        return redirect()->back();
    }

    public function deleteImage(Request $request)
    {
        $id = $request->imageId;
        $result = $this->userService->deleteImage($id);

        if ($result) {
            Toastr::success('Image deleted successfully.');
        } else {
            Toastr::error('Something went wrong!');
        }

        return redirect()->back();
    }

    public function chatList(Request $request)
    {
        $userId = Auth::guard('user')->id();

        $chatListUsers = $this->messageService->list($userId);

        return view('frontend.user.chat-list', compact('chatListUsers'));
    }

    public function userPlan()
    {
        $user = User::find(Auth::guard('user')->id());

        $userPackage = UserPackage::where('user_id', $user->id)
            ->where('expired_at', '>', now())
            ->latest()
            ->with('subpackage', 'specialcategory')
            ->first();

        if ($userPackage) {
            $package = SubPackage::with('package')->find($userPackage->sub_pkg_id);
        } else {
            $package = SubPackage::with('package')->where('price', 0)->first();
        }

        $payments = PackagePayment::where('user_id', $user->id)->where('status', PaymentStatus::PAID)->get();

        $data['userPackage'] = $userPackage;
        $data['package'] = $package;
        $data['payments'] = $payments;
        // dd($data);
        return view('frontend.user.plan', $data);
    }

    public function setting()
    {
        return view('frontend.user.setting');
    }

    public function updateSetting(Request $request)
    {
        $request->validate([
            'setting_key' => 'required|string|in:profile_visibility,interest_request_access',
            'setting_value' => 'required|string|in:all,premium,no-visible',
        ]);

        $result = $this->userService->updateSetting(
            $request->input('setting_key'),
            $request->input('setting_value'),
            Auth::guard('user')->id()
        );

        return response()->json([
            'success' => true,
            'message' => ucfirst(str_replace('_', ' ', $request->input('setting_key'))) . ' updated successfully!',
        ]);
    }

    public function like($userId)
    {
        $likerId = Auth::guard('user')->id();

        $result = $this->userService->toggleLike($userId, $likerId);

        return response()->json($result);
    }

    public function verificationEdit()
    {
        return view('frontend.user.verification-edit');
    }

    public function verificationEditSubmit(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $userId = Auth::guard('user')->id();
        $exist = UserVerification::where('user_id', $userId)->latest()->first();

        if ($exist) {
            Toastr::error('Already Submitted! Contact with Administrator');

            return redirect('/user/setting');
        }

        $response = $this->userService->verifySubmit($userId, $request->all());

        if ($response) {
            Toastr::success('Verification submitted successfully');

            return redirect('/user/setting');
        }

        Toastr::error('Something went wrong');

        return redirect()->back();
    }

    public function downloadProfileDownload()
    {
        $userId = Auth::guard('user')->id();

        return $this->userService->downloadProfilePdf($userId);
    }

}
