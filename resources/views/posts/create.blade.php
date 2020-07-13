@extends('layouts.member')
@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('title','オンラインコミュニティ')
@section('content')
    <section class="post-question">
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                    <h1>投稿する</h1>
                    <p>※タイトルは30文字以内、本文は1500文字以内でお願いします。</p>

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