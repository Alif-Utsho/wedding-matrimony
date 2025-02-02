<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Enquiry;
use App\Models\GeneralSetting;
use App\Models\Invitation;
use App\Models\Ourteam;
use App\Models\ProfileClick;
use App\Models\ProfileLike;
use App\Models\ProfileView;
use App\Models\Service;
use App\Models\SubPackage;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Wedding;
use App\Models\WeddingGallery;
use App\Models\WeddingStep;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller {

    protected $userService;

    public function __construct(UserService $userService) {
        $this->middleware('check.access:profile-view')->only('profileDetails');
        $this->userService = $userService;
    }

    public function index() {
        $services        = Service::whereStatus(true)->latest()->get();
        $testimonials    = Testimonial::whereStatus(true)->latest()->get();
        $wedding_steps   = WeddingStep::whereNull('wedding_id')->whereStatus(true)->get();
        $ourteams        = Ourteam::whereStatus(true)->get();
        $blogs           = Blog::whereStatus(true)->where('front_page', true)->latest()->limit(3)->get();
        $weddings        = Wedding::whereStatus(true)->get();
        $banners         = Banner::whereStatus(true)->get();
        $generalSettings = GeneralSetting::first();
        $users           = User::whereStatus(true)->count();
        $maleUser        = UserProfile::where('gender', 'Male')->count();
        $femaleUser      = UserProfile::where('gender', 'Female')->count();
        $galleries       = WeddingGallery::whereStatus(true)->inRandomOrder()->limit(10)->get();

        return view('frontend.index', compact('services', 'testimonials', 'wedding_steps', 'ourteams', 'blogs', 'weddings', 'banners', 'galleries', 'users', 'maleUser', 'femaleUser', 'generalSettings'));
    }

    public function weddingDetails($id) {
        $wedding = Wedding::find($id);

        if (!$wedding) {
            Toastr::error('Wedding not Found!');

            return redirect('/');
        }

        return view('frontend.pages.wedding-details', compact('wedding'));
    }

    public function allProfile(Request $request) {
        $users     = $this->userService->getUsers($request);
        $userQuery = User::whereStatus(true)->latest()->whereHas('profile');

        $likedUsers = ProfileLike::where('liker_id', Auth::guard('user')->id())
            ->whereIn('user_id', $users->pluck('id'))
            ->pluck('user_id')
            ->flip()
            ->map(fn() => true)
            ->toArray();

        // dd($users);

        return view('frontend.pages.all-profile', compact('users', 'likedUsers'));
    }

    public function profileDetails(Request $request) {
        $user = User::where('slug', $request->slug)->where('profile_visibility', '<>', 'no-visible')->first();

        if (!$user) {
            Toastr::error('User not found');

            return redirect()->back();
        }

        $alreadyViewed = ProfileView::where('user_id', $user->id)
            ->where('viewer_id', Auth::guard('user')->id())
        // ->whereDate('created_at', now()->toDateString())
            ->exists();

        if (!$alreadyViewed) {
            ProfileView::create([
                'user_id'   => $user->id,
                'viewer_id' => Auth::guard('user')->id(),
            ]);
        }

        ProfileClick::create([
            'user_id'    => $user->id,
            'clicker_id' => Auth::guard('user')->id(),
        ]);

        $invitationSent       = false;
        $invitationReceived   = false;
        $invitationAccepted   = false;
        $invitationSentId     = null;
        $invitationReceivedId = null;
        $invitationAcceptedId = null;

        if (Auth::guard('user')->check()) {
            $invitationSentData = Invitation::where([
                'sent_from' => Auth::guard('user')->user()->id,
                'sent_to'   => $user->id,
                'status'    => null,
            ])->first();

            if ($invitationSentData) {
                $invitationSent   = true;
                $invitationSentId = $invitationSentData->id;
            }

            $invitationReceivedData = Invitation::where([
                'sent_to'   => Auth::guard('user')->user()->id,
                'sent_from' => $user->id,
                'status'    => null,
            ])->first();

            if ($invitationReceivedData) {
                $invitationReceived   = true;
                $invitationReceivedId = $invitationReceivedData->id;
            }

            $currentUserId          = Auth::guard('user')->user()->id;
            $invitationAcceptedData = Invitation::where('status', true)
                ->where(function ($query) use ($currentUserId, $user) {
                    $query->where('sent_to', $currentUserId)
                        ->where('sent_from', $user->id);
                })->orWhere(function ($query) use ($currentUserId, $user) {
                $query->where('sent_to', $user->id)
                    ->where('sent_from', $currentUserId);
            })->first();

            if ($invitationAcceptedData) {
                $invitationAccepted   = true;
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

    public function blogs(Request $request) {
        $blogQueries = Blog::whereStatus(true);

        if ($request->category) {
            $category = BlogCategory::where('slug', $request->category)->first();
            $blogQueries->where('category_id', $category->id);
        }

        $blogs = $blogQueries->latest()->get();

        $blog_categories = BlogCategory::whereStatus(true)->get();
        $trending_blogs  = Blog::where('trending', true)->latest()->limit(5)->get();

        return view('frontend.pages.blogs', compact('blogs', 'trending_blogs', 'blog_categories'));
    }

    public function blogDetails(Request $request) {
        $blog_id = $request->id;
        $blog    = Blog::find($blog_id);

        $related_posts = Blog::whereHas('tags', function ($query) use ($blog) {
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
        $packages = SubPackage::with('package', 'package.accesses')->latest()->get();
        // dd($packages);

        return view('frontend.pages.plans', compact('packages'));
    }

    public function photoGallery() {
        $galleries = WeddingGallery::whereStatus(true)->inRandomOrder()->limit(10)->get();

        return view('frontend.pages.wedding-gallery', compact('galleries'));
    }

    public function contact() {
        return view('frontend.pages.contact');
    }

    public function enquiry() {
        return view('frontend.pages.enquiry');
    }

    public function enquirySubmit(Request $request) {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        Enquiry::create($request->only(['name', 'email', 'phone', 'message']));

        Toastr::success('Your enquiry has been submitted successfully.');

        return redirect('/');
    }

}
