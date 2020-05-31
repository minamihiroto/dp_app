<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>

    <section class="index-questions">
        <div class="index-questions-headline">
            <h2>ようこそ、{{ $user->name }}さん</h2>
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
                        {!! nl2br(e(Str::limit($post->body, 200))) !!}
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
</body>
</html>
