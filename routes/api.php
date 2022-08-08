<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPosts;
use App\Http\Controllers\Login;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',  [Login::class, 'login']);

Route::post('create/post',  [MyPosts::class, 'createPost']);

Route::get('posts',  [MyPosts::class, 'getAllPosts']);

Route::get('posts/{id}',  [MyPosts::class, 'getPostDetails']);

Route::put('posts/{id}',  [MyPosts::class, 'updatePost']);

Route::delete('posts/{id}',  [MyPosts::class, 'deletePost']);
