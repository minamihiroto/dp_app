<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($params['post_id']);
        
        $comment=new Comment();
        $comment->post_id=$params['post_id'];
        $comment->user_id=Auth::user()->id;
        $comment->body=$params['body'];
        $comment->save();
        // return redirect('/');
        return redirect()->route('posts.show', ['post' => $post]);
    }
}
