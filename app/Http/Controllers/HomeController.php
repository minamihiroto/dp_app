<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
      if(Gate::denies('isAdmin')){
        if($user->payjp_subscription==null){
          return view('subscription');
        }
      }
        $param = ['user'=>$user];
        return view('home',$param);
    }

    public function pay(Request $request)
    {
      $token=$request->all()['payjp-token'];
      \Payjp\Payjp::setApiKey("sk_live_2d5ade1b8b83fee8539f6e557f6a9a66408b23b2587fb7b409a51063");
      $cu=\Payjp\Customer::create(array(
              "card" =>$token,
              "description" => $request->user()->email
      ));
      $user =$request->user();

      $subscription=\Payjp\Subscription::create(
              array(
                      "customer" => $cu,
                      "plan" => "pln_247629285b91c98386a0c8535c4e"
              )
      );

      $user->payjp_subscription=$subscription->id;
      $user->save();
      $param = ['user'=>$user];
      return view('home',$param);
    }

    public function contact(Request $request)
    {
        return view('home');
    }

    public function cansel(){
      $user = Auth::user();
      if(Gate::denies('isAdmin')){
        if($user->payjp_subscription==null){
          return view('subscription');
        }
      }
        $param = ['user'=>$user];
        return view('cansel',$param);
    }

    public function delete($id)
    {
        $user=User::find($id);
        \Payjp\Payjp::setApiKey("sk_live_2d5ade1b8b83fee8539f6e557f6a9a66408b23b2587fb7b409a51063");
        $su = \Payjp\Subscription::retrieve($user->payjp_subscription);
        $su->pause();
        $user->delete();
        return redirect('/')->with('message', '会員登録を停止しました。');
    }
}
