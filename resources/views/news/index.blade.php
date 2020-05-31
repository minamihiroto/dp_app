<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>news</h1>
    @if(count($posts) > 0)
      @foreach($posts as $post)
          <div class="announce" role="alert">
            <a href="/news/{{$post->id}}">{{ $post->news_title }}</a>
          </div>
      @endforeach
    @else
      <div>投稿記事がありません</div>
    @endif
</body>
</html>