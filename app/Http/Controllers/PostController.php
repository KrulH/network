<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::all();
        return view('dashboard', ['posts' => $posts]);
    }
    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $message = 'There was an error!';
        if ($request->user()->posts()->save(new Post($request->all()))) {
            $message = 'Post successfully created!';
        };

        return redirect()->route('dashboard')->with(['message' => $message]);
    }
    public function getDeletePost($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted!!']);
    }
}
