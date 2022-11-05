<?php

namespace App\Http\Controllers;

use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        PruneOldPostsJob::dispatch();
        $allposts= Post::orderBy('created_at','desc')->paginate(15);
        return view('posts.index', [
          'posts' => $allposts,
        ]);
    }
    public function create()
    {
        $allUsers = User::all();
        return view('posts.create', [

            'allUsers' => $allUsers
        ]);
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {

        $arr=POST::find($postId);
        return  view('posts.show',[
            'post' => $arr
        ]);
    }

    public function store()
    {
        request()->validate([
            'title'=> ['required','unique:posts', 'min:3'],
            'description'=> ['required','min:10']
        ]);
        $data = request()->all();
        Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator']
        ]);


       return redirect()->route('posts.index');
    }

    public function edit($view){
        $singlePost = Post::find($view);
        return view('posts.edit',[
            'post'=>$singlePost
        ]);
    }

    public function update($update){
        $upTodate=request()->all();
        $singlePost = Post::find($update);
        $singlePost->update([
            'title' => request()->title,
            'description' => $upTodate['description']
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy($post){
        $singlePost = Post::find($post);
        $singlePost->delete();
        return redirect()->route('posts.index');
    }
}
