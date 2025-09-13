<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'laravel', 'description' => 'This is description', 'posted_by' => 'ahmed', 'created_at' => '2022-11-09'],
            ['id' => 2, 'title' => 'JS', 'description' => 'This is description', 'posted_by' => 'mona', 'created_at' => '2025-03-12'],
        ];
        return view('posts.index', ['posts' => $posts]);
    }
    public function show($post)
    {
        $post = ['id' => 1, 'title' => 'laravel', 'description' => 'This is description', 'posted_by' => 'ahmed', 'created_at' => '2022-11-09'];

        return view('posts.show', [
            'post' => $post
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return redirect()->route('posts.index');
    }
}
