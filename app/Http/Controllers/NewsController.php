<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use Gate;

class NewsController extends Controller
{
    public function index()
    {
        $posts = News::orderBy('created_at', 'desc')->paginate(10);
        return view('news.index', ['posts' => $posts]);
    }

    public function create()
    {
        if(Gate::allows('isAdmin')){
            $user = Auth::user();
            $param = ['user'=>$user];   
        }else{
            dd('アクセスが許可されていないユーザです。');
        } 

        return view('news.create',$param);
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'news_title' => 'required|max:50',
            'news_message' => 'required|max:2000',
        ]);

        $params = new News;
        $params->news_title = $request->news_title;
        $params->news_message = $request->news_message;
        $params->save();
        
        return redirect()->route('news');
    }

    public function show($id)
    {
        $post = News::find($id);
        return view('news.show',['post'=>$post]);
    }

    public function destroy($id)
    {
        $post = News::find($id)->delete();
        return redirect()->route('news');
    }
}
