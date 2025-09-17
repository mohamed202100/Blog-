<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view(
            'posts.index',
            ['posts' => $posts],
        );
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
        return view('posts.create', [
            'users' => User::all()
        ]);
    }

    public function store() // store(Request $myRequestObject) then i use $myRequestObject
    {
        $data = request()->all();

        // Post::create([
        //     'title' => $data['title'],
        //     'description' => $data['description']
        // ]);

        Post::create($data); // accept available data in model fillable only[title,description]

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $user = User::find($post->user_id);
        $user_name = $user->name;
        return view(
            'posts.edit',
            [
                'post' => $post,
                'users' => User::all(),
                'user_name' => $user_name
            ]
        );
    }

    public function update(Request $req, $id)
    {
        $post  = Post::find($id);
        $post->title = $req->title;
        $post->description = $req->description;
        $post->user_id = $req->user_id;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
