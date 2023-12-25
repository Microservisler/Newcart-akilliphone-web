@extends('layouts.default')
@section('head')
    <title>Harici Ödeme Sayfası - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/payment/main.css') }}">
@endsection
@section('content')

    <section class="profile section-padding mx-24" style="margin-top: 150px">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <x-profile.left-sidebar/>
                <div class="right">
                    <div class="profile-infos">
                        <div class="top">
                            <div class="title">Harici Ödeme</div>
                        </div>
                        <form action="">
                            <div class="form-wrapper">
                                <div class="signup-input">
                                    <span class="label">Tutar Girişi<span>&nbsp;*</span></span>
                                    <input id="price" type="text" required>
                                </div>
                                <div class="signup-input">
                                    <span class="label">Ad Soyad<span>&nbsp;*</span></span>
                                    <input type="text" required>
                                </div>
                                <div class="signup-input">
                                    <span class="label">Cep Tel<span>&nbsp;*</span></span>
                                    <input id="mobilePhone" type="text" required>
                                </div>
                                <div class="signup-input">
                                    <span class="label">Kart No<span>&nbsp;*</span></span>
                                    <input id="creditCard" type="text" required>
                                </div>
                                <div class="signup-input">
                                    <span for="" class="label">Tarih<span>&nbsp;*</span></span>
                                    <input id="expiry" type="text" required>
                                </div>
                                <div class="signup-input">
                                    <span for="" class="label">CVV<span>&nbsp;*</span></span>
                                    <input id="cvv" type="text" required>
                                </div>
                                <div class="signup-input">
                                    <span class="label">E-Posta Adresi<span>&nbsp;*</span></span>
                                    <input type="email" required>
                                </div>
                                <div class="signup-input">
                                    <span class="label">Açıklama</span>
                                    <input type="text">
                                </div>
                                <div class="signup-buttons">
                                    <a id="completePayment" class="submit-btn" href="#">Ödemeyi Tamamla</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="./assets/js/mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Elemanlar
        var mobilePhone = document.getElementById('mobilePhone');
        var creditCard = document.getElementById('creditCard');
        var expiryInput = document.getElementById('expiry');
        var cvvInput = document.getElementById('cvv');
        var payBtn = document.getElementById('completePayment');
        var priceInput = document.getElementById('price');


        // Son kullanma tarihi maskeleme
        var expiryMask = IMask(expiryInput, {
            mask: '00/00'
        });

        // CVV maskeleme
        var cvvMask = IMask(cvvInput, {
            mask: /^[0-9]\d{0,3}$/
        });

        // Telefon maskeleme
        var phoneMask = IMask(mobilePhone, {
            mask: '+{9\\0} (000) 000 00 00',
            lazy: true,
        });

        // Kart numarası maskeleme
        var cardMask = IMask(creditCard, {
            mask: '0000 0000 0000 0000',
            lazy: true,
        });

        // Para miktarı maskeleme
        var paraMask = IMask(priceInput, {
            mask: Number,
            scale: 2,
            signed: false,
            thousandsSeparator: '.',
            radix: ',',
            lazy: false
        });

        // Ödeme butonuna tıklandığında başarılı ise
        payBtn.addEventListener("click", function () {
            Swal.fire({
                title: 'Ödeme işleminiz başarıyla gerçekleşti.',
                toast: true,
                position: 'top-end',
                timer: 3000,
                icon: 'success',
                showConfirmButton: false,
            })
        });

        // Ödeme butonuna tıklandığında başarılı değilse
        // payBtn.addEventListener("click", function () {
        //     Swal.fire({
        //         title: 'Ödeme işlemi sırasında bir hata meydana geldi.',
        //         toast: true,
        //         position: 'top-end',
        //         timer: 3000,
        //         icon: 'error',
        //         showConfirmButton: false,
        //     })
        // });
    </script>@endsection
