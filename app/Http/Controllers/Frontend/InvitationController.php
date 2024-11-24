<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\User;
use App\Services\InvitationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller {
    protected $invitationService;

    function __construct(InvitationService $invitationService) {
        $this->middleware('check.access:send-interest')->only(['sendInvitation']);
        $this->invitationService = $invitationService;
    }

    public function invitations() {
        $user = User::find(Auth::guard('user')->user()->id);

        $invitations      = $this->invitationService->getAllReceived($user->id);
        $sent_invitations = $this->invitationService->getAllSent($user->id);

        return view('frontend.user.invitations', compact('invitations', 'sent_invitations'));
    }

    public function sendInvitation(Request $request) {
        $request->validate([
            'userId' => 'required',
        ]);

        $result = $this->invitationService->send(Auth::guard('user')->id(), $request->userId);

        if ($result) {
            return response()->json([
                'message' => 'Invitation sent successfully!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Something went wrong!',
            ], 400);
        }

    }

    public function cancelInvitation(Request $request) {
        $request->validate([
            'invitationId' => 'required|exists:invitations,id',
        ]);

        $userId = Auth::guard('user')->user()->id;
        $result = $this->invitationService->cancel($request->invitationId, $userId);

        if ($result) {
            Toastr::success('Invitation canceled successfully.');

            return redirect()->back();
        } else {
            Toastr::error('Something went wrong!');

            return redirect()->back();
        }

    }

    public function acceptInvitation(Request $request) {
        $request->validate([
            'invitationId' => 'required|exists:invitations,id',
        ]);

        $userId = Auth::guard('user')->user()->id;
        $result = $this->invitationService->accept($request->invitationId, $userId);

        Toastr::error($result['message']);

        return redirect()->back();
    }

    public function denyInvitation(Request $request) {
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
