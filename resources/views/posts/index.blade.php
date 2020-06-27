@extends('layouts.member')
@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('title','Q&A')
@section('content')

<div class="qa-back-img">
    <section class="index-questions">
        <div class="index-questions-headline">
            <a href="/home">＜＜ 動画を観に戻る</a>
            <h1>Q&A</h1>
            @cannot('isAdmin')
                <a href="{{ route('posts.create') }}">
                    質問を投稿する ＞＞
                </a>
            @else
            <a href="{{ route('news.create') }}">
                お知らせ投稿をしにいく ＞＞
            </a>
            @endcan
        </div>
        @foreach ($posts as $post)
            <div class="question">

                <div class="question-user">
                    質問者：{{ $post->user->name }}
                </div>

                <span class="question-date">
                    {{ $post->created_at->format('Y/m/d：') }}
                </span>

                <div class="question-title">
                    {{ $post->title }}
                </div>

                <div class="question-body">
                    <p>
                        {!! nl2br(e(Str::limit($post->body, 70))) !!}
                    </p>
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="question-omi">
                        続きを読む
                    </a>
                </div>

                <div class="question-res">
                  @if ($post->comments->count()>0)
                    <span class="question-res-done">
                        回答済み
                    </span>
                  @else
                  <span class="question-res-yet">
                        未回答
                  </span>
                  @endif
                </div>
                <hr>
            </div>
        @endforeach
        {{ $posts->links() }}
    </section>
</div>
@endsection