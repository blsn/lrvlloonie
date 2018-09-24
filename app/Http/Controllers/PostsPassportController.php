<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsPassportController extends Controller
{
    public function __invoke()
    {
        return Post::all();
    }
}
