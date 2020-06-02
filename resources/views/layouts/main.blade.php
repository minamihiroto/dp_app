@extends('layouts.head')
@section('css')
  {{-- link --}}
@endsection
@section('header')
  <a href="top">top</a>
  <a href="instructor">instructor</a>
  <a href="lesson">lesson</a>
  <a href="online">online</a>
  @if(Auth::check())
      <a href="/home">{{$user->name}}</a>
  @else
    <a href="/login">login</a>
  @endif
@endsection
  {{-- content --}}
@section('footer')
  footer
@endsection