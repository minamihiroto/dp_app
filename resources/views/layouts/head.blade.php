<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @yield('css')
  <title>@yield('title')</title>
</head>
<body class="@yield('body_class')">
  @yield('header')
  @yield('content')
  @yield('footer')
</body>
</html>