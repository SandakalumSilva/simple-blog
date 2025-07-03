<?php

namespace App\Http\Controllers;

use App\Models\Post;
// Removed Illuminate\Http\Request as it's no longer used.
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show individual post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Show form to create a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(StorePostRequest $request) // Changed type-hint to StorePostRequest
    {
        // Validation is now handled by StorePostRequest before this method is called.
        // The $request->validate(...) call is no longer needed here.

        Post::create($request->validated()); // Use validated data from the form request

        return redirect()->route('posts.index');
    }
}
