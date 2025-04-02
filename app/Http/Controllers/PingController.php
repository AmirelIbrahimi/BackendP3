<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function index()
    {
        return  view('ping');
    }
    public function posts()
    {
        $posts = Post::with('user')
            ->latest()
            ->paginate(9);

        return  view('posts', compact('posts'));
    }
    public function show(Post $post){
        return view('show', compact('post'));
    }
}
