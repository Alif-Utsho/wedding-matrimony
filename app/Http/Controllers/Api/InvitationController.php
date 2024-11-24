<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\InvitationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class InvitationController extends Controller {
    protected $invitationService;

    function __construct(InvitationService $invitationService) {
        $this->middleware('check.access:send-interest')->only(['sendInvitation']);
        $this->invitationService = $invitationService;
    }

    public function invitations() {
        $user = User::find(Auth::guard('api')->user()->id);

        $invitations      = $this->invitationService->getAllReceived($user->id);
        $sent_invitations = $this->invitationService->getAllSent($user->id);

        return response()->json([
            'status' => 'success',
            'data'   => [
                'received_invitations' => $invitations,
                'sent_invitations'     => $sent_invitations,
            ],
        ], Response::HTTP_OK);
    }

    public function sendInvitation(Request $request) {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $result = $this->invitationService->send(Auth::guard('api')->id(), $request->userId);

        if ($result) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Invitation sent successfully!',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong!',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function cancelInvitation(Request $request) {
        $validator = Validator::make($request->all(), [
            'invitationId' => 'required|exists:invitations,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userId = Auth::guard('api')->user()->id;
        $result = $this->invitationService->cancel($request->invitationId, $userId);

        if ($result) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Invitation canceled successfully!',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong!',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function acceptInvitation(Request $request) {
        $validator = Validator::make($request->all(), [
            'invitationId' => 'required|exists:invitations,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $userId = Auth::guard('api')->user()->id;
        $result = $this->invitationService->accept($request->invitationId, $userId);

        return response()->json([
            'status'  => $result['status'],
            'message' => $result['message'],
        ], $result['status'] === 'success' ? Response::HTTP_OK : Response::HTTP_FORBIDDEN);
    }

}
