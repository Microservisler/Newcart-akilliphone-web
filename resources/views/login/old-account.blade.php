@extends('layouts.default')
@section('head')
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="assets/css/login/signup.css">
<title>Yeni Şifre - Akıllıphone</title>

@endsection
@section('content')

<section class="sign-in section-padding">
    <div class="container">
        <div class="left">
            <div class="phone">
                <img src="./assets/images/login/phone.svg" alt="phone">
            </div>
            <div class="left-inner">
                                    <div class="signin-title">
                                            <h1>Yeni Şifre</h1>
                                        </div>

{{--                                    <div class="divider">--}}
{{--                                            <span class="lines">VEYA</span>--}}
{{--                                        </div>--}}
                <form  action="/old-account" method="POST">
                    @csrf
                    <div class="signup-input">
                        <input type="text" id="username"name="username">
                        <label for="">E-Posta Adresi</label>
                        <span class="input-icon">
                                <img src="./assets/images/login/mail.svg" alt="mail">
                            </span>
                    </div>

                    <div class="login-btns">
                        <button class="login-btn" type="submit">Şifre İste</button>

                    </div>
                </form>
            </div>
        </div>



        <div id="popup" style="display: none;">
            <form id="popupForm">
                <input type="text" id="textBox">
                <button type="button" id="submitButton">Gönder</button>
            </form>
        </div>



        <div class="right">
            <div class="signin-title">
                <h1>Üye Değil misiniz?</h1>
                <span class="descr">Hemen üye olun, indirimli alışverişin keyfini çıkarın!</span>
            </div>
            <div class="shopping-info">
                <div class="info-box">
                    <div class="title">Hızlı Teslimat</div>
                    <img src="./assets/images/login/teslimat.svg" alt="Hızlı Teslimat">
                    <div class="text">Saat 14:00’e kadar verdiğiniz siparişler aynı gün kapınızda.</div>
                </div>
                <div class="info-box">
                    <div class="title">Tek Tıkla Güvenli Alışveriş</div>
                    <img src="./assets/images/login/tektik.svg" alt="Tek Tıkla Güvenli Alışveriş">
                    <div class="text">Ödeme ve adres bilgilerinizi kaydedin, güvenli alışveriş yapın.</div>
                </div>
                <div class="info-box">
                    <div class="title">Heryerden Erişin</div>
                    <img src="./assets/images/login/erisim.svg" alt="Heryerden Erişin">
                    <div class="text">Dilediğiniz her yerden güvenli alışverişin keyfini çıkarın.</div>
                </div>
                <div class="info-box">
                    <div class="title">Kolay İade</div>
                    <img src="./assets/images/login/iade.svg" alt="Kolay İade">
                    <div class="text">Aldığınız ürünü iade etmek hiç bu kadar kolay olmamıştı.</div>
                </div>
            </div>
            <a class="signup-btn" href="register">Hemen Üye Ol</a>
        </div>
    </div>
</section>

@endsection
@section('js')
<script>
    const x = document.getElementById("hidePass");
    x.addEventListener("click", function(){
        const y = document.getElementById("pass")
        if(y.type === 'password'){
            y.type = "text";
        }else{
            y.type = "password";
        }
    })

</script>

@endsection
