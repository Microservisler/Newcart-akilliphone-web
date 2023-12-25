<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">





    <script>
        const host = '<?php echo env("WEBSERVICE_HOST")?>';
        const token = '<?php echo session()->get('userToken')?>';
        var cdnUrl = 'https://cdn.akilliphone.com/';;
        var webserviceUrl = 'https://api.duzzona.site/';
    </script>
    <script src="/cdn-cgi/apps/head/DqVMH-M0pr135Hmm3fyPy9qF_Ys.js"></script>
    <script src="/cdn-cgi/apps/body/KSl4Cj8-mTMDMBf5mgIkZFjPJUI.js"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="{{ url('assets/css/header.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="{{ url('assets/css/footer.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css?_v={{ env('ASSETS_VER') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://unpkg.com/vue@next"></script>
    <script src="{{ url('assets/js/webService.js') }}?_v={{ env('ASSETS_VER') }}{{ time() }}"></script>
    <script src="{{ url('assets/js/basketService.js') }}?_v={{ env('ASSETS_VER') }}{{ time() }}"></script>
    <script src="{{ url('assets/js/contact-us.js') }}?_v={{ env('ASSETS_VER') }}"></script>
    <script src="{{ url('assets/js/contact-us.js') }}?_v={{ env('ASSETS_VER') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.thumb.js') }}?_v={{ env('ASSETS_VER') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}?_v={{ env('ASSETS_VER') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11?_v={{ env('ASSETS_VER') }}"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    @yield('head', '')
    <style>
        .ajaxForm button.disabled{
            background-color: #9c9c9c!important;
        }
        .ajaxForm button.disabled:before{
            content:"... ";
        }
        .scroll-to-top {
            position: fixed;
            bottom: 35px;
            right: 20px;
            width: 40px;
            height: 40px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            font-size: 20px;
            cursor: pointer;
            display: none; /* initially hide the button */
        }

        .scroll-to-top:hover {
            background-color:#0056b3;
        }
    </style>






</head>
<body>

<x-common.header/>
<x-common.mega-menu :items="$main_menu['data']['items']"/>
<div id="app-basic">
    @yield('content', '')
</div>

<x-common.footer :page="'home'" :brands="$brands['data']"/>
@yield('js', '')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    if($('.brand-slider').length){
        const swiper = new Swiper('.brand-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                300: {
                    slidesPerView: 1,
                    grid: {
                        rows: 2,
                    },
                },
                576: {
                    slidesPerView: 2,
                    grid: {
                        rows: 2,
                    },
                },
                768: {
                    slidesPerView: 3,
                    grid: {
                        rows: 3,
                    },
                },
            },
        });
    }
</script>

<script>
    function handleKeyPress(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            var link = document.getElementById("searchTextButton");
            if (link) {
                link.click();
            }
        }
    }
    document.getElementById("searchTextButton").addEventListener("click", function(event) {
        event.preventDefault();
        var inputText = document.getElementById("searchText").value;

        var currentURL = window.location.href; // Mevcut sayfanın URL'sini alır
        var domain = window.location.protocol + "//" + window.location.hostname; // Sadece domaini alır

        window.location.href = domain + "/reyonlar?text=" + encodeURIComponent(inputText);

    });
    document.getElementById("searchTextButtonMobil").addEventListener("click", function(event) {
        event.preventDefault();
        var inputText = document.getElementById("searchInputMobile").value;

        var currentURL = window.location.href; // Mevcut sayfanın URL'sini alır
        var domain = window.location.protocol + "//" + window.location.hostname; // Sadece domaini alır

        window.location.href = domain + "/reyonlar?text=" + encodeURIComponent(inputText);

    });
    function handleKeyPressMobil(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            var inputText = document.getElementById("searchInputMobile").value;

            var currentURL = window.location.href; // Mevcut sayfanın URL'sini alır
            var domain = window.location.protocol + "//" + window.location.hostname; // Sadece domaini alır

            window.location.href = domain + "/reyonlar?text=" + encodeURIComponent(inputText);
        }
    }

</script>

<script type="text/javascript">
    (function () {
        if (window.innerWidth >= 768) {
            var options = {
                whatsapp: "+905492785372", // WhatsApp numarası
                call_to_action: "Merhaba, nasıl yardımcı olabilirim?", // Görüntülenecek yazı
                position: "left", // Sağ taraf için 'right' sol taraf için 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        }


    })();
    $('.hasyTc').remove();




</script>
<script>
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        var scrollButton = document.querySelector('.scroll-to-top');
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollButton.style.display = 'block';
        } else {
            scrollButton.style.display = 'none';
        }
    }

    function scrollToTop() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    }

</script>
<script src="//code.jivosite.com/widget/sveoVcXmdS" async></script>
@include('layouts.js')
</body>
</html>
