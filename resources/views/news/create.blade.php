<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <a href="/top">Q&Aにいく</a>
  <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="contact-main">
      <input type="hidden" name="id" value="1">
      @if($errors->has('news_title'))
          <div class="error_msg">{{ $errors->first('news_title') }}</div>
      @endif
      <p>news title</p>
      <p><input type="text" class="form" name="news_title" value="{{ old('news_title') }}"></p>

      @if($errors->has('news_message'))
          <div class="error_msg">{{ $errors->first('news_message') }}</div>
      @endif
        <p>message</p>
        <p><textarea class="form" name="news_message">{{ old('news_message') }}</textarea></p>
    </div>
    <input type="submit" class="create button" value="submit">
    <a href="{{ route('top') }}">
      キャンセル
  </a>
  </form>
</body>
</html>