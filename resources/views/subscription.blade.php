@extends('layouts.member')

@section('content')
<div class="home-pay-title">
  <h1>仮会員登録ありがとうございます。</h1>
  <p>決済登録をしていただくことで会員登録が完了します</p>
</div>
<form action="/pay" method="post" class="home-pay-btn">
  @csrf
  <script src="https://checkout.pay.jp/" class="payjp-button" data-key="pk_test_7282c17c52238bc44fdcbfd2"></script>
</form>
@endsection
