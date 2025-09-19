<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
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

    public function store(StorePostRequest $request) // store(Request $myRequestObject) then i use $myRequestObject
    {
        // $data = request()->all();

        // we can use our request ->make:request <name> and adding the message and rules

        // $request->validate([
        //     "title" => ['required', 'min:3'],
        //     "description" => ['required', 'min:5'],
        //     "user_id" => ['required'],
        // ], [
        //     "title.required" => 'watch out the title is required'
        // ]);
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        // Post::create($data); // accept available data in model fillable only[title,description]

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view(
            'posts.edit',
            [
                'post' => $post,
                'users' => User::all(),
            ]
        );
    }

    public function update(Request $req, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $req->title;
        $post->description = $req->description;
        $post->user_id = $req->user_id;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        //Post::destroy($id);
        return redirect()->route('posts.index');
    }
}
