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
      \Payjp\Payjp::setApiKey("sk_test_222ead2fa625776334712971");
      $cu=\Payjp\Customer::create(array(
              "card" =>$token,
              "description" => $request->user()->email
      ));
      $user =$request->user();

      \Payjp\Subscription::create(
              array(
                      "customer" => $cu,
                      "plan" => "pln_87e0b8a8f25c77c0c0f3a576452d"
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

    public function delete($id)
    {
        User::find($id)->delete(); // softDelete
 
        return redirect('/register')->with('message', '会員登録を停止しました。');
    }
}
