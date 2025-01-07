<?php

namespace App\Services;

use App\Models\NotificationHistory;
use App\Models\PushSubscription;
use Exception;
use Illuminate\Support\Facades\Http;

class PushNotificationService {

    public static function send($data) {

        $osurl     = "https://onesignal.com/api/v1/notifications";
        $api_token = "os_v2_app_wl3ocf7z5fckff3eycrakfg6b3miyr7ccrvupc4q2f7km6isity6i72rfpguue7yqmjmj5smwjidxr5aygue6pdatupu7u6iufxk6ti";

        $userId = $data["userId"];

        $notification = [
            "app_id"         => "b2f6e117-f9e9-44a2-9764-c0a20514de0e",
            "target_channel" => "push",
            "headings"       => [
                "en" => $data["title"],
            ],
            "contents"       => [
                "en" => $data["body"],
            ],
        ];

        if ($userId == 'all') {
            $notification["included_segments"] = ["All Users"];
        } else {

            NotificationHistory::create([
                'user_id' => $userId,
                'title'   => $data['title'],
                'body'    => $data['body'],
                'link'    => $data['link'] ?? null,
                'isRead'  => false,
            ]);

            $subscribed_devices                 = PushSubscription::where('user_id', $userId)->pluck('subscription_id')->toArray();
            $notification["include_player_ids"] = $subscribed_devices;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $api_token,
                'Content-Type'  => 'application/json',
            ])->post($osurl, $notification);

            return $response->json();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

}
