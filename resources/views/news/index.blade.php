@extends('layouts.head')
@section('title','News')
@section('content')
  <h1>news</h1>
    @if(count($posts) > 0)
      @foreach($posts as $post)
          <div class="announce" role="alert">
            <a href="/news/{{$post->id}}">{{ $post->news_title }}</a>
          </div>
      @endforeach
    @else
      <div>投稿記事がありません</div>
    @endif
@endsection