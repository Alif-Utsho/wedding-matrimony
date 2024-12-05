<?php

namespace App\Http\Controllers\Api;

use App\Enums\GenderEnum;
use App\Enums\JobType;
use App\Enums\Language;
use App\Enums\MaritalStatus;
use App\Enums\Religion;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hobby;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserVerification;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function profileEdit(Request $request) {
        $countries     = Country::whereStatus(true)->orderBy('name', 'ASC')->get();
        $cities        = City::whereStatus(true)->orderBy('name', 'ASC')->get();
        $hobbies       = Hobby::whereStatus(true)->orderBy('name', 'ASC')->get();
        $genders       = GenderEnum::options();
        $religions     = Religion::all();
        $jobtypes      = JobType::getValues();
        $languages     = Language::all();
        $maritalStatus = MaritalStatus::all();

        return response()->json(compact('countries', 'cities', 'hobbies', 'genders', 'religions', 'jobtypes', 'languages', 'maritalStatus'));
    }

    public function profileUpdate(Request $request) {
        $userId = Auth::guard('api')->id();
        $user   = User::find($userId);

        $validator = Validator::make($request->all(), [
            'name'           => 'required|string|max:200',
            'gender'         => 'required|string',
            'city_id'        => 'required|string',
            'religion'       => 'required|string',
            'language'       => 'required|string',
            'birth_date'     => 'required|date',
            'age'            => 'required',
            'height'         => 'required|numeric|min:30|max:300',
            'weight'         => 'required|numeric|min:10|max:300',
            'fathers_name'   => 'required|string|max:200',
            'mothers_name'   => 'required|string|max:200',
            'address'        => 'required|string|max:255',
            'type'           => 'required|string',
            'marital_status' => 'required|string|max:20',
            'bio'            => 'nullable|string',
            'company_name'   => 'nullable|string|max:200',
            'salary'         => 'nullable|string|max:20',
            'experience'     => 'nullable|string|max:20',
            'degree'         => 'nullable|string|max:200',
            'college'        => 'nullable|string|max:200',
            'school'         => 'nullable|string|max:200',
            'whatsApp'       => 'nullable|string|max:200',
            'facebook'       => 'nullable|string|max:200',
            'instagram'      => 'nullable|string|max:200',
            'x'              => 'nullable|string|max:200',
            'youtube'        => 'nullable|string|max:200',
            'linkedin'       => 'nullable|string|max:200',
            'hobbies'        => 'nullable|array',
            'image'          => [
                Rule::requiredIf(!$user->profile || !$user->profile->image),
                'nullable',
                'image',
                'mimes:png,jpg,jpeg',
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $userProfile = $this->userService->updateUserProfile($request->all(), $user);

        return response()->json([
            'status'  => 'success',
            'message' => 'Profile updated successfully',
            'data'    => [
                'user' => $user,
            ],
        ], Response::HTTP_OK);
    }

    public function profile() {
        $user = User::with('profile', 'profile.city', 'profile.career', 'profile.hobbies', 'profile.images', 'profile.socialmedia', 'preference', 'preference.city')->find(Auth::guard('api')->id());

        return response()->json(compact('user'));
    }

    public function imageUpload(Request $request) {
        $validator = Validator::make($request->all(), [
            'images'   => [
                'required',
                'array',
                'min:1',
            ],
            'images.*' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $userId      = Auth::guard('api')->id();
        $userProfile = UserProfile::where('user_id', $userId)->first();

        if (!$userProfile) {
            return response()->json(['message' => 'User profile not found'], 404);
        }

        $uploaded = $this->userService->uploadProfileImages($request->file('images'), $userId);

        return response()->json([
            'status'  => 'success',
            'message' => "$uploaded Images uploaded successfully!",
        ], Response::HTTP_OK);
    }

    public function deleteImage(Request $request) {
        $id     = $request->imageId;
        $result = $this->userService->deleteImage($id);

        if ($result) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Image deleted successfully',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function updateSetting(Request $request) {
        $validator = Validator::make($request->all(), [
            'setting_key'   => 'required|string|in:profile_visibility,interest_request_access',
            'setting_value' => 'required|string|in:all,premium,no-visible',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $result = $this->userService->updateSetting(
            $request->input('setting_key'),
            $request->input('setting_value'),
            Auth::guard('api')->id()
        );

        return response()->json($result);
    }

    public function like($userId) {
        $likerId = Auth::guard('api')->id();

        $result = $this->userService->toggleLike($userId, $likerId);

        return response()->json($result);
    }

    public function listLikedProfiles() {
        $likerId       = Auth::guard('api')->id();
        $likedProfiles = $this->userService->listLikedProfiles($likerId);

        return response()->json([
            'success'        => true,
            'liked_profiles' => $likedProfiles,
        ]);
    }

    public function matchingProfiles() {
        $userId        = Auth::guard('api')->id();
        $matchingUsers = $this->userService->getMatchingUsers($userId);

        return response()->json([
            'status' => 'success',
            'data'   => $matchingUsers,
        ], Response::HTTP_OK);
    }

    public function premiumMatches() {
        $userId        = Auth::guard('api')->id();
        $matchingUsers = $this->userService->getMatchingUsers($userId);
        $matchingUsers = $matchingUsers->filter(function ($user) {
            return $user->currentPackage()->price > 0;
        })->values();

        return response()->json([
            'status' => 'success',
            'data'   => $matchingUsers,
        ], Response::HTTP_OK);
    }

    public function newProfileMatches() {
        $userId        = Auth::guard('api')->id();
        $matchingUsers = $this->userService->getMatchingUsers($userId);
        $matchingUsers = $matchingUsers->filter(function ($user) {
            return $user->created_at->greaterThanOrEqualTo(now()->subDays(7));
        })->values();

        return response()->json([
            'status' => 'success',
            'data'   => $matchingUsers,
        ], Response::HTTP_OK);
    }

    public function nearestMatches(Request $request) {
        $userId        = Auth::guard('api')->id();
        $authUser      = User::with('profile')->find($userId);
        $matchingUsers = $this->userService->getMatchingUsers($userId);
        $city_id       = $authUser->profile->city_id;

        if ($request->city_id) {
            $city_id = $request->city_id;
        }

        $matchingUsers = $matchingUsers->filter(function ($user) use ($city_id) {
            return $city_id == $user->profile->city_id;
        })->values();

        return response()->json([
            'status' => 'success',
            'data'   => $matchingUsers,
        ], Response::HTTP_OK);
    }

    public function dailyMatches() {
        $userId        = Auth::guard('api')->id();
        $matchingUsers = $this->userService->getMatchingUsers($userId);
        $matchingUsers = $matchingUsers->filter(function ($user) {
            return $user->created_at->isSameDay(now());
        })->values();

        return response()->json([
            'status' => 'success',
            'data'   => $matchingUsers,
        ], Response::HTTP_OK);
    }

    public function verificationEditSubmit(Request $request) {
        $validator = Validator::make($request->all(), [
            'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userId = Auth::guard('api')->id();
        $exist  = UserVerification::where('user_id', $userId)->latest()->first();

        if ($exist) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Already submitted! Contact with Administrator',
            ], Response::HTTP_FORBIDDEN);
        }

        try {
            $response = $this->userService->verifySubmit($userId, $request->all());

            if ($response) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Verification submitted successfully',
                ], Response::HTTP_OK);
            }

            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong. Please try again later.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            Log::error('Verification submission failed: ' . $e->getMessage());

            return response()->json([
                'status'  => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function downloadProfileDownload() {
        $userId = Auth::guard('api')->id();

        return $this->userService->downloadProfilePdf($userId);
    }

    public function updatePreference(Request $request) {
        $validator = Validator::make($request->all(), [
            'min_age'        => 'nullable|integer',
            'max_age'        => 'nullable|integer',
            'min_height'     => 'nullable|integer',
            'max_height'     => 'nullable|integer',
            'marital_status' => 'nullable|string',
            'religion'       => 'nullable|string',
            'language'       => 'nullable|string',
            'city_id'        => 'nullable|string',
            'jobtype'        => 'nullable|string',
            'min_salary'     => 'nullable|integer',
            'max_salary'     => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userId     = Auth::guard('api')->id();
        $preference = $this->userService->updatePreference($request->all(), $userId);

        return response()->json([
            'success' => true,
            'message' => 'Preferences saved successfully!',
            'data'    => $preference,
        ]);
    }

}
