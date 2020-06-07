<div class="card-body">
    <form action="{{route('payment.store')}}" class="card-form" id="form_payment" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">カード番号</label>
            <div id="cardNumber"></div>
        </div>

        <div class="form-group">
            <label for="name">セキュリティコード</label>
            <div id="securityCode"></div>
        </div>

        <div class="form-group">
            <label for="name">有効期限</label>
            <div id="expiration"></div>
        </div>

        <div class="form-group">
            <label for="name">カード名義</label>
            <input type="text" name="cardName" id="cardName" class="form-control" value="" placeholder="カード名義を入力">
        </div>
        <div class="form-group">
            <button type="submit" id="create_token" class="btn btn-primary">カードを登録する</button>
        </div>
    </form>
    <a href="">クレジットカード情報ページに戻る</a>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
const stripe = Stripe("pk_test_hYKDuhoYpk1cYuxhAdVeGbYK00kd1F0cng");
const elements = stripe.elements();

/* Stripe Elementsを使ったFormの各パーツをどんなデザインにしたいかを定義 */
const style = {
    base: {
        fontSize: '12px',
        color: "#32325d",
        border: "solid 1px ccc"
    }
};

/* フォームでdivタグになっている部分をStripe Elementsを使ってフォームに変換 */
const cardNumber = elements.create('cardNumber', {style:style});
cardNumber.mount('#cardNumber');
const cardCvc = elements.create('cardCvc', {style:style});
cardCvc.mount('#securityCode');
const cardExpiry = elements.create('cardExpiry', {style:style});
cardExpiry.mount('#expiration');
document.querySelector('#form_payment').addEventListener('submit', function(e) {

/* 何も処理をかまさないとそのままクレジットカード情報が送信されてしまうので一旦HTMLのFormタグがが従来もっている送信機能を停止させる。 */
    e.preventDefault();

/* Stripe.jsを使って、フォームに入力されたコードをStripe側に送信。今回ご紹介している方法の場合、「カード名義」だけはStripe Elementsの仕組みを使っていないため、このままだとカード名義の情報が足りずにカード情報の暗号化ができなくなってしまうので、{name:document.querySelector('#cardName').value}を足すことで、フォームに入力されたカード名義情報も、他の情報と同時にStripeに送ることができるようになる。 */
    stripe.createToken(cardNumber,{name: document.querySelector('#cardName').value}).then(function(result) {


/* errorが返ってきた場合はその旨を表示 */
        if (result.error) {
            alert("カード登録処理時にエラーが発生しました。カード番号が正しいものかどうかをご確認いただくか、別のクレジットカードで登録してみてください。");
        } else {

/* 暗号化されたコードが返ってきた場合は以下のStripeTokenHandler関数を実行。その際、引数として暗号化されたコードを渡してあげる。 */
            stripeTokenHandler(result.token);
        }
    });


/* id="form_payment"が指定されたformの送信ボタン直前に、input type="hidden"のHTMLを挿入し、値にStripeから返ってきた暗号化情報を設定。そして、実際にフォームの内容を送信（事実上、送信されるのは暗号化情報のみとなる） */
    function stripeTokenHandler(token) {
        const form = document.getElementById('form_payment');
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }

},false);


</script>
