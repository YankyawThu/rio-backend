<?php

namespace App\Http\Controllers\Admin;

use App\Filters\GameFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameRequest;
use App\Models\League;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GameFilter $filter)
    {
        $time = date('Y-m-d H:i:s', strtotime('-'.config('enums.avgGameduration').' minutes'));
        $leauges = League::all();
        $teams = Team::all();
        $data = Game::filter($filter)->where('started_at', '<', $time)->where('started_at', '<', date('Y-m-d H:i:s'))->orderByDesc('started_at')->paginate(config('enums.itemPerPage'));
        return view('admin.results.index',compact('data', 'leauges', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $game = Game::findOrfail($id);
        return view('admin.results.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $leagues = League::all();
        $game = Game::findOrfail($id);
        return view('admin.results.edit',compact('game','leagues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, $id)
    {
        $data = $request->validated();
        $data = $request->all();
        $game = Game::findOrfail($id);
        $game->update($data);
        
        return redirect()->route('results.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $game = Game::findOrfail($id);
        $game->delete();

        return redirect()->route('results.index');
    }
}
