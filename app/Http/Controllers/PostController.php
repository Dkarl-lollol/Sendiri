<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2); 

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        

        $this->validate($request, [
            'body' => 'required'
        ]);

        // auth()->user()->posts()->create($request->only('body'));
        Post::create($request->all() + ['user_id' => auth2()->id()]);


        return redirect()->route('dashboard');

    }
}
