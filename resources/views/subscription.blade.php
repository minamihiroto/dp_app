@extends('layouts.member')

@section('content')
<section class="home-pay">
<div class="home-pay-title">
  <h1>仮会員登録ありがとうございます。</h1>
  <h2>決済登録をしていただくことで会員登録が完了します</h2>
  <br>
  <p>カードのご登録をすることで、お使いのクレジットカードへのDear Pilatesからの請求（税込み5500円）を承認し、オンラインレッスンの利用規約とプライバシーポリシーに同意したものとみなされます。メンバーシップは自動的に更新されます。</p>
</div>
<form action="/pay" method="post" class="home-pay-btn">
  @csrf
  <script src="https://checkout.pay.jp/" class="payjp-button" data-key="pk_live_951eba840c3cb09aed598e07"></script>
</form>
</section>
@endsection
