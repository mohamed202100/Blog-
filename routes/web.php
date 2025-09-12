<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $posts = [
        ['id' => 1, 'title' => 'laravel', 'posted_by' => 'ahmed', 'created_at' => '2022-11-09'],
        ['id' => 2, 'title' => 'JS', 'posted_by' => 'mona', 'created_at' => '2025-03-12'],
    ];
    return view('test', ['posts' => $posts]);
});
