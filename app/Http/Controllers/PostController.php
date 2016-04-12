<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        $request->user()->posts()->save(new Post($request->all()));
        return redirect()->route('dashboard');
    }
}
