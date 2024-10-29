<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Toastr;


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

    public function cancelInvitation(Request $request)
    {
        $request->validate([
            'invitationId' => 'required|exists:invitations,id',
        ]);

        $invitation = Invitation::findOrFail($request->invitationId);
        $userId = Auth::guard('user')->user()->id;

        if ($invitation->sent_from === $userId || $invitation->sent_to === $userId) {
            $invitation->delete();
    
            Toastr::success('Invitation canceled successfully.');
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['message' => 'Unauthorized action.']);

    }

    public function acceptInvitation(Request $request)
    {
        $request->validate([
            'invitationId' => 'required|exists:invitations,id',
        ]);

        $invitation = Invitation::findOrFail($request->invitationId);

        if ($invitation->sent_to !== Auth::guard('user')->user()->id) {
            if ($request->ajax()) {
                return response()->json([
                    'message' => 'Unauthorized action.',
                ], 403);
            }
            return redirect()->back()->withErrors(['message' => 'Unauthorized action.']);
        }

        $invitation->status = true;
        $invitation->save();

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Invitation accepted successfully!',
            ], 200);
        }
        Toastr::success('Invitation accepted successfully.');
        return redirect()->back();
    }

    public function denyInvitation(Request $request)
    {
        $request->validate([
            'invitationId' => 'required|exists:invitations,id',
        ]);

        $invitation = Invitation::findOrFail($request->invitationId);

        if ($invitation->sent_to !== Auth::guard('user')->user()->id) {
            return redirect()->back()->withErrors(['message' => 'Unauthorized action.']);
        }

        // $invitation->status = false;
        // $invitation->save();
        $invitation->delete();

        Toastr::success('Invitation denied successfully.');
        return redirect()->back();
    }
}
