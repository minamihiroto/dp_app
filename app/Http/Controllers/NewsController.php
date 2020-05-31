<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $posts = News::orderBy('created_at', 'desc')->paginate(10);
        return view('news.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('news.create');
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
}
