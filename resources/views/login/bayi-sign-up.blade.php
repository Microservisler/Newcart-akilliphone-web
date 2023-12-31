@extends('layouts.default')
@section('head')
    <link rel="stylesheet" href="assets/css/flatpickr.min.css">
    <link rel="stylesheet" href="assets/css/signup.css">
    <title> Üye ol - Akıllıphone</title>

@endsection
@section('content')

    <section class="sign-up" >
        <div class="container">
            <div class="signup-title">
                <h1>E-Posta ile Bayi Ol</h1>
                Size Size özel kupon, indirim ve diğer avantajlardan yararlanın.
            </div>
            <form action="/bayi-register" method="post">
                @csrf
                <div class="form-wrapper">
                    <div class="signup-input">
                        <span class="label">Adı<span>&nbsp;*</span></span>
                        <input type="text" name="firstName">
                    </div>
                    <div class="signup-input">
                        <span class="label">Soyadı<span>&nbsp;*</span></span>
                        <input type="text" name="lastName">
                    </div>
                    <div class="signup-input">
                        <span class="label">Vergi No / Tc Kimlik No<span>&nbsp;*</span></span>
                        <input  type="text" name="tcKimlik">
                    </div>
                    <div class="signup-input">
                        <span class="label">E-Posta Adresi<span>&nbsp;*</span></span>
                        <input type="text" name="email">
                    </div>
                    <div class="signup-input">
                        <span class="label">Şifre<span>&nbsp;*</span></span>
                        <input type="password" name="password" oninput="removeSpaces()" id="pass">
                        <div id="tooltip" class="password-tooltip">
                            <ul>
                                <li class="rule" id="upper">Büyük harf en az bir tane</li>
                                <li class="rule" id="lower">Küçük harf en az bir tane</li>
                                <li class="rule" id="number">Sayı en az bir tane</li>
                                <li class="rule" id="special">Özel karakter en az bir tane</li>
                            </ul>
                        </div>
                    </div>



{{--                    <div class="signup-input">--}}
{{--                        <span class="label">Kullanıcı Adı<span>&nbsp;*</span></span>--}}
{{--                        <input type="text" name="username">--}}
{{--                    </div>--}}
                    <div class="signup-input">
                        <span class="label">Cep Tel<span>&nbsp;*</span></span>
                        <input id="mobilePhone" type="text" name="phoneNumber">
                    </div>
                    <div class="signup-input">
                        <span class="label">Şifre Tekrar<span>&nbsp;*</span></span>
                        <input type="password" name="password2">
                    </div>
                    <div class="signup-agreement">
                        <label for="membership">
                            <input class="option-input checkbox" type="checkbox" id="membership" required>
                            Üyelik Sözleşmesi şartlarını okudum ve kabul ediyorum.
                        </label>
                        <label for="permission">
                            <input class="option-input checkbox" type="checkbox" id="permission" required>
                            Tarafımla pazarlama ve tanıtım amaçlı iletişime geçilmesine izin veriyorum.
                        </label>
                    </div>
                    <div class="signup-buttons">
                        <button type="submit" class="submit-btn" >Hemen Bayi Ol</button>
                        <a href="{{route('login')}}">Üye misin? Hemen Giriş Yap</a>
                    </div>
                    <a class="kvkk" href="#">KVKK kapsamında akilliphone.com Kişisel Verilerin Korunması ve İşlenmesi Şartları na buradan ulaşabilirsiniz.</a>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('js')
    <script src="./assets/js/signup-select.js"></script>
    <script src="./assets/js/flatpickr.min.js"></script>
    <script src="./assets/js/mask.min.js" ></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/tr.js"></script>
    <script>
        flatpickr.localize(flatpickr.l10ns.tr);
        flatpickr("#date-picker", {
            dateFormat: "d/m/Y",
            disableMobile: "true",
            minDate: "1.1.1930",
            maxDate: "today"
        });
    </script>
    <script>
        var element = document.getElementById('mobilePhone');
        var maskOptions = {
            mask: '+{9\\0} (000)0000000',
            lazy: true,
        };
        var mask = IMask(element, maskOptions);
    </script>
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
