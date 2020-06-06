<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $stripeCustomer = $user->createOrGetStripeCustomer();
        return view('update-payment-method', [
          'intent' => $user->createSetupIntent()
        ]);

        $param = ['user'=>$user];
        return view('home',$param);
    }
    public function contact(Request $request)
    {

        return view('home');
    }
    public function storePaymentInfo(Request $request){

      $paymentMethod = $request->stripeToken;
      $user = Auth::user(); //要するにUser情報を取得したい
      $ret = null;
      $user->addPaymentMethod($paymentMethod);

      $param = ['user'=>$user];
      return view('home',$param);
    }
}
