<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

trait NotificationTrait {

    function sendNotification($title, $body)
    {
        $apiUrl = 'https://fcm.googleapis.com/fcm/send';
        $apiKey = 'AAAAGzv0wPE:APA91bGDsbeQZNepSM1A72QQNpp0LdzCszykMRWOyA3A8FTCfELYcGoZRK4uObp9JAMOgwtY1RcgE3OLmRbD9YvO5MC0QU8--SDIV0Ju4_2J6_pyAPkkYo2-__-cp8NefAHFvD9PlzNW';
        $topic = 'all_noti';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$apiKey
        ])->post($apiUrl, [
            "notification" => [
                'title' => $title,
                'body' => $body,
            ],
            "to" => '/topics/'.$topic
        ]);
        return $response;
    }
}