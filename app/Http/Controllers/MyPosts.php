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
          // $request->validate([
          //      'title' => ['required', 'unique:posts', 'max:255'],
          //      'description' => ['required']
          // ]);

          $this->validate(
               $request,
               [
                    'title' => ['required', 'unique:posts', 'max:255'],
                    'description' => ['required', 'max:600']
               ],
               [
                    'required' => 'Why the :attribute field empty?',
                    'title.unique' => 'Post title should be unique',
                    'description.max' => 'Description cannot exceed 600 char'
               ]
          );


          $post->title = $request->input('title');
          $post->description = $request->input('description');
          $post->save();
          return response($post, 200);
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

          $request->validate([
               'title' => ['required', 'unique:posts', 'max:255'],
               'description' => ['required']
          ]);

          $post->title = $request->input('title');
          $post->description = $request->input('description');
          $post->update();

          return response($post, 200);
     }

     public function deletePost(int $id)
     {
          Posts::find($id)->delete();
          return response(['Message' => 'Post Deleted successfully']);
     }
}
