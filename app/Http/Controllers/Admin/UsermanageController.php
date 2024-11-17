<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsermanageController extends Controller
{
    public function usermanage(){
        $users = User::latest()->get();
        
        return view('backend.user.manage', compact('users'));
    }
}
