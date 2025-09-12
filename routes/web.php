<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test2', [TestController::class, 'testAction']);

Route::get('/test', function () {});
