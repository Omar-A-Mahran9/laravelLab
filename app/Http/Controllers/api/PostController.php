<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //
    public function index()
    {
        $post= Post::all();
        return PostResource::collection($post);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return new PostResource($post);
    }

    public function store()
    {

        return Post::all();
    }
}
