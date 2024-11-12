<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
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

class FrontendController extends Controller
{
    protected $userService;

    function __construct(UserService $userService)
    {
        $this->middleware('check.access:profile-view')->only('profileDetails');
        $this->userService = $userService;
    }

    public function index(){
        $services = Service::whereStatus(true)->latest()->get();
        $testimonials = Testimonial::whereStatus(true)->latest()->get();
        $wedding_steps = WeddingStep::whereNull('wedding_id')->whereStatus(true)->get();
        
        return response()->json(compact('services', 'testimonials', 'wedding_steps'));
    }

    public function allProfile() {
        $users = User::with('profile')->whereHas('profile')->where('id', '<>', Auth::guard('api')->id())->latest()->paginate(100);

        return response()->json(compact('users'));
    }

    public function searchProfile(Request $request){
        $users = $this->userService->getUsers($request);

        return response()->json(compact('users'));
    }

    public function profileDetails($slug)
    {
        $validator = Validator::make(['slug' => $slug], [
            'slug' => 'required|string|exists:users,slug', // Ensuring slug exists in the users table
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = User::where('slug', $slug)
                    ->where('profile_visibility', '<>', 'no-visible')
                    ->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $alreadyViewed = ProfileView::where('user_id', $user->id)
            ->where('viewer_id', Auth::guard('api')->id())
            ->exists();

        if (!$alreadyViewed) {
            ProfileView::create([
                'user_id' => $user->id,
                'viewer_id' => Auth::guard('api')->id(),
            ]);
        }

        ProfileClick::create([
            'user_id' => $user->id,
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
            'data' => [
                'user' => $user,
                'related_users' => $related_users,
            ],
        ], Response::HTTP_OK);
    }

    public function plans() {
        $plans = Package::whereStatus(true)->get();

        return response()->json([
            'status' => 'success',
            'plans' => $plans
        ], Response::HTTP_OK);

    }
}
