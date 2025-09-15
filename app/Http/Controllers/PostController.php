<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }
    public function show($id)
    {
        $post = Post::find($id); // $post = Post::where('title','js')->first();->get() ==> get * matching
        return view('posts.show', [
            'post' => $post
        ]);
    }
    public function create()
    {
        return view('posts.create',);
    }

    public function store() // store(Request $myRequestObject) then i use $myRequestObject
    {
        $data = request()->all();

        // Post::create([
        //     'title' => $data['title'],
        //     'description' => $data['description']
        // ]);

        Post::create($data); // accept available data in model fillable only[title,description]

        return redirect()->route('posts.index', $data);
    }
}
