<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;

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
      \Payjp\Payjp::setApiKey("sk_test_94616d42151d53e689f66764");
      $cu=\Payjp\Customer::create(array(
              "card" =>$token,
              "description" => $request->user()->email
      ));
      $user =$request->user();

      \Payjp\Subscription::create(
              array(
                      "customer" => $cu,
                      "plan" => "pln_1cc76bc7b5618d218ba9903b45b1"
              )
      );
      $user->payjp_subscription="PAY";
      $user->save();
      $param = ['user'=>$user];
      return view('home',$param);
    }

    public function contact(Request $request)
    {
        return view('home');
    }
}
