<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GameService;
use App\Http\Resources\GameCollection;
use App\Http\Resources\Game;
use App\Traits\ValidationTrait;

class GameController extends Controller
{
    use ValidationTrait;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function index(Request $request)
    {
        $validator = $this->verify($request, 'api.game');
        if($validator->fails()) {
            $message = $validator->errors()->first();
            return resBadRequest($message);
        }
        $type = $request->type;
        $league = $request->league;
        $res = $this->gameService->index($type, $league ?? null);
        return resSuccess(new GameCollection($res));
    }
    
    public function show($id)
    {
        $res = $this->gameService->show($id);
        if(!$res) {
            return resNotFound();
        }
        return resSuccess(new Game($res));
    }

    public function result(Request $request)
    {
        $validator = $this->verify($request, 'api.gameResult');
        if($validator->fails()) {
            $message = $validator->errors()->first();
            return resBadRequest($message);
        }
        $date = $request->date;
        $league = $request->league;
        $res = $this->gameService->result($date, $league);
        return resSuccess(new GameCollection($res));
    }
}
