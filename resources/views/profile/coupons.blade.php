@extends('layouts.default')
@section('head')
    <title>Kuponlarım - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/coupons/main.css') }}">
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
                            <div class="title">Kuponlarım</div>
                            <div>3 kupon</div>
                        </div>
                        <div class="coupon-list">
                            <div class="coupon">
                                <div class="coupon-header">
                                    <div class="limit">
                                        <div class="limit-top">20<span>TL indirim</span></div>
                                        <div class="limit-bottom">Alt limit: 300 TL</div>
                                    </div>
                                    <div>
                                        <a href="#" class="direct-btn">Ürünlere git</a>
                                        <button id="open-details" class="details-btn">Detaylar</button>
                                    </div>
                                </div>
                                <div class="coupon-body">
                                    <div class="product-links">
                                        <a href="#" class="product">
                                            <img height="48" width="48" src="../assets/images/product1.png" alt="">
                                        </a>
                                        <a href="#" class="product">
                                            <img height="48" width="48" src="../assets/images/product2.png" alt="">
                                        </a>
                                        <a href="#" class="product">
                                            <img height="48" width="48" src="../assets/images/product3.png" alt="">
                                        </a>
                                        <a href="#" class="product">
                                            <img height="48" width="48" src="../assets/images/product4.png" alt="">
                                        </a>
                                        <a href="#" class="product">
                                            <img height="48" width="48" src="../assets/images/product5.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="coupon-footer">
                                    <div class="coupon-footer-top">
                                        <div class="left-circle"></div>
                                        <div class="mid-line"></div>
                                        <div class="right-circle"></div>
                                    </div>
                                    <div class="coupon-footer-bottom">
                                        <div>
                                            <a href="#">Aksesuarlar</a> kategorisinde geçerlidir.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-menu" id="site-menu">
                        <div class="site-menu-title">
                            Detaylar
                            <div class="discount-title">300 TL üzerine 20TL indirim.</div>
                        </div>
                        <div class="site-menu-details">
                            <div class="details-title">Kullanım şartları</div>
                            <ol>
                                <li>Minimum 150 TL ve üzeri alışverişlerde geçerlidir.</li>
                                <li>31.03.2023 23:59 tarihine kadar geçerlidir.</li>
                                <li>İlk 33 kullanımda geçerlidir.</li>
                                <li>Aksesuarlar kategorisi ürünlerinde geçerlidir.</li>
                            </ol>
                            <div class="basket-warning">
                                Kuponunu sepette kullanabilirsin
                            </div>
                        </div>

                    </div>
                    <div id="close-canvas" class="close-canvas"></div>
                </div>
            </div>
        </div>
    </section>@endsection
@section('js')
    <script src="./assets/js/profile/coupons/signup-select.js"></script>
    <script src="./assets/js/profile/coupons/flatpickr.min.js"></script>
    <script src="./assets/js/profile/coupons/mask.min.js"></script>
    <script>
        let siteMenu = document.getElementById('site-menu');
        let openBtn = document.getElementById('open-details');
        let closeCanvas = document.getElementById('close-canvas');
        openBtn.addEventListener("click", function(){
            if (siteMenu.classList.contains('site-menu')) {
                siteMenu.classList.add('site-menu--active')
                closeCanvas.style.display = "block"
                document.body.style.overflow = 'hidden'
            }
        })
        closeCanvas.addEventListener("click", function(){
            if (siteMenu.classList.contains('site-menu--active')) {
                siteMenu.classList.remove('site-menu--active')
                closeCanvas.style.display = "none"
                document.body.style.overflow = 'auto'
            }
        })

    </script>
@endsection
