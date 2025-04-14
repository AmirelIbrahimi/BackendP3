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
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = auth()->id(); // Huidige ingelogde gebruiker
        $post->save();

        return redirect('/posts')->with('success', 'Bericht succesvol aangemaakt!');
    }
}
