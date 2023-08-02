<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Http\Resources\BlogCollection;

class BlogController extends Controller
{
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request)
    {
        $res = $this->blogService->get($request->nextId);
        return resSuccess(new BlogCollection($res));
    }
}
