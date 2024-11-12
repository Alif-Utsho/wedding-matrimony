<?php

namespace App\Services;

use App\Models\City;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageService
{
    public function send($senderId, $receiverId, $message){
        return Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message' => $message,
        ]);
    }

    public function fetch($senderId, $receiverId){
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

        return $messages;
    }

    public function list($userId){
        $receiverIds = Message::where('sender_id', $userId)
                    ->latest()
                    ->pluck('receiver_id')
                    ->unique();
        $senderIds = Message::where('receiver_id', $userId)
                    ->latest()
                    ->pluck('sender_id')
                    ->unique();
        $chatListUserIds = $receiverIds->merge($senderIds)->unique();

        $chatListUsers = User::whereIn('id', $chatListUserIds)->get();

        foreach($chatListUsers as $chatuser){
            $message = Message::where('sender_id', $chatuser->id)->orWhere('receiver_id', $chatuser->id)->latest()->first();
            $unread_count = Message::where('sender_id', $chatuser->id)->where('receiver_id', $userId)->where('is_read', false)->count();
            $chatuser->message = $message;
            $chatuser->unread = $unread_count;
        }

        $chatListUsers = $chatListUsers->sortByDesc(function($chatuser) {
            return $chatuser->message ? $chatuser->message->created_at : now()->subYears(100);
        });

        return $chatListUsers;
    }
}