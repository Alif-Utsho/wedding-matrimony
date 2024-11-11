<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WeddingStep;
use App\Services\FrontendService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    protected $frontendService;

    function __construct(FrontendService $frontendService)
    {
        $this->middleware('check.access:profile-view')->only('profileDetails');
        $this->frontendService = $frontendService;
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
        $users = $this->frontendService->getUsers($request);

        return response()->json(compact('users'));
    }
}
