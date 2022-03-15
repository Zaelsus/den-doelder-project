<?php

namespace App\Http\Controllers;

use App\Models\Post;

class WelcomeController extends Controller
{

    /**
     * Display the specified resource.
     *
     */
    public function show()
    {
        // Take the 3 newest posts
        $latestPosts = Post::orderBy('published_at', 'desc')->take(3)->get();

        return view('welcome', compact('latestPosts'));
    }
}
