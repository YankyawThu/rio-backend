<?php

namespace App\Http\Controllers\Admin;

use App\Filters\BlogFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    use NotificationTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BlogFilter $filter)
    {
        $data = Blog::filter($filter)->orderBy('id','desc')->paginate(config('enums.itemPerPage'));
        return view('admin.blogs.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlogRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::putFileAs('blogs', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
        
        Blog::create($data);
        
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        if($request->file('image')) {
            $data['image'] = Storage::putFileAs('blogs', $request->file('image'), Str::uuid().'.jpg', ['visibility' => 'public']);
            Storage::delete($blog->image);
        }

        $blog->update($data);

        return redirect()->route('blogs.show',$blog);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Storage::delete($blog->image);
        $blog->delete();

        return redirect()->route('blogs.index');
    }

    public function sendNoti($id) 
    {
        $blog = Blog::findOrFail($id);
        $title = config('enums.noti.title.blog');
        $body = $blog->title;
        $response = $this->sendNotification($title, $body);
        Log::info('Blog Noti Res '.$id.' '.$response->body());
        return back();
    }
}
