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
use App\Models\BlogCategory;
use App\Models\User;
use App\Models\City;
use App\Models\Package;
use App\Models\Invitation;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Toastr;
use App\Models\ProfileView;

class FrontendController extends Controller
{

    function __construct()
    {
        $this->middleware('check.access:profile-view')->only('profileDetails');
    }


    public function index() {
        $services = Service::whereStatus(true)->latest()->get();
        $testimonials = Testimonial::whereStatus(true)->latest()->get();
        $wedding_steps = WeddingStep::whereNull('wedding_id')->whereStatus(true)->get();
        $ourteams = Ourteam::whereStatus(true)->get();
        $blogs = Blog::whereStatus(true)->where('front_page', true)->latest()->limit(3)->get();
        $weddings = Wedding::whereStatus(true)->get();
        $banners = Banner::whereStatus(true)->get();
        $galleries = WeddingGallery::whereStatus(true)->inRandomOrder()->limit(10)->get();
        
        return view('frontend.index', compact('services', 'testimonials', 'wedding_steps', 'ourteams', 'blogs', 'weddings', 'banners', 'galleries'));
    }

    public function weddingDetails($id){
        $wedding = Wedding::find($id);
        if(!$wedding){
            Toastr::error('Wedding not Found!');
            return redirect('/');
        }

        return view('frontend.pages.wedding-details', compact('wedding'));
    }

    public function allProfile(Request $request){
        $userQuery = User::whereStatus(true)->latest()->whereHas('profile');

        if(Auth::guard('user')->check()) {
            $userQuery->where('id', '<>', Auth::guard('user')->user()->id);
        }

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

        $alreadyViewed = ProfileView::where('user_id', $user->id)
            ->where('viewer_id', Auth::guard('user')->id())
            ->whereDate('created_at', now()->toDateString())
            ->exists();

        if (!$alreadyViewed) {
            ProfileView::create([
                'user_id' => $user->id,
                'viewer_id' => Auth::guard('user')->id(),
            ]);
        }

        $invitationSent = false;
        $invitationReceived = false;
        $invitationAccepted = false;
        $invitationSentId = null;
        $invitationReceivedId = null;
        $invitationAcceptedId = null;

        if (Auth::guard('user')->check()) {
            $invitationSentData = Invitation::where([
                'sent_from' => Auth::guard('user')->user()->id,
                'sent_to' => $user->id,
                'status' => null
                ])->first();
                
            if($invitationSentData){
                $invitationSent = true;
                $invitationSentId = $invitationSentData->id;
            }
                
        
                
            $invitationReceivedData = Invitation::where([
                'sent_to' => Auth::guard('user')->user()->id,
                'sent_from' => $user->id,
                'status' => null
            ])->first();
            
            if($invitationReceivedData){
                $invitationReceived = true;
                $invitationReceivedId = $invitationReceivedData->id;
            }

            $currentUserId = Auth::guard('user')->user()->id;
            $invitationAcceptedData = Invitation::where('status', true)
                ->where(function($query) use ($currentUserId, $user) {
                    $query->where('sent_to', $currentUserId)
                        ->where('sent_from', $user->id);
                })->orWhere(function($query) use ($currentUserId, $user) {
                    $query->where('sent_to', $user->id)
                        ->where('sent_from', $currentUserId);
                })->first();

            if($invitationAcceptedData){
                $invitationAccepted = true;
                $invitationAcceptedId = $invitationAcceptedData->id;
            }
        }

        
        
        $related_users = User::where('id', '!=', $user->id)
            ->whereHas('profile', function ($query) use ($user) {
                $query->where('gender', $user->profile->gender)
                    ->whereBetween('age', [$user->profile->age - 5, $user->profile->age + 5]);
            })
            ->limit(6)
            ->get();
            
        return view('frontend.pages.profile-details', compact('user', 'related_users', 'invitationSent', 'invitationReceived', 'invitationAccepted', 'invitationSentId', 'invitationReceivedId', 'invitationAcceptedId'));
    }

    public function blogs(Request $request){
        $blogQueries = Blog::whereStatus(true);

        if($request->category){
            $category = BlogCategory::where('slug', $request->category)->first();
            $blogQueries->where('category_id', $category->id);
        }
        
        $blogs = $blogQueries->latest()->get();

        $blog_categories = BlogCategory::whereStatus(true)->get();
        $trending_blogs = Blog::where('trending', true)->latest()->limit(5)->get();

        return view('frontend.pages.blogs', compact('blogs', 'trending_blogs', 'blog_categories'));
    }

    public function blogDetails(Request $request){
        $blog_id = $request->id;
        $blog = Blog::find($blog_id);

        $related_posts = Blog::whereHas('tags', function($query) use ($blog) {
            $query->whereIn('tag_id', $blog->tags->pluck('id')); 
        })
        ->where('id', '!=', $blog->id) 
        ->take(6) 
        ->get();

        $next_post = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();

        $prev_post = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();

        $trending_blogs = Blog::where('trending', true)->where('id', '<>', $blog_id)->latest()->limit(5)->get();
        
        $blog_categories = BlogCategory::whereStatus(true)->get();

        return view('frontend.pages.blog-details', compact('blog', 'related_posts', 'next_post', 'prev_post', 'trending_blogs', 'blog_categories'));
    }

    public function plans() {
        $plans = Package::whereStatus(true)->get();
        return view('frontend.pages.plans', compact('plans'));
    }

    public function contact() {
        return view('frontend.pages.contact');
    }
}
