<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function invitations(){
        $user = User::find(Auth::guard('user')->user()->id);

        $invitations = Invitation::where('sent_to', $user->id)->latest()->get();
        $sent_invitations = Invitation::where('sent_from', $user->id)->latest()->get();
        return view('frontend.user.invitations', compact('invitations', 'sent_invitations'));
    }

    public function sendInvitation(Request $request){
        $request->validate([
            'userId' => 'required',  
        ]);
    
        Invitation::create([
            'sent_from' => Auth::guard('user')->user()->id, 
            'sent_to' => $request->userId,  
        ]);
    
        return response()->json([
            'message' => 'Invitation sent successfully!'
        ], 200);

    }
}
