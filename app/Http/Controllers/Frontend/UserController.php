<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('frontend.user.dashboard');
    }

    public function profileEdit(){
        return view('frontend.user.profile-edit');
    }
}
