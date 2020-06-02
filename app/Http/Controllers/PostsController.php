<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Gate;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $param = ['user'=>$user];
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', ['posts' => $posts],$param);
    }

    public function create()
    {
        if(Gate::allows('isAdmin')){
            dd('アクセスが許可されていないユーザです。');
        }else{
            $user = Auth::user();
            $param = ['user'=>$user];
        } 
        return view('posts.create',$param);
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $params = new Post;
        $params->title = $request->title;
        $params->body = $request->body;
        $params->user_id = Auth::user()->id;
        $params->save();
        
        return redirect()->route('post');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });
        return redirect()->route('post');
    }
}
