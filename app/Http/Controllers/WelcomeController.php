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
        return view('welcome');
    }
}
