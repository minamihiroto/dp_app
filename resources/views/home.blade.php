@extends('layouts.member')

@section('content')
<section class="home">
    <h2>ようこそ、{{ $user->name }}さん</h2>
    <a href="/post">オンラインコミュニティ</a>
                
    @if(Auth::user()!=null)
        @if(Auth::user()->admin_flg=='admin')
            <a class="home-news" href="/news/create">お知らせを投稿する</a>
            <a href="{{ route('posts.create') }}" class="post_create">
                オンライン限定のお知らせを投稿する ＞＞
            </a>
        @else
        @endif    
    @endif

    <div class="vimeo">
        <iframe class="vimeo-iframe" src='https://vimeo.com/showcase/7254208/embed' allowfullscreen frameborder='0'></iframe>
    </div>

    <form class="home-logout" method="POST" action="/logout" class="logout" >
        @csrf
        <a href="javascript:void(0)" onclick="this.parentNode.submit()">ログアウト</a>
    </form>
    {{-- @if(Auth::user()!=null)
        @if(Auth::user()->admin_flg=='admin')
        @else
        <form class="home-delete" name="delete_user" method="POST" action="/delete/{{$user->id}}">
            @csrf
            <a href="javascript:void(0)" onclick="this.parentNode.submit()">退会する</a>
        </form>
        @endif    
    @endif --}}
    <div class="online-caution">
        <h5>【オンラインレッスンの時に用意してほしいもの】</h5>
        <p> ・テニスボールやDAISOキラキラボール</p> 
        <p> 代用品➜ハンドタオルをキツく丸めて輪ゴムでボール状に止めたもの</p> 

        <p> ・ピラティスボール（DAISOにも売っています）</p> 
        <p> 代用品➜クッションやバスタオルを小さく畳んだもの</p> 

        <p> ・ヨガマット（6ミリ〜8ミリくらい）</p> 
        <p> 代用品➜バスタオル</p> 

        <p> ・ストレッチングクッション（ポール）（リンドスポーツが安いです）</p> 
        <p> 代用品➜バスタオルを2〜3枚ほど重ねて2つ折りにし、キツく丸めて輪ゴムで止めたもの</p> 
        <h5>【オンラインレッスン受講の注意事項】</h5>
            <p> インストラクターがエクササイズをチェックする事が出来ないオンラインレッスンでは、必ず守って頂きたい注意事項があります。
            ここに記されている注意事項や動画内で案内される注意事項を守っていただけなかった場合、怪我や痛みが出る可能性がありますので、自己責任にてお願い致します。</p> 
        
            <p> ・脊柱疾患をお持ちの方は、主治医の先生から運動の許可を得て下さい。
            その際に気をつけるべき禁忌の動作や強化が望まれる筋肉があればインストラクターにお知らせ下さい。
            基本的に椎間板ヘルニアの場合、腰椎の屈曲（曲げること）はヘルニアを悪化させる可能性がありますのでトレーニングの部分は中止するか、腰椎にカーブができないように浅く行って下さい。
            脊柱すべり症、分離症、脊柱管狭窄症などの場合は腰椎が過度に反る動きは中止して下さい。反るエクササイズで腰が痛い所まで動かないようにして下さい。</p> 
            <p> ・頸椎ヘルニアの方は痛みがある動きは絶対にせず、痛くない首の位置で行って下さい。</p> 
            <p>・股関節の問題をお持ちの方は脱臼しそうになったり違和感のある位置でエクササイズを行わないで下さい。</p> 
            <p>・妊娠中の方は汗ばむほど体温を上げないようにお願い致します。週数に応じた注意がありますのでインストラクターまでお問い合わせ頂くのがベストです。
            うつ伏せや身体が反転するエクササイズ（ロールオーバーなど、お尻が床から高く上がるもの）はやらないで下さい。</p> 
        
            <p>・痛みのあるまま我慢して行うエクササイズではないことをご理解下さい。痛みがあるというのと、筋肉を使って頑張っているのは違います。
            何かあれば必ずインストラクターにお問い合わせ下さい。</p> 
        
            <p>安全にピラティスをおうちで楽しみましょう！</p>
    </div>
    <div><a href="/cansel">規約等の確認</a></div>

</section>
@endsection