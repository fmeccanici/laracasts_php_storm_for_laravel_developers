<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'title' => ['required'],
            'body' => ['required'],
        ]);

        return Post::create($request->validated());
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $post->update($request->validated());

        return $post;
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json();
    }
}
