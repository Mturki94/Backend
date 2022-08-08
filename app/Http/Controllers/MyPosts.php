<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Posts;
use Illuminate\Support\Facades\Redis;

class MyPosts extends Controller
{

     public function createPost(Request $request)
     {
          $post = new Posts;
          $post->title = $request->input('title');
          $post->description = $request->input('description');
          $post->save();
          return $post;
     }

     public function getAllPosts()
     {
          return Posts::all();
     }


     public function getPostDetails(int $id)
     {
          return Posts::find($id);
     }


     public function updatePost(Request $request, int $id)
     {
          $post = Posts::find($id);
          $post->title = $request->input('title');
          $post->description = $request->input('description');
          return $post->update();
          // abort(404);
     }

     public function deletePost(int $id)
     {
          return Posts::find($id)->delete();
     }
}
