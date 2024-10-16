<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ourteam;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WeddingStep;
use App\Models\Blog;
use App\Models\Wedding;

class FrontendController extends Controller
{
    public function index() {
        $services = Service::whereStatus(true)->latest()->get();
        $testimonials = Testimonial::whereStatus(true)->latest()->get();
        $wedding_steps = WeddingStep::whereNull('wedding_id')->whereStatus(true)->get();
        $ourteams = Ourteam::whereStatus(true)->get();
        $blogs = Blog::whereStatus(true)->latest()->limit(3)->get();
        $weddings = Wedding::whereStatus(true)->get();

        
        return view('frontend.index', compact('services', 'testimonials', 'wedding_steps', 'ourteams', 'blogs', 'weddings'));
    }

    public function weddingDetails($id){
        $wedding = Wedding::find($id);
        if(!$wedding){
            return redirect('/')->with('error', 'Wedding not Found!');
        }

        return view('frontend.pages.wedding-details', compact('wedding'));
    }

    public function contact() {
        return view('frontend.pages.contact');
    }
}