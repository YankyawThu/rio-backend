<?php

namespace App\Services;

use App\Repositories\GameRepository;

class GameService
{
    public function __construct(GameRepository $gameRepo)
    {
        $this->gameRepo = $gameRepo;
    }

    public function index($type, $league)
    {
        $res = $this->gameRepo->index($type, $league);
        return $res;
    }

    public function show($id)
    {
        $res = $this->gameRepo->show($id);
        return $res;
    }
}