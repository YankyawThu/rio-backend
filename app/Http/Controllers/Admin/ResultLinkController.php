<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameLinkRequest;
use App\Models\Game;
use App\Models\GameLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResultLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameLinkRequest $request)
    {
        $data = $request->validated();

        $game = Game::find($data['game_id']);
        $data['image'] = Storage::putFileAs('links', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);

        GameLink::create($data);

        return redirect()->route('results.show',$game->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(GameLink $gameLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameLink $gameLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GameLink $gameLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gameLink = GameLink::findOrFail($id);
        $game = $gameLink->game;

        $gameLink->delete();

        return redirect()->route('results.show',$game->id);
    }
}
