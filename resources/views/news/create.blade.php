@extends('layouts.member')
@section('title','News')
@section('content')
<section class="news-create">
  <a href="/post" class="back-link">Q&Aにいく</a>
  <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="contact-main">

      <select class="news-type" name="news_type">
        <option value="ブログ">ブログ</option>
        <option value="キャンペーン">キャンペーン</option>
        <option value="お知らせ" selected="selected">お知らせ</option>
      </select>

      <input type="hidden" name="id" value="1">
      @if($errors->has('news_title'))
          <div class="error_msg">{{ $errors->first('news_title') }}</div>
      @endif
      <p class="input-title">タイトル</p>
      <p><input type="text" class="form" name="news_title" value="{{ old('news_title') }}"></p>

      @if($errors->has('news_message'))
          <div class="error_msg">{{ $errors->first('news_message') }}</div>
      @endif
        <p class="input-title">メッセージ</p>
        <p><textarea class="form" name="news_message" rows="15">{{ old('news_message') }}</textarea></p>
    </div>
    <a href="{{ route('post') }}" class="news-cansel">
      キャンセル
    </a>
    <input type="submit" class="create button" value="掲載する">
  </form>
</section>
@endsection