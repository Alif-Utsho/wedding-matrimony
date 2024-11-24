<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller {
    protected $messageService;

    function __construct(MessageService $messageService) {
        $this->middleware('check.access:send-message')->only(['chatNow', 'sendMessage', 'getMessages']);
        $this->messageService = $messageService;
    }

    public function chatNow(Request $request) {
        $user = User::find($request->userId);

        return view('frontend.includes.chat-box', compact('user'));
    }

    public function sendMessage(Request $request) {
        $validatedData = $request->validate([
            'receiver_id' => 'required|integer',
            'message'     => 'required|string',
        ]);

        $message = $this->messageService->send(
            Auth::guard('user')->id(),
            $validatedData['receiver_id'],
            $validatedData['message']
        );

        return response()->json(['message' => $message->message, 'status' => 'Message sent successfully!']);
    }

    public function getMessages(Request $request) {
        $request->validate([
            'receiver_id' => 'required|integer',
        ]);

        $senderId   = Auth::guard('user')->user()->id;
        $receiverId = $request->input('receiver_id');

        $messages = $this->messageService->fetch($senderId, $receiverId);

        return view('frontend.includes.chat-message', compact('messages'));
    }

}
