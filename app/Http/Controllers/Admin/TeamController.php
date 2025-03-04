<?php

namespace App\Http\Controllers\Admin;

use App\Filters\TeamFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\League;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TeamFilter $filter)
    {
        $data = Team::filter($filter)->orderBy('id','desc')->paginate(config('enums.itemPerPage'));
        $leauges = League::withTrashed()->get();
        return view('admin.teams.index',compact('data', 'leauges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leagues = League::withTrashed()->get();
        return view('admin.teams.create',compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $data = $request->validated();

        if($request->file('image')) {
            $data['image'] = Storage::putFileAs('teams', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
        }

        Team::create($data);
        
        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $leagues = League::all();
        return view('admin.teams.edit',compact('team','leagues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team)
    {
        $data = $request->validated();

        if($request->file('image')) {
            $data['image'] = Storage::putFileAs('teams', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
            Storage::delete($team->image);
        }

        $team->update($data);

        return redirect()->route('teams.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        Storage::delete($team->image);
        $team->delete();

        return redirect()->route('teams.index');
    }

    public function teamsByLeagueId(Request $request)
    {
        $data = Team::where('league_id', $request->league_id)->get();

        return response()->json($data);
    }
}
