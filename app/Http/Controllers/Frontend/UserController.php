<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hobby;
use App\Models\Message;
use App\Models\User;
use App\Models\UserCareer;
use App\Models\UserHobby;
use App\Models\UserImage;
use App\Models\UserProfile;
use App\Models\UserSocialmedia;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use App\Helpers\Toastr;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Enums\PaymentStatus;
use App\Models\ProfileLike;
use App\Services\UserService;
use App\Services\MessageService;

class UserController extends Controller {
    
    protected $userService, $messageService;

    public function __construct(UserService $userService, MessageService $messageService)
    {
        $this->userService = $userService;
        $this->messageService = $messageService;
    }

    public function index() {
        $profile_completion = $this->getProfileCompletion();

        $user = User::find(Auth::guard('user')->id());
        $userPackage = UserPackage::where('user_id', $user->id)
            ->where('expired_at', '>', now())
            ->latest()
            ->with('package')
            ->first();

        if ($userPackage) {
            $package = Package::find($userPackage->package_id);
        } else {
            $package = Package::where('price', 0)->first();
        }

        $receiverIds = Message::where('sender_id', $user->id)
                    ->latest()
                    ->limit(2)
                    ->pluck('receiver_id')
                    ->unique();
        $senderIds = Message::where('receiver_id', $user->id)
                    ->latest()
                    ->limit(2)
                    ->pluck('sender_id')
                    ->unique();
        $chatListUserIds = $receiverIds->merge($senderIds)->unique();
        $chatListUsers = User::whereIn('id', $chatListUserIds)->get();

        $matchingUsers = $this->getMatchingUsers();

        return view('frontend.user.dashboard', compact('profile_completion', 'userPackage', 'package', 'chatListUsers', 'matchingUsers'));
    }

    public function profile(){
        $user    = User::find(Auth::guard('user')->id());

        $profile_completion = $this->getProfileCompletion();

        $userPackage = UserPackage::where('user_id', $user->id)
            ->where('expired_at', '>', now())
            ->latest()
            ->with('package')
            ->first();

        if ($userPackage) {
            $package = Package::find($userPackage->package_id);
        } else {
            $package = Package::where('price', 0)->first();
        }
        return view('frontend.user.profile', compact('user', 'profile_completion', 'userPackage','package'));
    }

    public function profileEdit() {
        $user    = User::find(Auth::guard('user')->id());
        $hobbies = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();

        return view('frontend.user.profile-edit', compact('user', 'hobbies'));
    }

    public function profileEditSubmit(Request $request) {
        $userId = Auth::guard('user')->id();
        $user = User::find($userId);

        // Validate the request
        $request->validate([
            'name'         => 'required|string|max:200',
            'gender'       => 'required|string',
            'city_id'      => 'required|string',
            'religion'      => 'required|string',
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
            // 'image'        => 'if $user->profile->image == null required else nullable|image|png, jpg, jpeg'
            'image'        => [
                Rule::requiredIf(!$user->profile || !$user->profile->image),
                'nullable',
                'image',
                'mimes:png,jpg,jpeg'
            ]
        ]);

        $userProfile = $this->userService->updateUserProfile($request->all(), $user);

        Toastr::success('Profile Updated Successfully');
        return redirect('/user/profile');
    }

    public function getMatchingUsers()
    {
        $userId = Auth::guard('user')->id();
        $userProfile = UserProfile::where('user_id', $userId)->first();

        $oppositeGender = $userProfile->gender === 'Male' ? 'Female' : 'Male';

        $cityId = $userProfile->city_id;

        if ($userProfile->gender === 'Male') {
            $ageMax = $userProfile->age;
            $heightMax = $userProfile->height;
        } else {
            $ageMin = $userProfile->age;
            $heightMin = $userProfile->height;
        }

        $query = UserProfile::where('user_id', '!=', $userId)
            // ->where('city_id', $cityId)
            ->where('gender', $oppositeGender)
            ->where('religion', $userProfile->religion);

        if ($userProfile->gender === 'Male') {
            $query->where('age', '<', $ageMax)
                ->where('height', '<', $heightMax);
        } else {
            $query->where('age', '>', $ageMin)
                ->where('height', '>', $heightMin);
        }
        $matchingProfiles = $query->pluck('user_id');
        
        $matchingUsers = User::whereIn('id', $matchingProfiles)->where('profile_visibility', '<>', 'no-visible')->inRandomOrder()->get();

        return $matchingUsers;
    }

