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
        return view('frontend.pages.all-profile');
    }

    public function contact() {
        return view('frontend.pages.contact');
    }
}
