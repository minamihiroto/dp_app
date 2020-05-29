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
                        <a href="{{ route('top') }}">
                            キャンセル
                        </a>
                        <button type="submit">
                            投稿する
                        </button>
                    </div>
            </form>
    </section>
</body>
</html>
