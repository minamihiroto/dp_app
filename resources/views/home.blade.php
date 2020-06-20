@extends('layouts.member')

@section('content')
<section class="home">
    <h2>ようこそ、{{ $user->name }}さん</h2>
    <a href="/post">Q&A</a>
                
    @if(Auth::user()!=null)
        @if(Auth::user()->admin_flg=='admin')
            <a class="home-news" href="/news/create">お知らせを投稿する</a>
        @else
        @endif    
    @endif

    <div class="vimeo">
        <iframe src='https://vimeo.com/showcase/7254208/embed' allowfullscreen frameborder='0' style='width:80%;'></iframe>
    </div>

    <form class="home-logout" method="POST" action="/logout" class="logout" >
        @csrf
        <a href="javascript:void(0)" onclick="this.parentNode.submit()">ログアウト</a>
        <a href="/delete/{{$user->id}}">アカウント削除</a>
    </form>
</section>
@endsection