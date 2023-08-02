<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\Blog;

class BlogController extends Controller
{
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request)
    {
        $res = $this->blogService->index($request->nextId);
        return resSuccess(new BlogCollection($res));
    }

    public function show($id)
    {
        $res = $this->blogService->show($id);
        if(!$res) {
            return resNotFound();
        }
        return resSuccess(new Blog($res));
    }
}
