@extends('layouts.main')
@section('body_class','top-body')
@section('content')

<img class="top-image" src="/images/top-page.png">
<img class="top-image-420" src="/images/top-page-420.png">

  <section class="billboard">
    <a href="https://airrsv.net/dearpilates/calendar" class="top-button">
      <h2>体験予約・スケジュール確認</h2>
      <p>初めての方はコチラから ＞＞</p>
    </a>
  </section>

  <section class="news">
    <div class="news-links" role="alert">
      <ul>
      @if(count($items) > 0)
        @foreach($items as $item)
            <li><a class="news-link" href="/news/{{$item->id}}"><span class="news-date">{{$item->created_at->format('m/d：')}}</span>{{ $item->news_title }}</a></li>
        @endforeach
            <li class="news-before"><a class="news-before-link news-link" href="/news">以前のお知らせを見る ＞＞</a></li>
      @else
            <li>投稿記事がありません</li>
      @endif
      </ul>
    </div>
  </section>

  <section class="instructor-about">
      <a class="btn" href="/instructor">インストラクターについて詳しく知りたい ＞＞</a>
  </section>

  <section class="lesson-about">
      <a class="btn" href="lesson">その他レッスンについてもっと詳しく知りたい ＞＞</a>
  </section>

  <section class="online-about">
      <a class="btn" href="online">オンラインレッスンについて詳しく知りたい ＞＞</a>
  </section>

  <section class="reserve" id="reserve">
    <a href="https://airrsv.net/dearpilates/calendar" class="btn-push">予約スケジュールを見る</a>  
  </section>

  <section class="contact" id="contact">
    <form method="POST" action="{{url('contact')}}">
      @csrf
      <div class="contact-form">
        <div class="contact-text">
          <p><input class="contact-text-content" type="text" name="name" placeholder="お名前※必須項目"></p>
          <p><input class="contact-text-content" type="text" name="email" placeholder="メールアドレス※必須項目"></p>
          <p><input class="contact-text-content" type="text" name="tel" placeholder="電話番号"></p>
          <p><textarea class="contact-text-content" name="detail" cols="20" rows="8" placeholder="お問い合わせ内容※必須項目"></textarea></p>
          {{-- {!! NoCaptcha::renderJs() !!}
          {!! NoCaptcha::display() !!} --}}
          <div class="contact-button submit-button">
            <input type="submit" value="送信">
          </div>
        </div>
      </div>
      @if($errors->any())
        @foreach ($errors->all() as $error)
          <li style="color: red">{{ $error }}</li>
        @endforeach
      @endif
      {{-- @if($errors->has('email'))
        <div class="error_msg error_contact" style="color: red">{{ $errors->first('email') }}</div>
      @endif
      @if($errors->has('detail'))
        <div class="error_msg error_contact" style="color: red">{{ $errors->first('detail') }}</div>
      @endif --}}
    </form>
  </section>

  <section class="access" id="access">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1152.7915943516023!2d135.4723596937575!3d34.47440692360586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000d041f2efffff%3A0x97a36844a6517d4c!2z44CSNTk0LTAwMzEg5aSn6Ziq5bqc5ZKM5rOJ5biC5Y2X5Yy65LyP5bGL55S677yV5LiB55uu77yR77yU4oiS77yY!5e0!3m2!1sja!2sjp!4v1591105578241!5m2!1sja!2sjp" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </section>

  <section class="caution">
    <div id="caution" class="caution-hidden">hidden</div>
    <div class="parking"><a href="https://goo.gl/maps/Xd5oPkoK2QVmriNTA">近隣駐車場のご案内 >></a></div>
  </section>

@endsection
