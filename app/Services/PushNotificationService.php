<?php

namespace App\Services;

use Exception;
use Google\Auth\ApplicationDefaultCredentials;
use Illuminate\Support\Facades\Http;

class PushNotificationService {

    public function send() {

        $fcmurl = "https://fcm.googleapis.com/v1/projects/onssnew/messages:send";

        $notification = [
            "to"           => "news",
            "notification" => [
                "title" => "Test tile",
                "body"  => "Notification test body",
            ],
            "data"         => [
                "story_id" => "story_12345",
            ],
            "token"        => "caWhJG5gRvqtRMQrTJaH25:APA91bHKEPs1I6scpF1JTk-aAR9sAK9V4oXwqLRClYhV5Ku7ul8alIJyvgslHE10_0Q0yEmxsGyzbINMHPEpE4gAi82Ij6RC0B-8p_-WHrHrcaqkSZrcE1w",
        ];

        try {
            $response = Http::withHeaders([
                'Authentication' => 'Bearer ' . $this->getAccessToken(),
                'content-Type'   => 'application/json',
            ])->post($fcmurl, ['message' => $notification]);
            return $response->json();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function getAccessToken() {
        $keyPath = config('services.firebase.key_path');

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $keyPath);

        $scopes = ['https://www.googleapis.com/auth/firebase.messaging'];

        $credentials = ApplicationDefaultCredentials::getCredentials($scopes);

        $token = $credentials->fetchAuthToken();

        return $token['access_token'] ?? null;
    }

}
