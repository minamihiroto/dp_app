<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>{{ $post->news_title }}</h1>
  <h5>{{$post->created_at}}</h5>
  <p>{!! nl2br($post->news_message) !!}</p>
  @if(Auth::user()!=null)
    @if(Auth::user()->admin_flg=='admin')
    <form action="{{ route('news.destroy',$post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" class="delete delete-news" value="削除">
      </form>
    @endif
  @endif
</body>
</html>