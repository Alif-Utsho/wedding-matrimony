<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CallLog;
use App\Models\City;
use App\Models\Contactinfo;
use App\Models\Country;
use App\Models\Division;
use App\Models\FAQ;
use App\Models\Message;
use App\Models\Package;
use App\Models\ProfileClick;
use App\Models\ProfileView;
use App\Models\PushSubscription;
use App\Models\Service;
use App\Models\SpecialPackage;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WeddingStep;
use App\Services\PushNotificationService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller {
    protected $userService, $notificationService;

    function __construct(UserService $userService, PushNotificationService $notificationService) {
        $this->middleware('check.access:profile-view')->only('profileDetails');
        $this->middleware('check.access:all-images')->only('profileImages');
        $this->userService         = $userService;
        $this->notificationService = $notificationService;
    }

    public function index() {
        $services      = Service::whereStatus(true)->latest()->get();
        $banners       = Banner::whereStatus(true)->get();
        $testimonials  = Testimonial::whereStatus(true)->latest()->get();
        $wedding_steps = WeddingStep::whereNull('wedding_id')->whereStatus(true)->get();

        return response()->json(compact('services', 'testimonials', 'wedding_steps', 'banners'));
    }

    public function allProfile() {
        $users = User::with('profile')->whereHas('profile')->where('id', '<>', Auth::guard('api')->id())->latest()->paginate(100);

        return response()->json(compact('users'));
    }

    public function searchProfile(Request $request) {

        $users = $this->userService->getUsers($request);

        return response()->json(compact('users'));
    }

    public function profileDetails($slug) {
        $validator = Validator::make(['slug' => $slug], [
            'slug' => 'required|string|exists:users,slug', // Ensuring slug exists in the users table
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = User::with('profile', 'profile.city', 'profile.career', 'profile.hobbies.hobby', 'profile.images', 'profile.socialmedia')
            ->where('slug', $slug)
            ->where('profile_visibility', '<>', 'no-visible')
            ->first();

        $authId          = Auth::guard('api')->id();
        $authUser        = User::find($authId);
        $common_with_you = [
            'common_city'           => $authUser->profile->city_id === $user->profile->city_id
            ? $authUser->profile->city->name
            : null,
            'common_hobbies'        => $authUser->profile->hobbies->pluck('hobby.name')
                ->intersect($user->profile->hobbies->pluck('hobby.name'))
                ->values(),
            'common_marital_status' => $authUser->profile->marital_status === $user->profile->marital_status
            ? $authUser->profile->marital_status
            : null,
            'common_religion'       => $authUser->profile->religion === $user->profile->religion
            ? $authUser->profile->religion
            : null,
            'common_language'       => $authUser->profile->language === $user->profile->language
            ? $authUser->profile->language
            : null,
        ];

        if (!$user) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $alreadyViewed = ProfileView::where('user_id', $user->id)
            ->where('viewer_id', Auth::guard('api')->id())
            ->exists();

        if (!$alreadyViewed) {
            ProfileView::create([
                'user_id'   => $user->id,
                'viewer_id' => Auth::guard('api')->id(),
            ]);
        }

        ProfileClick::create([
            'user_id'    => $user->id,
            'clicker_id' => Auth::guard('api')->id(),
        ]);

        $related_users = User::where('id', '!=', $user->id)
            ->whereHas('profile', function ($query) use ($user) {
                $query->where('gender', $user->profile->gender)
                    ->whereBetween('age', [$user->profile->age - 5, $user->profile->age + 5]);
            })
            ->limit(6)
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => [
                'user'            => $user,
                'common_with_you' => $common_with_you,
                'related_users'   => $related_users,
            ],
        ], Response::HTTP_OK);
    }

    public function profileImages($slug) {
        $validator = Validator::make(['slug' => $slug], [
            'slug' => 'required|string|exists:users,slug',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = User::with('profile.images')
            ->where('slug', $slug)
            ->where('profile_visibility', '<>', 'no-visible')
            ->first();

        if (!$user) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'data'   => [
                'images' => $user->profile->images,
            ],
        ], Response::HTTP_OK);

    }

    public function plans() {
        $plans = Package::with('subpackage', 'accesses')->latest()->get();

        return response()->json([
            'status' => 'success',
            'plans'  => $plans,
        ], Response::HTTP_OK);

    }

    public function specialPlan() {
        $specialPlans = SpecialPackage::with('specialcategory', 'accesses')->latest()->get();

        return response()->json([
            'status'       => 'success',
            'specialPlans' => $specialPlans,
        ], Response::HTTP_OK);

    }

    public function get_countries() {
        $countries = Country::whereStatus(true)->orderBy('name', 'ASC')->get();

        return response()->json([
            'status'    => 'success',
            'countries' => $countries,
        ], Response::HTTP_OK);
    }

    public function get_divisions(Request $request) {
        $divisionQuery = Division::whereStatus(true)->orderBy('name', 'ASC');

        if ($request->country_id) {
            $divisionQuery->where('country_id', $request->country_id);
        }

        $divisions = $divisionQuery->get();

        return response()->json([
            'status'    => 'success',
            'divisions' => $divisions,
        ], Response::HTTP_OK);
    }

    public function get_cities(Request $request) {

        $response = Http::get('https://bdapis.com/api/v1.2/division/' . $request->division_name);

        if ($response->successful()) {
            $data = $response->json();

            return response()->json([
                'status' => 'success',
                'cities' => $data,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status' => 'error',
                'error'  => $response->status(),
            ]);
        }

    }

    public function contactInfo() {
        $contactInfo = Contactinfo::whereStatus(true)->first();

        return response()->json([
            'contactInfo' => $contactInfo,
        ], Response::HTTP_OK);
    }

    public function sendNotification() {
        $data = [
            "title"  => "Notification Title",
            "body"   => "Test notification body",
            "userId" => 1,
        ];

        return $this->notificationService->send($data);
    }

    public function saveSubscription(Request $request) {
        $validator = Validator::make($request->all(), [
            'subscription_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userId = Auth::guard('api')->id() ?? Auth::guard('user')->id();

        $subscription = PushSubscription::where('subscription_id', $request->subscription_id)->first();

        if ($subscription) {
            $subscription->where('user_id', null)->update(['user_id' => $userId]);
        } else {
            PushSubscription::create([
                'user_id'         => $userId,
                'subscription_id' => $request->subscription_id,
            ]);
        }

        return response()->json(['message' => 'Subscription ID saved successfully']);

    }

    public function saveCallLog(Request $request) {

        $validator = Validator::make($request->all(), [
            'sender_id'   => 'required',
            'receiver_id' => 'required',
            'start_time'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $logInfo = CallLog::create([
            'sender_id'   => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
            'duration'    => $request->duration,
            'call_type'   => $request->call_type,
        ]);

        Message::create([
            'sender_id'   => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message'     => $request->call_type,
        ]);

        $insertedId = $logInfo->id;

        return response()->json([
            'inserted_id' => $insertedId,
            'message'     => 'Call Log saved successfully',
        ]);

    }

    public function updateCallLog(Request $request) {

        $validator = Validator::make($request->all(), [
            'end_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $callLog = CallLog::find($request->id);

        $result = $callLog->update([
            'sender_id'   => $callLog->sender_id,
            'receiver_id' => $callLog->receiver_id,
            'start_time'  => $callLog->start_time,
            'end_time'    => $request->end_time,
            'duration'    => $callLog->duration,
            'call_type'   => $callLog->call_type,
        ]);

        return response()->json($result);
    }

    public function callLog() {

        $callLog = CallLog::where('status', true)->get();

        $callLog->load(['receiver', 'receiver.profile']);

        return response()->json([
            'status'  => 'success',
            'callLog' => $callLog,
        ], Response::HTTP_OK);
    }

    public function faqs() {
        $faqs = FAQ::whereStatus(true)->get();

        return response()->json([
            'status' => 'success',
            'faqs'   => $faqs,
        ], Response::HTTP_OK);

    }

}
