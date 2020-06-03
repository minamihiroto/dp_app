@extends('layouts.main')
@section('title','Top')
@section('content')

  <section class="billboard top-content">
    <img src="/images/symbol.png" width="50%">
    <a href="#reserve"><div class="top-button">
      <h2>体験予約・スケジュール確認</h2>
      <p>初めての方はコチラから ＞＞</p>
    </div></a>
  </section>

  <section class="news">
      <h2>お知らせ</h2>
    @if(count($items) > 0)
      @foreach($items as $item)
          <div class="news-link" role="alert">
            {{$item->news_type}}
            <a href="/news/{{$item->id}}">{{ $item->news_title }}</a>
          </div>
      @endforeach
      <a href="/news">以前のお知らせを見る ＞＞</a>
    @else
      <div>投稿記事がありません</div>
    @endif
    <img src="/images/news-image.png">
  </section>

  <section class="instructor-about">
    <div class="point">
      <div class="title">
        <h3>10回で気分が良くなり良くなり</h3>
        <h3>20回で見た目が良くなり</h3>
        <h3>30回で回で新しい身体に生まれ変わる</h3>
      </div>
      <img src="/images/instructor.png">
    </div>
    <p class="text">
      1912年頃ドイツのジョセフ・H・ピラティスによって考案されました。身体を鍛えるというよりも「ボディ・マインド・スピリット」を丸ごとコントロールしていくエクササイズで 身体を思いのまま動かせるようになる理想的なシステムとなっています。心身をコントロール出来ず、 身体の不調を抱え、歪みに気づいていない人はたくさんいます。ピラティスを通して最小限の力で最大の効果が発揮できるアライメント(姿勢)を知ることで体調が良くなり、 骨を動かし鍛えることで免疫力も上がります。仕事やスポーツ、趣味などにとどまらず、すべてのパフォーマンスを上げてくれる素晴らしいメソッドとなっています。
    </p>
    <div class="link">
      <a href="/instructor">インストラクターについて詳しく知りたい ＞＞</a>
    </div>
  </section>

  <section class="lesson-about">
    <h1>レッスン</h1>
    <p class="lesson-text">
        75分レッスンのうち、初めの15分間で日頃溜まった疲れをほぐしていきます。筋肉を適度にほぐし、ストレッチで体を柔らかくしてからエクササイズに入っていきます。体が硬く滞っていると、いいものを吸収することも悪いものを追い出すこともできません。やみくもなトレーニングではなく、きちんとケアをして自分の身体を思い通りに動かしましょう。レッスンにお越しいただいたときに必ずほぐしを入れることで、身体も柔らかく変わっていきます。
    </p>
    <div class="lesson-image">
      <img src="/images/class-image-one.png">
      <img src="/images/class-image-two.png">
      <img src="/images/class-image-three.png">
      <img src="/images/class-image-four.png">
      <img src="/images/class-image-five.png">
      <img src="/images/class-image-six.png">
    </div>
    <div class="top-suspension">
      <img src="/images/silk-image.png">
      <p class="suspension-text">
          シルクサスペンション™は普段全く運動をしていない方、趣味でスポーツや競技をしている方、アスリートの方まで全ての運動レベルの方に取り組んで頂け、それぞれの個人に合った効果をもたらしてくれます。運動強度の調整もできるので、取り組んでいるだけで必要な筋力が短期的かつ画期的についていきます。カラフルなハンモック状のマテリアルを使用して、誰でも安全にトレーニングに取り組むことができます。 不安定要素が加わってチャレンジにもなり、正しい位置で身体を支えてくれて間違った動作にならずにサポートしてくれる素晴らしいツールです。
      </p>
    </div>
    <div class="top-ticket">
      <p class="ticket-text">
          当スクールはチケット制を採用しております。10000円と15000円、20000円3種類からお選び下さい。（別途消費税がかかります。）1マス1000円としてメニューによってスタンプで消化していきます。15000円の方は10%おトクになっています。有効期限は4ヶ月です。万が一、期限が切れてしまった場合も、ビジター料金との差額500円をレッスンごとに足して頂ければ、無駄にせず使って頂けます。
      </p>
      <img src="/images/ticket.png" width=>
    </div>
    <div class="lesson-button">
      <a href="lesson">その他レッスンについてもっと詳しく知りたい ＞＞</a>
    </div>
  </section>

  <section class="online-about">
    <h1>オンラインレッスン</h1>
    <div class="online-lesson">
      <p>月に５本のレッスン動画を投稿しますので、お気軽に参考にして頂いて日々の成長にお役立てください。オンラインでの動画に関しましては、動画一つにつき６０分程度となっています。その月ごとに厳選されたレッスンをその身で感じて分かりやすくするために、立体感のある仕上がりにしています。動画は３つのフレーズに分けてあるため、初心者の方でも馴染みやすいものにしています。万が一、動画に関して不明な点や改善点がありましたら、お気軽にご連絡ください。
      </p>
      <img src="/images/online-lesson.png">
    </div>
    <div class="onlinelesson-button">
      <a href="online">オンラインレッスについて詳しく知りたい ＞＞</a>
    </div>
  </section>

  <section class="reserve" id="reserve">
    <h1>airreserve</h1>
  </section>

  <section class="contact">
    <form method="POST" action="{{url('contact')}}">
      @csrf
      <div class="contact-caution">
        <h1>お問い合わせ</h1>
        <p>その他ご不明な点などございましたらお問い合わせください。</p>
        <p> ※間違ったメールアドレスを入力され、返信をできないケースが増えています。メールアドレスの入力にはご注意ください。</p>
      </div>
      <div class="contact-form">
        <div class="contact-info">
          <p>お名前</p>
          <p>メールアドレス</p>
          <p>電話番号</p>
          <p>お問い合わせ内容</p>
        </div>
        <div class="contact-text">
          <p><input type="text" name="name"></p>
            @if($errors->has('name'))
              <div class="error_msg" style="color: red">{{ $errors->first('name') }}</div>
            @endif
          <p><input type="text" name="email"></p>
            @if($errors->has('email'))
              <div class="error_msg" style="color: red">{{ $errors->first('email') }}</div>
            @endif
          <p><input type="text" name="tel"></p>
          <p><textarea name="detail" cols="20" rows="8"></textarea></p>
            @if($errors->has('detail'))
              <div class="error_msg" style="color: red">{{ $errors->first('detail') }}</div>
            @endif
        </div>
      </div>
      <div class="contact-submit submit-button">
        <input type="submit" value="送信">
      </div>
    </form>
  </section>

  <section class="access" id="access">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1152.7915943516023!2d135.4723596937575!3d34.47440692360586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000d041f2efffff%3A0x97a36844a6517d4c!2z44CSNTk0LTAwMzEg5aSn6Ziq5bqc5ZKM5rOJ5biC5Y2X5Yy65LyP5bGL55S677yV5LiB55uu77yR77yU4oiS77yY!5e0!3m2!1sja!2sjp!4v1591105578241!5m2!1sja!2sjp" width="50%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="access-text">
      <h1>アクセス</h1>
      <p>
        光明池の改札を出て右に進み、スーパー『サンプラザ』さんの角を左に曲がります。そして、光明池運転免許試験場方面への歩道橋を歩きます。スタジオは『しゃぶ葉』さんの右側のビルになります。そこの2階入口から3階にお上がり下さい。(徒歩3分)ビル近くの歩道橋から2階入口に行くことができます。１階の入口は『美容室キハラ』さん側にあります。
      </p>
    </div>
  </section>

  <section class="caution" id="caution">
    <h1>注意事項</h1>
    <ul>
      <li>受講について</li>
      <p>男性の受講は会員様の紹介、もしくは女性と同伴のみの受付とさせていただきます。スタジオへの入室は、みなさまレッスン開始の<span>15</span>分前からとなっております。</p>
      <li>服装について</li>
      <p>動きやすい服装でお越しください。更衣室がありますのでそちらで着替えていただくこともできます。レッスン中は基本的に裸足でのエクササイズとなります。</p>
      <li>ヨガマットについて</li>
      <p>持参していただいても、スタジオのものを利用していただいてもかまいません。<span>マットのレンタルは無料です</span></p>
      <li>持ち物について</li>
      <p>基本的な持ち物はお水とタオルです。汗をかきますので忘れずにお持ちください。お水はスタジオでも1本100円で販売しております。</p>
      <li>駐車場・駐輪場について</li>
      <p>駐輪場はビルの裏側の美容室の駐車場の隣にあります。駐車場はスタジオがあるビルの目の前にタイムズがあります。入り口は運転免許試験場の方に曲がった奥にあります。</p>
      <a class="parking" href="https://goo.gl/maps/Xd5oPkoK2QVmriNTA">近隣駐車場のご案内 >></a>
    </ul>
  </section>

@endsection
