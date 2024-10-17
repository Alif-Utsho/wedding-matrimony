<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('frontend.auth.login');
    }

    public function register(){
        return view('frontend.auth.register');
    }
}
