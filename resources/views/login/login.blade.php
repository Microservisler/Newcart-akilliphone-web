@extends('layouts.default')
@section('head')
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/login/signup.css">
    <title>Giriş Yap - Akıllıphone</title>

@endsection
@section('content')

    <section class="sign-in section-padding">
        <div class="container">
            <div class="left">
                <div class="phone">
                    <img src="./assets/images/login/phone.svg" alt="phone">
                </div>
                <div class="left-inner">
{{--                    <div class="signin-title">--}}
{{--                        <h1>Hızlı Giriş Yap</h1>--}}
{{--                    </div>--}}
{{--                    <div class="login-methods">--}}
{{--                        <a href=""><img width="100" height="50" src="./assets/images/login/google.svg" alt="google"></a>--}}
{{--                        <a href=""><img width="100" height="50" src="./assets/images/login/facebook.svg" alt="google"></a>--}}
{{--                        <a href=""><img width="100" height="50" src="./assets/images/login/apple.svg" alt="google"></a>--}}
{{--                    </div>--}}
{{--                    <div class="divider">--}}
{{--                        <span class="lines">VEYA</span>--}}
{{--                    </div>--}}
                    <form  action="/login" method="POST">
                        @csrf
                        <div class="signup-input">
                            <input type="text" id="username"name="username">
                            <label for="">E-Posta Adresi</label>
                            <span class="input-icon">
                                <img src="./assets/images/login/mail.svg" alt="mail">
                            </span>
                        </div>
                        <div class="signup-input">
                            <input id="pass" type="password" name="password" required>
                            <label for="">Şifre</label>
                            <span id="hidePass" class="input-icon">
                                Göster
                                <img src="./assets/images/login/lock.svg" alt="lock">
                            </span>
                        </div>
                        <div class="remember-me">
                            <label for="remember">
                                <input id="remember" class="option-input checkbox" type="checkbox">
                                Beni Unutma
                            </label>
                            <a class="forgot-password" href="#">Şifremi Unuttum</a>
                        </div>
                        <div class="login-btns">
                            <button class="login-btn" type="submit">Giriş Yap</button>
                            <a href="#" class="without-login">Üye Olmadan Devam Et</a>
                        </div>
                    </form>
                </div>
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
