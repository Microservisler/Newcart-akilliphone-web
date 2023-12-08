<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        const host = '<?php echo env("WEBSERVICE_HOST")?>';
        const token = '<?php echo session()->get('token')?>';
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
    </style>
</head>
<body>

<x-common.header/>
<x-common.mega-menu :items="$main_menu['data']['items']"/>
<div id="app-basic">
    @yield('content', '')
</div>
<x-common.footer :page="'home'" />
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

        var link = "https://ethem.akilliphone.com/reyonlar?text=" + encodeURIComponent(inputText);

        window.location.href = link;
    });
</script>
@include('layouts.js')
</body>
</html>
