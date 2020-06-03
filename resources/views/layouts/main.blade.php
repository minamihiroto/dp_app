@extends('layouts.head')

@section('css')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
@endsection

@section('header')

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/"><span>logo</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="lesson">レッスンメニュー・料金体系</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/#reserve">予約</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/#caution">注意事項</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/#access">アクセス</a>
        </li>
        @if(Auth::check())
          <li class="nav-item dropdown">
            <a class="nav-link" href="/home">{{$user->name}}</a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              オンラインレッスン
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="login">ログイン</a>
              <a class="dropdown-item" href="registar">新規登録</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="online">オンラインとは</a>
            </div>
          </li>
        @endif

      </ul>
    </div>
  </nav>

@endsection

  {{-- content --}}

@section('footer')

<footer>
  <a href="/" class="footer-symbol"><span>symbol</span></a>
  <ul class="footer-link">
    <a href="news"><li>以前のお知らせを見る</li></a>
    <a href="instructor"><li>インストラクターについて詳しく知りたい</li></a>
    <a href="lesson"><li>その他レッスンについてもっと詳しく知りたい</li></a>
    <a href="online"><li>オンラインレッスンについて詳しく知りたい</li></a>
    <a href="https://goo.gl/maps/Xd5oPkoK2QVmriNTA"><li>近隣駐車場のご案内</li></a>
  </ul>
  <div class="footer-access">
    <h4>DEAR PILAT</h4>
    <p class="addless">Addless<br>
      〒594-0031<br>
      和泉市伏屋町5-14-8<br>
      泉北第3ビル 302
    </p>
    <p class="tell">
      Tel<br>
      080-3845-0100
    </p>
  </div>
  <div class="footer-logo">
    <p><a href="#"><img class="facebook" src="/images/facebook_logo.png"></a></p>
    <p><a href="#"><img class="instagram" src="/images/instagram_logo.png"></a></p>
  </div>
</footer>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
