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
                    <input id="searchInput" class="mobile-input" type="text" placeholder="Ürün, kategori veya marka ara" />
                    <a href="#" style="margin-right:5px" class="search-icon" id="searchButton">
                    </a>
                </div>
                <div class="last-viewed">
                    <div class="last-viewed-title">Son gezdiğin ürünler</div>
                    <div class="product-list">
                        <a href="#">
                            <div class="product-reviewed">
                                <img src="{{ url('assets/images/reviewed-item-1.png') }}" alt="">
                                <div class="reviewed-info">
                                    <div class="reviewed-name">ALLY Magnetic Air Vent Mıknatıslı Araç TutucuKablo Klipsli-SİYAH</div>
                                    <div class="reviewed-price">999,90<span>&nbsp;TL</span></div>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="product-reviewed">
                                <img src="{{ url('assets/images/reviewed-item-2.png') }}" alt="">
                                <div class="reviewed-info">
                                    <div class="reviewed-name">Xiaomi Mi Band 5 Metal Kayış Kordon Kopçalı Milano Loop-SİYAH</div>
                                    <div class="reviewed-price">299,90<span>&nbsp;TL</span></div>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="product-reviewed">
                                <img src="{{ url('assets/images/reviewed-item-3.png') }}" alt="">
                                <div class="reviewed-info">
                                    <div class="reviewed-name">ALLY 230 Bluetooth 5.0 Kulaklık Kulak Üstü Bluetooth</div>
                                    <div class="reviewed-price">99,90<span>&nbsp;TL</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="search-results">
                    <ul>
                        <li><a href="#">Test Link: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate,
                                voluptatibus?</a></li>
                        <li><a href="#">Test Link</a></li>
                        <li><a href="#">Test Link</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
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
                <li><a href="">Sipariş Takibi</a></li>
            </ul>
        </div>
    </div>
</div>
<header class="desktop-header">
    <div class="container">
        <div class="navbar">
            <a href="{{ url('/') }}" class="brand-logo">
                <img width="186" height="52"
                     src="https://www.akilliphone.com/views/kuteshop/assets/images/logo/logo.svg?v=2.7" alt="">
            </a>
            <div class="search-bar">
<?php
if(isset($_GET['text'])){
    $getText=$_GET['text'];
}
    ?>

                <input class="search-input" type="search" placeholder="Ürün, kategori veya ürün kodu bilgisi girin" id="searchText" onkeydown="handleKeyPress(event)" value="{{ $getText ?? '' }}" />
                <a class="search-icon" id="searchTextButton"><img width="49" height="49" src="{{ url('assets/images/search-icon.svg') }}" alt=""></a>

                <div class="search-results">
                    <ul>
                        <li><a href="#">Test Link: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate,
                                voluptatibus?</a></li>
                        <li><a href="#">Test Link</a></li>
                        <li><a href="#">Test Link</a></li>
                    </ul>
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

