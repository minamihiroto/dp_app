<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}">
  @yield('css')
  <title>DearPilates</title>
</head>
<body class="@yield('body_class')">
  @yield('header')
  @yield('content')
  @yield('footer')
</body>
</html>