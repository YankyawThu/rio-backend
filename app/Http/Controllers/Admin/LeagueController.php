<?php

namespace App\Http\Controllers\Admin;

use App\Filters\LeagueFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LeagueRequest;
use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LeagueFilter $filter)
    {
        $data = League::filter($filter)->orderBy('id','desc')->paginate(config('enums.itemPerPage'));
        return view('admin.leagues.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leagues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeagueRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::putFileAs('leagues', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
        
        League::create($data);
        
        return redirect()->route('leagues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(League $league)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(League $league)
    {
        return view('admin.leagues.edit',compact('league'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeagueRequest $request, League $league)
    {
        $data = $request->validated();

        if($request->file('image')) {
            $data['image'] = Storage::putFileAs('leagues', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
            Storage::delete($league->image);
        }

        $league->update($data);

        return redirect()->route('leagues.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league)
    {
        Storage::delete($league->image);
        $league->delete();

        return redirect()->route('leagues.index');
    }
}
