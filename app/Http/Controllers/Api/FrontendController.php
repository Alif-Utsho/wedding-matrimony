<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WeddingStep;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $services = Service::whereStatus(true)->latest()->get();
        $testimonials = Testimonial::whereStatus(true)->latest()->get();
        $wedding_steps = WeddingStep::whereNull('wedding_id')->whereStatus(true)->get();
        
        return response()->json(compact('services', 'testimonials', 'wedding_steps'));
    }
}
