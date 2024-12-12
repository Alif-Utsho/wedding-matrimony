<?php

namespace App\Services;

use App\Models\Invitation;
use App\Models\User;
use Exception;

class InvitationService {

    public function getAllReceived($userId) {
        return Invitation::with('from_user', 'from_user.profile')->where('sent_to', $userId)->latest()->get();
    }

    public function getAllSent($userId) {
        return Invitation::with('to_user', 'to_user.profile')->where('sent_from', $userId)->latest()->get();
    }

    public function send($from, $to) {
        $exist = Invitation::where(['sent_from' => $from, 'sent_to' => $to])->count();

        if ($exist) {
            return false;
        }

        try {
            Invitation::create([
                'sent_from' => $from,
                'sent_to'   => $to,
            ]);

            $fromUser = User::find($from);
            $notification = [
                "title"  => "New Invitation",
                "body"   => "$fromUser->name sent you an invitation",
                "userId" => $to,
            ];
            PushNotificationService::send($notification);

        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function cancel($invitationId, $userId) {
        $invitation = Invitation::findOrFail($invitationId);

        if ($invitation->sent_from === $userId || $invitation->sent_to === $userId) {
            $invitation->delete();

            return true;
        }

        return false;
    }

    public function accept($invitationId, $userId) {
        $invitation = Invitation::findOrFail($invitationId);

        if ($invitation->sent_to !== $userId) {
            return [
                'status'  => 'error',
                'message' => 'Unauthorized action.',
            ];
        }

        $invitation->status = true;
        $invitation->save();

        $toUser = User::find($invitation->sent_to);
        $notification = [
            "title"  => "Invitation accepted",
            "body"   => "$toUser->name accepted your invitation",
            "userId" => $invitation->sent_from,
        ];
        PushNotificationService::send($notification);

        return [
            'status'  => 'success',
            'message' => 'Invitation accepted successfully!',
        ];
    }

}
