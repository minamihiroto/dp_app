<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use Mail;

class MainController extends Controller
{
    public function index(){
        $user = Auth::user();
        $param = ['user'=>$user];
        $items = News::orderBy('created_at','desc')->paginate(5);
        return view('main.index',['items'=>$items],$param);
    }

    // public function contact(Request $request){
    //     if ($request->isMethod('POST')){
    //         $params = $request->validate([
    //             'name' => 'required',
    //             'email' => 'required|email',
    //             'detail' => 'required|max:1000',
    //             'g-recaptcha-response' => 'required|captcha',
    //         ]);

    //         $name=$request->name;
    //         $email=$request->email;
    //         $tel=$request->tel;
    //         $detail=$request->detail;
    //         Mail::raw("お名前：".$name."\n"."メールアドレス：".$email."\n"."電話番号：".$tel."\n"."内容：".$detail, function($message) {
    //         $message->to("dearpilates.yukinco@gmail.com")->subject('お問い合わせメール');
    //     });
    //     }
    //     return redirect('/#contact')->with('message', 'お問い合わせを送信しました');
    // }

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

    public function agreement(){
        $user = Auth::user();
        $param = ['user'=>$user];
        return view('caution.agreement',$param);
    }

    public function privacy(){
        $user = Auth::user();
        $param = ['user'=>$user];
        return view('caution.privacy',$param);
    }

}
