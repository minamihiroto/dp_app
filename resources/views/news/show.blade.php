@extends('layouts.main')
@section('title','News')
@section('content')
<section class="news-show top-content">
  {{$post->news_type}}
  <h1>{{ $post->news_title }}</h1>
  <h5>{{$post->created_at}}</h5>
  <p>{!! nl2br($post->news_message) !!}</p>
  @if(Auth::user()!=null)
    @if(Auth::user()->admin_flg=='admin')
    <form action="{{ route('news.destroy',$post->id) }}" method="POST" class="delete news-delete">
        @csrf
        @method('DELETE')
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" class="delete delete-news" value="削除">
      </form>
    @endif
  @endif
</section>
@endsection