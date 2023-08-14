<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ChannelFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChannelRequest;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChannelFilter $filter)
    {
        $data = Channel::filter($filter)->orderBy('id','desc')->paginate(30);
        return view('admin.channels.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.channels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChannelRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::putFileAs('channels', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
        
        Channel::create($data);
        
        return redirect()->route('channels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        return view('admin.channels.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        return view('admin.channels.edit',compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChannelRequest $request, Channel $channel)
    {
        $data = $request->validated();

        if($request->file('image')) {
            $data['image'] = Storage::putFileAs('channels', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
            Storage::delete($channel->image);
        }

        $channel->update($data);

        return redirect()->route('channels.show',$channel);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        Storage::delete($channel->image);
        $channel->delete();

        return redirect()->route('channels.index');
    }
}
