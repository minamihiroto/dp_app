<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;

class MainController extends Controller
{
    public function index(){
        $user = Auth::user();
        $param = ['user'=>$user];
        $items = News::orderBy('created_at','desc')->get();
        return view('main.index',['items'=>$items],$param);
    }

    public function instructor(){
        $user = Auth::user();
        $param = ['user'=>$user];
        return view('main.instructor',$param);
    }

    public function lesson(){
        $user = Auth::user();
        $param = ['user'=>$user];
        return view('main.lesson',$param);
    }

    public function online(){
        $user = Auth::user();
        $param = ['user'=>$user];
        return view('main.online',$param);
    }
}
