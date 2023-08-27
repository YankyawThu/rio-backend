<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;
use App\Filters\AdsFilter;
use App\Http\Requests\Admin\AdsRequest;
use App\Http\Requests\Admin\UpdateAdsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdsFilter $filter)
    {
        $data = Ads::filter($filter)->orderBy('id','desc')->paginate(config('enums.perPage'));
        return view('admin.ads.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    public function createVideo()
    {
        return view('admin.ads.createVideo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdsRequest $request)
    {
        $data = $request->validated();
        if($request->file('video_url')) {
            $data['video_url'] = Storage::putFileAs('ads', $request->file('video_url'), Str::uuid().'.mp4', ['visibility' => 'public']);
        }
        if($request->file('image')) {
            $data['image'] = Storage::putFileAs('ads', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
        }
        Ads::create($data);
        
        return redirect()->route('ads.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ads = Ads::findOrFail($id);
        return view('admin.ads.edit', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdsRequest $request, $id)
    {
        $data = $request->validated();
        $ads = Ads::findOrfail($id);
        if($request->file('video_url')) {
            $data['video_url'] = Storage::putFileAs('ads', $request->file('video_url'), Str::uuid().'.mp4', ['visibility' => 'public']);
        }
        if($request->file('image')) {
            $data['image'] = Storage::putFileAs('ads', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
        }
        $ads->update($data);
        
        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ads = Ads::findOrfail($id);
        if($ads->video_url) {
            Storage::delete($ads->video_url);
        }
        if($ads->image) {
            Storage::delete($ads->image);
        }
        $ads->delete();

        return redirect()->route('ads.index');
    }
}
