<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Log;
use App\Traits\NotificationTrait;

class NotiController extends Controller
{
    use NotificationTrait;

    public function sendLiveNoti()
    {
        $title = 'LIVE NOW';
        $now = date('Y-m-d H:i');
        $lives = Game::where('started_at', 'like', $now.'%')->get();
        foreach($lives as $live) {
            $teamA = $live->teamA;
            $teamB = $live->teamB;
            $body = $teamA->name.' vs '.$teamB->name.' is available now';
            $response = $this->sendNotification($title, $body);
            Log::info('Noti Res for gameId '.$live->id.' '.$response->body());
        }
        return 1;
    }
}
