@extends('layouts.head')
@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('title','Q&A')
@section('content')
    <section class="post-question">
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                    <h1>質問を投稿する</h1>

                    <div class="post-title">
                        <input name="title" placeholder="タイトル" type="text" class="{{ $errors->has('title') ? 'is-invalid' : '' }}">
                        @if ($errors->has('title'))
                            <div class="post-error">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="post-body">
                        <textarea name="body" placeholder="本文" rows="5" class="{{ $errors->has('body') ? 'is-invalid' : '' }}"></textarea>
                        @if ($errors->has('body'))
                            <div class="post-error">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="post-button">
                        <a href="{{ route('post') }}">
                            キャンセル
                        </a>
                        <button type="submit">
                            投稿する
                        </button>
                    </div>
            </form>
    </section>
@endsection