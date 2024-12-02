<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\City;
use App\Models\Contactinfo;
use App\Models\Country;
use App\Models\Division;
use App\Models\Package;
use App\Models\ProfileClick;
use App\Models\ProfileView;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WeddingStep;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller {
    protected $userService;

    function __construct(UserService $userService) {
        $this->middleware('check.access:profile-view')->only('profileDetails');
        $this->userService = $userService;
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

    public function plans() {
        $plans = Package::whereStatus(true)->get();

        return response()->json([
            'status' => 'success',
            'plans'  => $plans,
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
        $cityQuery = City::whereStatus(true)->orderBy('name', 'ASC');

        if ($request->division_id) {
            $cityQuery->where('division_id', $request->division_id);
        }

        $cities = $cityQuery->get();

        return response()->json([
            'status' => 'success',
            'cities' => $cities,
        ], Response::HTTP_OK);
    }

    public function contactInfo(){
        $contactInfo = Contactinfo::whereStatus(true)->first();

        return response()->json([
            'contactInfo' => $contactInfo
        ], Response::HTTP_OK);
    }

}
