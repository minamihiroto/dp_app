@extends('layouts.main')
@section('title','Top')
@section('content')

  <section class="news">
      <h1>news</h1>
    @if(count($items) > 0)
      @foreach($items as $item)
          <div class="announce" role="alert">
            <a href="/news/{{$item->id}}">{{ $item->news_title }}</a>
          </div>
      @endforeach
      <a href="/news">以前のお知らせを見る ＞＞</a>
    @else
      <div>投稿記事がありません</div>
    @endif
  </section>

@endsection
