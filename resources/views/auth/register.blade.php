@extends('layouts.auth-layout')

@section('css','auth.css')

@section('content')

<a href="/">トップページに戻る</a>
    <h4 style="color: rgb(129, 23, 235)">DearPilatesオンラインレッスン登録</h4>

    <section class="card-body">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('お名前') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード確認') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <p><a href="/caution/agreement">利用規約</a>と<a href="/caution/privacy">プライバシーポリシー</a>を必ずご確認の上登録ください</p>

            <button type="submit" class="btn">
                {{ __('新規登録') }}
            </button>

        </form>
    </section>

@endsection