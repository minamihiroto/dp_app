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
    <section class="show-question">

        <a href="{{ route('top') }}">一覧に戻る ＞＞</a>

        <div class="question-content">
            <h1>
                {{ $post->title }}
            </h1>

            <p>
                {!! nl2br(e($post->body)) !!}
            </p>
        </div>

        <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}" class="show-question-delete">
            @csrf
            @method('DELETE')     
            <button class="btn btn-danger">質問を削除する</button>
        </form>

        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input name="post_id" type="hidden" value="{{ $post->id }}">

            <div class="comments-body">
                <textarea name="body" class="{{ $errors->has('body') ? 'is-invalid' : '' }}" rows="10" placeholder="回答"></textarea>
                @if ($errors->has('body'))
                    <div class="comments-error">
                        {{ $errors->first('body') }}
                    </div>
                @endif
            </div>
            
            <div class="comments-button">
                <button type="submit">
                    回答する
                </button>
            </div>
        </form>

        <div class="question-comments">
            @forelse($post->comments as $comment)
                <div class="comment">
                    <time>
                        {{ $comment->created_at->format('Y.m.d') }}
                    </time>
                    <p>
                        {!! nl2br(e($comment->body)) !!}
                    </p>
                    <hr>
                </div>
            @empty
                <p>回答はまだありません。</p>
            @endforelse
        </div>
    </section>
</body>
</html>
