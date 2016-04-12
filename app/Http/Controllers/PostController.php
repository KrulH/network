<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $message = 'There was an error!';
        if($request->user()->posts()->save(new Post($request->all())))
        {
            $message = 'Post successfully created!';
        };
        return redirect()->route('dashboard')->with(['message' => $message]);
    }
}
