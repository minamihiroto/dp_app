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
        $user = Auth::user();
        $param = ['user'=>$user];
        $posts = News::orderBy('created_at', 'desc')->paginate(10);
        return view('news.index', ['posts' => $posts],$param);
    }

    public function create()
    {
        $this->middleware('auth');
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
        $this->middleware('auth');
        $params = $request->validate([
            'news_type' => 'required',
            'news_title' => 'required|max:50',
            'news_message' => 'required|max:2000',
        ]);

        $params = new News;
        $params->news_type = $request->news_type;
        $params->news_title = $request->news_title;
        $params->news_message = $request->news_message;
        $params->save();
        
        return redirect()->route('news');
    }

    public function show($id)
    {
        $user = Auth::user();
        $param = ['user'=>$user];
        $post = News::find($id);
        return view('news.show',['post'=>$post],$param);
    }

    public function destroy($id)
    {
        $this->middleware('auth');
        $post = News::find($id)->delete();
        return redirect()->route('news');
    }
}
