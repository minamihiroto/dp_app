@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a href="/top">Q&A</a>
                
                    @if(Auth::user()!=null)
                        @if(Auth::user()->admin_flg=='admin')
                            <a href="/news/create">お知らせを投稿する</a>
                        @else
                        @endif
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection