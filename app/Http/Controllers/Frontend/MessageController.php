<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    function __construct()
    {
        $this->middleware('check.access:send-message')->only(['chatNow', 'sendMessage', 'getMessages']);
    }

    public function chatNow(Request $request){
        $user = User::find($request->userId);
        
        return view('frontend.includes.chat-box', compact('user'));
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'receiver_id' => 'required|integer',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => Auth::guard('user')->id(),
            'receiver_id' => $request->input('receiver_id'),
            'message' => $request->input('message'),
        ]);

        return response()->json(['message' => $message->message, 'status' => 'Message sent successfully!']);
    }

    public function getMessages(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|integer',
        ]);

        $senderId = Auth::guard('user')->user()->id;
        $receiverId = $request->input('receiver_id');

        $messages = Message::where(function ($query) use ($senderId, $receiverId) {
                            $query->where('sender_id', $senderId)
                                ->where('receiver_id', $receiverId);
                        })
                        ->orWhere(function ($query) use ($senderId, $receiverId) {
                            $query->where('sender_id', $receiverId)
                                ->where('receiver_id', $senderId);
                        })
                        ->orderBy('created_at', 'asc')
                        ->get();
        
        Message::where('sender_id', $receiverId)->where('receiver_id', $senderId)->where('is_read', false)->update(['is_read'=> true]);

        return view('frontend.includes.chat-message', compact('messages'));
    }



}
