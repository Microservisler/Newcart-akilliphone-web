<div style="    left: 0;
    top: 0;
    position: fixed;
    width: 100%;
    z-index: 999;
    background: white;
    padding: 0 10px 10px 10px;">
    <header class="mobile-header">
        <div class="container">
            <nav class="navbar">
                <div class="navbar-top">
                    <div class="brand-logo">
                        <a class="navbar-brand">
                            <a href="/"><img src="{{ url('assets/images/logo.svg') }}" alt="Akıllıphone logo"></a>
                        </a>
                    </div>
                    <?php
                    if(isset($_GET['text'])){
                        $getText=$_GET['text'];
                    }
                    ?>
                    <?php
                    $user=session('userInfo');
                    if(!$user){

                        echo '<div class="login-btn"> <a href="/giris-yap">
                    <img src="' . url("assets/images/login2.png") . '" alt="Akıllıphone logo" style="width:32px;margin-top:5px">
            </a> </div>';

                    }
                    else{

                        $ad= $user['data']['firstName'];
                        $soyad=$user['data']['lastName'];
                        $sonuc = $ad[0];
                        echo '  <div class="mobile-menu">

                    <div class="user-info">
                        <a href="'.route("profile.orders").'"><span>'.$sonuc.'</span></a>
                    </div>
                </div>';
                    }



                    ?>


                </div>
                <div class="navbar-bottom">
                    <div class="search-bar">
                        <button class="fix-input">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14.207" height="12.46" viewBox="0 0 14.207 12.46">
                                <g id="Group" transform="translate(0.207 -0.27)">
                                    <path id="Line" d="M0,1H12" transform="translate(1.5 5.5)" fill="none" stroke="#788995" stroke-linecap="square" stroke-miterlimit="10" stroke-width="1"/>
                                    <path id="Line-2" data-name="Line" d="M.5,6.5,6.023.977" fill="none" stroke="#788995" stroke-linecap="square" stroke-miterlimit="10" stroke-width="1"/>
                                    <path id="Line-3" data-name="Line" d="M.5-6.5,6.023-.977" transform="translate(0 13)" fill="none" stroke="#788995" stroke-linecap="square" stroke-miterlimit="10" stroke-width="1"/>
                                </g>
                            </svg>
                        </button>

                        <input class="search-input" type="search" placeholder="Ürün, kategori veya ürün kodu bilgisi girin" id="searchInput" onkeydown="handleKeyPressMobil(event)" value="{{ $getText ?? '' }}" style="border: none; width: 100%" />
                        <a class="search-icon" id="searchTextButtonMobil"><img width="49" height="49" src="{{ url('assets/images/search-icon.svg') }}" alt="" style="margin-top: 7px" onclick="performSearch()"></a>
                    </div>

                    <div class="search-results">

                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
<div style="    position: fixed;
    width: 100%;
    z-index: 999;
    top: 0;
    ">
    <div class="header-top">
        <div class="container">
            <div class="header-top-info">
                <ul class="left-section">
                    <li><a href="{{ route('page', ['page'=>'iletisim']) }}">İletişim</a></li>
                    <li><a href="{{ route('page', ['page'=>'hakkimizda']) }}">Hakkımızda</a></li>
                    <li><a href="{{ route('page', ['page'=>'sartlar']) }}">Garanti ve İade Şartları</a></li>
                    <li><a href="{{ route('page', ['page'=>'dropshipping']) }}">Dropshipping</a></li>
                </ul>
                <ul class=" right-section">
                    <li><a href="callto:+908505200880">0850 520 08 80</a></li>

                </ul>
            </div>
        </div>
    </div>
<header class="desktop-header" style="background-color: white">
    <div class="container">
        <div class="navbar">
            <a href="{{ url('/') }}" class="brand-logo">
                <img width="186" height="52"
                     src="https://www.akilliphone.com/views/kuteshop/assets/images/logo/logo.svg?v=2.7" alt="">
            </a>
            <div class="search-bar" style="position: relative">
                <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<style>
    .ajax-search strong {
        color: #0a6aa1;
    }
    .ajax-search li img {
        float: left;
        margin: 0px 10px 10px 0px;
    }
    .ajax-search li a{
        font-weight: bold;
    }
    .ajax-search li:hover a{
        color: #d20c0c!important;
    }
</style>
                <input class="search-input" type="search" placeholder="Ürün, kategori veya ürün kodu bilgisi girin" id="searchText" onkeydown="handleKeyPress(event)" value="{{ $getText ?? '' }}" />
                <a class="search-icon" id="searchTextButton"><img width="49" height="49" src="{{ url('assets/images/search-icon.svg') }}" alt=""></a>

                <div class="search-results">

                </div>
            </div>
            <div class="right-section">
                @if(isset(session('userInfo')['favorite']))

                    <a href="#" class="favorites">
                        <img width="28" height="25" src="{{ url('assets/images/favorite.svg') }}" alt="">
                        <span class="counter">
                            {{count($_SESSION['userInfo']['favorite'])}}
                       </span>
                    </a>

                @endif


                <a href="{{ route('basket.index') }}" class="shopping-cart mini">
                    <img width="26" height="25" src="{{ url('assets/images/shopping-icon.svg') }}" alt="">
                    <span class="counter">{{ \Akilliphone\BasketService::getItemCount() }}
            </span>
                </a>
                <?php
                $user=session('userInfo');
                if(!$user){

                    echo   '<div class="login-btn">Giriş Yap
                    <div class="dropdown-box">
                        <a class="login-link" href="'.route('login') .'">Üye Girişi</a>
                        <a class="login-link" href="'.route('bayi.login') .'">Bayi Girişi</a>
                    </div>
                </div>';

                }
                else{

              $ad= $user['data']['firstName'];
              $soyad=$user['data']['lastName'];
                    $sonuc = $ad[0]." ".$soyad[0];


                    session()->put('userNameIcon', strtoupper($sonuc));
                    echo '<div class="login-btn">'.$user['data']['firstName'].'
                   <div class="dropdown-box">
                        <a class="login-link" href="'.route('profile.orders') .'">Profilim</a>
                        <a class="login-link" href="'.route('logout') .'">Çıkış Yap</a>
                    </div>
                </div>';
                }



                ?>

            </div>
        </div>
    </div>
</header>
    <script>
        $('.search-bar').on('focusout', function(){
            setTimeout(function (){
                $('.search-results').hide();
            }, 300);
        });
        $('.search-input').on('focus', function(){
            if($('.search-input').val()){
                $('.search-results').show();
            }
        });
        $( ".search-input" ).autocomplete({
            source: function( request, response ) {
                $.ajax( {
                    url: "{{ route('product.auto-complate') }}",
                    dataType: "json",
                    data: {
                        text: request.term
                    },
                    success: function (data) {
                        $('.search-results').html(data.html);
                        $('.search-results').show();
                    }
                } );
            },
            minLength: 2,
            select: function( event, ui ) {
                log( "Selected: " + ui.item.value + " aka " + ui.item.id );
            },
            close: function( event, ui ) {

            }
        } );
    </script>
