@extends('layouts.main')
@section('title','News')
@section('body_class','news-index-body')
@section('content')
<section class="news-index top-content">
  <h1>お知らせ</h1>
  @if(count($posts) > 0)
    @foreach($posts as $post)
        <div class="announce" role="alert">
          {{$post->news_type}}
          <a href="/news/{{$post->id}}">{{$post->created_at->format('m/d：')}}{{ $post->news_title }}</a>
        </div>
    @endforeach
  @else
    <div>投稿記事がありません</div>
  @endif
  {{ $posts->links() }}
</section>
@endsection