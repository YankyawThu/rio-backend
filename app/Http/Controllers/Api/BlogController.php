<?php

namespace App\Http\Controllers\Api;

use App\Filters\BlogFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogFilter $filter)
    {
        $data = Blog::filter($filter)->orderBy('id','desc')->paginate(30);
        return response()->success(data: BlogResource::collection($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->success(data: new BlogResource($blog));
    }
}
