@extends('layouts.default')
@section('head')
    <title>Üyelik Bilgilerim - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/informations/main.css') }}">
@endsection
@section('content')
    <?php $user=session('userInfo'); ?>

    <section class="profile section-padding mx-24" style="margin-top: 150px">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <x-profile.left-sidebar/>
                <div class="right">
                    <div class="profile-infos">
                        <div class="top">
                            <div class="title">Üyelik Bilgilerim</div>
                        </div>
                        <form action="{{route('profile.informations')}}" method="post">
                            @csrf
                            <div class="form-wrapper">
                                <div class="signup-input">
                                    <span class="label">Adı<span>&nbsp;*</span></span>
                                    <input type="text" name="user[firstName]" value="<?php echo $user['data']['firstName']; ?>">
                                </div>
                                <div class="signup-input">
                                    <span class="label">Soyadı<span>&nbsp;*</span></span>
                                    <input type="text" name="user[lastName]" value="<?php echo $user['data']['lastName']; ?>">
                                </div>

                                <div class="signup-input">
                                    <span class="label">E-Posta Adresi<span>&nbsp;*</span></span>
                                    <input type="text" name="user[email]" value="<?php echo $user['data']['email']; ?>">
                                </div>
                                <div class="signup-input">
                                    <span class="label">Kullanıcı Adı<span>&nbsp;*</span></span>
                                    <input type="text" name="user[userName]" value="<?php echo $user['data']['userName']; ?>">
                                </div>
                                <div class="signup-input">
                                    <span class="label">Cep Tel<span>&nbsp;*</span></span>
                                    <input id="mobilePhone" type="text" name="user[phoneNumber]" value="<?php echo $user['data']['phoneNumber']; ?>">
                                </div>

                                <div class="signup-input">
                                    <span class="label">Doğum Tarihi<span>&nbsp;*</span></span>
                                    <input type="text" id="date-picker" name="user[birthDate]" value="<?php echo $user['data']['birthDate']; ?>">
                                </div>
                                <div class="signup-input">
                                    <span class="label">Tc Kimlik No<span>&nbsp;*</span></span>
                                    <input id="mobilePhone" type="text" name="user[tcKimlik]" value="<?php echo $user['data']['tcKimlik']; ?>">
                                </div>
                                <div class="signup-input">
                                    <span class="label">Password<span>&nbsp;*</span></span>
                                    <input type="password" name="user[password]" id="pass" oninput="removeSpaces()" required>


                                    <div id="tooltip" class="password-tooltip">
                                        <ul>
                                            <li class="rule" id="upper">Büyük harf en az bir tane</li>
                                            <li class="rule" id="lower">Küçük harf en az bir tane</li>
                                            <li class="rule" id="number">Sayı en az bir tane</li>
                                            <li class="rule" id="special">Özel karakter en az bir tane</li>
                                        </ul>
                                    </div>



                                </div>
                                <div class="signup-agreement">
                                    <label for="membership">
                                        <input class="option-input checkbox" type="checkbox" id="membership"
                                               required>
                                        Üyelik Sözleşmesi şartlarını okudum ve kabul ediyorum. Tarafımla pazarlama
                                        ve tanıtım amaçlı iletişime geçilmesine izin veriyorum.
                                    </label>
                                </div>
                                <div class="signup-buttons">
                                    <button type="submit" class="submit-btn" >Bilgilerimi Güncelle</button>
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
    <script src="../assets/js/profile/order/profile-order.js"></script>
    <script>
        const passwordInput = document.getElementById('pass');
        const tooltip = document.getElementById('tooltip');
        const rules = {
            upper: /[A-Z]/,
            lower: /[a-z]/,
            number: /[0-9]/,
            special: /[^A-Za-z0-9]/
        };

        passwordInput.addEventListener('focus', function() {
            tooltip.style.display = 'block';
        });

        passwordInput.addEventListener('blur', function() {
            tooltip.style.display = 'none';
        });
        const submitButton = document.querySelector('.submit-btn');
        let control=0;
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const matchedRules = Object.keys(rules).filter(rule => rules[rule].test(password));

            document.querySelectorAll('.rule').forEach(rule => {
                if (matchedRules.includes(rule.id)) {
                    rule.style.textDecoration = 'line-through';
                    rule.style.color = 'green';
                } else {
                    rule.style.textDecoration = 'none';
                    rule.style.color = 'red';
                }
            });

            if (matchedRules.length === Object.keys(rules).length) {
                // tooltip.style.display = 'none';
                submitButton.disabled = false; // Tüm kurallar sağlandıysa butonu aktif et
                control=0;
            } else {
                tooltip.style.display = 'block';
                control=1;
            }
        });

        // Tıklama olayını sürekli dinle
        submitButton.addEventListener('click', function(event) {
            if (control==1) {
                event.preventDefault(); // Buton devre dışı ise formun gönderilmesini engelle
                Swal.fire({
                    title: 'Lütfen Şifre Kurallarına Dikkat Edin.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    icon: 'error',
                    showConfirmButton: false,
                })
                return false; // İşlem yapma
            }
            // Buraya formun gönderilmesiyle ilgili işlemleri ekleyebilirsin
        });
    </script>
@endsection
