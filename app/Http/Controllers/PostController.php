<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost(Post $post){
        if (auth()->user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect('/');


    }

    public function actuallyUpdatePost(Post $post, Request $request){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        $incomingsFields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($incomingsFields);
        return redirect('/');
    }
    public function showEditScreen(Post $post){
        if (auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }
    public function createPost(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }

}
