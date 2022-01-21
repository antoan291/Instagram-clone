<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        return auth()->user()->likes()->toggle($post);
    }
}
