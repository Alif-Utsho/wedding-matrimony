<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ourteam;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WeddingStep;
use App\Models\WeddingGallery;
use App\Models\Blog;
use App\Models\Wedding;
use App\Models\Banner;
use App\Models\User;
use App\Models\City;

class FrontendController extends Controller
{
    public function index() {
        $services = Service::whereStatus(true)->latest()->get();
        $testimonials = Testimonial::whereStatus(true)->latest()->get();
        $wedding_steps = WeddingStep::whereNull('wedding_id')->whereStatus(true)->get();
        $ourteams = Ourteam::whereStatus(true)->get();
        $blogs = Blog::whereStatus(true)->latest()->limit(3)->get();
        $weddings = Wedding::whereStatus(true)->get();
        $banners = Banner::whereStatus(true)->get();
        $galleries = WeddingGallery::whereStatus(true)->inRandomOrder()->limit(10)->get();
        
        return view('frontend.index', compact('services', 'testimonials', 'wedding_steps', 'ourteams', 'blogs', 'weddings', 'banners', 'galleries'));
    }

    public function weddingDetails($id){
        $wedding = Wedding::find($id);
        if(!$wedding){
            return redirect('/')->with('error', 'Wedding not Found!');
        }

        return view('frontend.pages.wedding-details', compact('wedding'));
    }

    public function allProfile(Request $request){
        $userQuery = User::whereStatus(true)->latest()->whereHas('profile');

        if ($request->filled('gender')) {
            $gender = $request->gender === 'Men' ? 'Male' : 'Female';
            $userQuery->whereHas('profile', function($query) use ($gender) {
                $query->where('gender', $gender);
            });
        }
    
        if ($request->filled('age_range')) {
            $ageRange = explode('-to-', $request->age_range);
            if (count($ageRange) == 2) {
                $minAge = $ageRange[0];
                $maxAge = $ageRange[1];

                $userQuery->whereHas('profile', function($query) use ($minAge, $maxAge) {
                    $query->whereBetween('age', [$minAge, $maxAge]);
                });
            }
        }
    
        if ($request->filled('location')) {
            $city = City::where('name', $request->location)->first();
            if($city){
                $userQuery->whereHas('profile', function($query) use ($city) {
                    $query->where('city_id', $city->id);
                });
            }
        }

        $users = $userQuery->limit(100)->get();

        return view('frontend.pages.all-profile', compact('users'));
    }

    public function profileDetails(Request $request){
        $user = User::where('slug', $request->slug)->first();
        
        $related_users = User::where('id', '!=', $user->id)
            ->whereHas('profile', function ($query) use ($user) {
                $query->where('gender', $user->profile->gender)
                    ->whereBetween('age', [$user->profile->age - 5, $user->profile->age + 5]);
            })
            ->limit(6)
            ->get();
            
        return view('frontend.pages.profile-details', compact('user', 'related_users'));
    }

    public function contact() {
        return view('frontend.pages.contact');
    }
}
