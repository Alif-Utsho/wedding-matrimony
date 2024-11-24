<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller {
    protected $messageService;

    function __construct(MessageService $messageService) {
        $this->middleware('check.access:send-message')->only(['chatNow', 'sendMessage', 'getMessages']);
        $this->messageService = $messageService;
    }

    public function sendMessage(Request $request) {
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required|integer',
            'message'     => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'Validation failed',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $message = $this->messageService->send(
            Auth::guard('api')->id(),
            $request->input('receiver_id'),
            $request->input('message')
        );

        return response()->json([
            'status'  => 'success',
            'message' => 'Message sent successfully',
        ], Response::HTTP_OK);
    }

    public function getMessages(Request $request) {
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'Validation failed',
                'errors' => $validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $senderId   = Auth::guard('api')->user()->id;
        $receiverId = $request->input('receiver_id');

        $messages = $this->messageService->fetch($senderId, $receiverId);

        return response()->json([
            'status' => 'success',
            'data'   => $messages,
        ], Response::HTTP_OK);
    }

    public function chatList() {
        $userId = Auth::guard('api')->id();

        $chatlist = $this->messageService->list($userId);

        return response()->json([
            'status'   => 'success',
            'chatlist' => $chatlist,
        ], Response::HTTP_OK);
    }

}
