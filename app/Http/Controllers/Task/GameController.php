<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function deleteGameRecord()
    {
        $date = date('Y-m-d', strtotime( "-10 days" ));
        Game::whereDate('started_at', '<', $date)->delete();
        return 1;
    }
}