    public function getMatchingProfiles_pro()
    {
        $userId = Auth::guard('user')->id();
        $userProfile = UserProfile::where('user_id', $userId)->first();
        $userPreferences = $userProfile->preferences;

        $query = UserProfile::query()->where('user_id', '!=', $userId);

        if ($userPreferences->preferred_gender) {
            $query->where('gender', $userPreferences->preferred_gender);
        }

        if ($userPreferences->preferred_city_id) {
            $query->where('city_id', $userPreferences->preferred_city_id);
        }

        if ($userPreferences->preferred_min_age && $userPreferences->preferred_max_age) {
            $query->whereBetween('age', [$userPreferences->preferred_min_age, $userPreferences->preferred_max_age]);
        }

        if ($userPreferences->preferred_min_height && $userPreferences->preferred_max_height) {
            $query->whereBetween('height', [$userPreferences->preferred_min_height, $userPreferences->preferred_max_height]);
        }

        $matchingProfiles = $query->with(['user', 'hobbies'])->get();

        $matchingProfiles = $matchingProfiles->map(function($profile) use ($userPreferences) {
            $score = 0;

            if ($profile->gender == $userPreferences->preferred_gender) $score += 10;
            if ($profile->city_id == $userPreferences->preferred_city_id) $score += 15;
            if (in_array($profile->hobby_id, $userPreferences->hobbies)) $score += 5;
            
            // $profile->match_score = $score;
            return $profile;
        })->sortByDesc('match_score');

        return response()->json($matchingProfiles);
    }

    public function getProfileCompletion()
    {
        $userId = Auth::guard('user')->id();
        $userProfile = UserProfile::where('user_id', $userId)->first();
        $userCareer = UserCareer::where('user_id', $userId)->first();
        $userSocialmedia = UserSocialmedia::where('user_id', $userId)->first();
        $userHobbies = UserHobby::where('user_id', $userId)->exists();

        // Define fields to check for completion
        $fields = [
            'name'          => Auth::guard('user')->user()->name,
            'gender'        => $userProfile->gender ?? null,
            'city_id'       => $userProfile->city_id ?? null,
            'birth_date'    => $userProfile->birth_date ?? null,
            'height'        => $userProfile->height ?? null,
            'weight'        => $userProfile->weight ?? null,
            'fathers_name'  => $userProfile->fathers_name ?? null,
            'mothers_name'  => $userProfile->mothers_name ?? null,
            'address'       => $userProfile->address ?? null,
            'image'         => $userProfile->image ?? null,
            'type'          => $userCareer->type ?? null,
            'company_name'  => $userCareer->company_name ?? null,
            'salary'        => $userCareer->salary ?? null,
            'experience'    => $userCareer->experience ?? null,
            'degree'        => $userCareer->degree ?? null,
            'college'       => $userCareer->college ?? null,
            'school'        => $userCareer->school ?? null,
            'whatsApp'      => $userSocialmedia->whatsApp ?? null,
            'facebook'      => $userSocialmedia->facebook ?? null,
            'instagram'     => $userSocialmedia->instagram ?? null,
            'x'             => $userSocialmedia->x ?? null,
            'youtube'       => $userSocialmedia->youtube ?? null,
            'linkedin'      => $userSocialmedia->linkedin ?? null,
            'hobbies'       => $userHobbies ? 'filled' : null,
        ];

        // Count completed fields
        $completedFields = array_filter($fields, fn($value) => !empty($value));
        $totalFields = count($fields);
        $completedCount = count($completedFields);

        // Calculate percentage
        $completionPercentage = ($completedCount / $totalFields) * 100;

        return round($completionPercentage);
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

    public function deleteImage(Request $request) {
        $id = $request->imageId;
        $result = $this->userService->deleteImage($id);

        if($result){
            Toastr::success('Image deleted successfully.');
        } else {
            Toastr::error('Something went wrong!');
        }
        
        return redirect()->back();
    }

    public function chatList(Request $request) {
        $userId = Auth::guard('user')->id();

        $chatListUsers = $this->messageService->list($userId);

        return view('frontend.user.chat-list', compact('chatListUsers'));
    }

    public function userPlan() {
        $user = User::find(Auth::guard('user')->id());
        $userPackage = UserPackage::where('user_id', $user->id)
            ->where('expired_at', '>', now())
            ->latest()
            ->with('package')
            ->first();

        if ($userPackage) {
            $package = Package::find($userPackage->package_id);
        } else {
            $package = Package::where('price', 0)->first();
        }

        $payments = PackagePayment::where('user_id', $user->id)->where('status', PaymentStatus::PAID)->get();
       

        return view('frontend.user.plan', compact('userPackage', 'package', 'payments'));
    }

    public function setting(){
        return view('frontend.user.setting');
    }

    public function updateSetting(Request $request)
    {
        $user = User::find(Auth::guard('user')->id());

        $request->validate([
            'setting_key' => 'required|string|in:profile_visibility,interest_request_access',
            'setting_value' => 'required|string|in:all,premium,no-visible',
        ]);

        $settingKey = $request->input('setting_key');
        $settingValue = $request->input('setting_value');

        $user->$settingKey = $settingValue;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => ucfirst(str_replace('_', ' ', $settingKey)) . ' updated successfully!',
        ]);
    }


    public function like($userId) {
        $likerId = Auth::guard('user')->id();
    
        $alreadyLiked = ProfileLike::where('user_id', $userId)
            ->where('liker_id', $likerId)
            ->exists();
    
        if (!$alreadyLiked) {
            ProfileLike::create([
                'user_id' => $userId,
                'liker_id' => $likerId,
            ]);
    
            return response()->json(['message' => 'Profile liked']);
        } else {
            ProfileLike::where('user_id', $userId)->where('liker_id', $likerId)->delete();
            return response()->json(['message' => 'Profile unliked']);
        }
    }
    
}
