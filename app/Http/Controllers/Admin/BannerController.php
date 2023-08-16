<?php

namespace App\Http\Controllers\Admin;

use App\Filters\BannerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BannerFilter $filter)
    {
        $data = Banner::filter($filter)->orderBy('id','desc')->paginate(config('enums.itemPerPage'));
        return view('admin.banners.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::orderBy('id','desc')->get();
        return view('admin.banners.create',compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $data = $request->validated();

        if($request->type == "advertisement") {
            if($request->file('image')) {
                $data['image'] = Storage::putFileAs('banners', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
            }
        }

        Banner::create($data);

        return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $data = $request->validated();
        
        if($banner->type == "advertisement") {
            if($request->file('image')) {
                $data['image'] = Storage::putFileAs('banners', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
                Storage::delete($banner->image);
            }
        }

        $banner->update($data);

        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if($banner->image) {
            Storage::delete($banner->image);
        } 
        $banner->delete();

        return redirect()->route('banners.index');
    }
}
