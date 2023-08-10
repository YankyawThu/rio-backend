<?php

namespace App\Http\Controllers\Admin;

use App\Filters\GameFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameRequest;
use App\Models\League;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GameFilter $filter)
    {
        $data = Game::filter($filter)->orderBy('id','desc')->paginate(30);
        return view('admin.games.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leagues = League::all();
        return view('admin.games.create',compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        $data = $request->validated();
        Game::create($data);
        
        return redirect()->route('games.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $leagues = League::all();
        return view('admin.games.edit',compact('game','leagues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, Game $game)
    {
        $data = $request->validated();
        $data = $request->all();
        $game->update($data);
        
        return redirect()->route('games.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index');
    }
}
