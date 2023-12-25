<footer class="desktop-footer" >
    <div class="container">
        <div class="footer-top">
            <div class="logo">
                <img src="{{ url('assets/images/logo.svg') }}" alt="Akıllıphone Logo">
            </div>
            <div class="bulletin">
                <div class="bulletin-left">
                    <div class="text-top">Fırsatları Kaçırmayın</div>
                    <div class="text-bottom">Tüm kampanya ve fırsatlarımız e-posta kutunuza gelsin</div>
                </div>
                <div class="bulletin-right">
                    <form action="{{ route('newsletter.index') }}" method="POST" class="ajaxForm">
                        <input name="email" placeholder="E-posta Adresiniz" type="text">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit">Kayıt Ol</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-review">
            <div class="footer-review-left">
                <a href="https://www.google.com/search?q=ak%C4%B1ll%C4%B1phone#lrd=0x14caa0ac44eb2abf:0xe323fdf29fc0136e,1,,," target="_blank">
                    <img src="{{ url('assets/images/comment.svg') }}" alt="">
                </a>
            </div>

            <div class="footer-review-right">
                <div>
                    <div class="category-title">ETBİS</div>
                    <div>Kaydımızı sorgulayabilirsiniz</div>
                </div>
                <div>
                    <a href="https://www.eticaret.gov.tr/siteprofil/6055208760302322/wwwakilliphonecom" target="_blank">
                        <img width="91" height="105" src="{{ url('assets/images/qr.jpeg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-body">
            <div class="col">
                <div class="footer-category">
                    <div class="category-title">Kurumsal</div>
                    <ul>
                        <li><a href="{{url('/sayfa/i/hakkimizda')}}">Hakkımızda</a></li>
{{--                        <li><a href="">Bizden Haberler</a></li>--}}
                        <li><a href="{{url('/sayfa/i/iletisim')}}">İletişim</a></li>
{{--                        <li><a href="#">İşlem Rehberi</a></li>--}}
{{--                        <li><a href="#">Hesabım</a></li>--}}
{{--                        <li><a href="#">Yardım</a></li>--}}
{{--                        <li><a href="#">Mobil Uygulamalar</a></li>--}}
                        <li><a href="{{url('/sayfa/i/bilgi-toplumu-hizmetleri')}}">Bilgi Toplumu Hizmetleri</a></li>
                        <li><a href="{{url('/sayfa/i/gizlilik-politikasi')}}">Gizlilik Politikası</a></li>
                        <li><a href="{{url('/sayfa/i/iade-ve-degisim')}}">İade ve Değişim</a></li>
                        <li><a href="{{url('/sayfa/i/islem-rehberi')}}">İşlem Rehberi</a></li>
                        <li><a href="{{url('/sayfa/i/mesafeli-satis-sozlesmesi')}}">Mesafeli Satış Sözleşmesi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="footer-category">
                    <div class="category-title">Kategoriler</div>
                    <ul>
                        <li> <a href="{{url('/reyonlar/ev-yasam-327?category=78')}}">Ev Yaşam</a></li>
                        <li> <a href="{{url('/reyonlar/bluetooth-kulaklik-256?category=115')}}">Bluetooth Kulaklık</a></li>
                        <li> <a href="{{url('/reyonlar/speaker-hoparlor-ses-bombasi-257?category=119')}}">Ses Bombası</a></li>
                        <li> <a href="{{url('/reyonlar/telefon-kiliflari-156?category=48')}}">Telefon Kılıfları</a></li>
                        <li> <a href="{{url('/reyonlar/usb-type-c-kablo-255?category=102')}}">Type C Kablo</a></li>
                        <li> <a href="{{url('/reyonlar/arac-ici-telefon-tutucu-213?category=3')}}">Araç Telefon Tutucu </a></li>
                        <li> <a href="{{url('/reyonlar/tablet-kiliflari-221?category=44')}}">Tablet Kılıfı</a></li>
                        <li> <a href="{{url('/reyonlar/kablosuz-sarj-aletleri-270?category=106')}}">Kablosuz Şarj Aletleri</a></li>
                        <li> <a href="{{url('/reyonlar/tamir-setleri-192?category=136')}}">Telefon Tamir Seti</a></li>
                        <li> <a href="{{url('/reyonlar/oyun-aksesuarlari-321?category=33')}}">Oyun Aksesuarları</a></li>
                        <li> <a href="{{url('/reyonlar/kisisel-bakim-337?category=75')}}">Kişisel Bakım</a></li>
                    </ul>
                </div>
            </div>
            <?php
            $length = count($brands['items']);


                ?>


            <div class="col">
                <div class="footer-category">
                    <div class="category-title">Markalar</div>
                    <ul>
                        @for($i = 0; $i < $length; $i++)

                            <li> <a href="{{url('/reyonlar?brand='.$brands['items'][$i]['code'])}}">{{$brands['items'][$i]['name']}}</a></li>
                            @if($i==10)
                                @break;

                            @endif


                        @endfor



                    </ul>
                </div>
            </div>
            <div class="col text-center">
                <div class="follow-us">
                    <div class="category-title">Bizi Takip Edin!</div>
                    <ul class="links">
                        <li>
                            <a target="_blank" href="https://www.facebook.com/Akilliphonecom">
                                <img src="{{ url('assets/images/facebook.svg') }}" alt="facebook">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://twitter.com/Akilliphone">
                                <img src="{{ url('assets/images/twitter.svg') }}" alt="twitter">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.instagram.com/akilliphone/">
                                <img src="{{ url('assets/images/instagram.svg') }}" alt="instagram">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.youtube.com/channel/UC3M8SQ0DC86E_ugG2XPxDWg">
                                <img src="{{ url('assets/images/youtube.svg') }}" alt="youtube">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mobile-app">
                    <div class="category-title">Mobil Uygulamamız</div>
                    <a href="https://apps.apple.com/tr/app/ak%C4%B1ll%C4%B1phone/id1483837361?l=tr" target="_blank">
                        <img src="{{ url('assets/images/apple.png') }}" alt="">
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.akilliphone" target="_blank">
                        <img src="{{ url('assets/images/google.png') }}" alt="">
                    </a>
                    <a href="https://appgallery.huawei.com/#/app/C103658585" target="_blank">
                        <img src="{{ url('assets/images/appgallery.png') }}" alt="">
                    </a>
                </div>
                <div class="have-question">
                    <div class="category-title">
                        Aklınıza takılan bir soru mu var?
                    </div>
                    <div class="call-us" >Çözüm Merkezimizi arayın</div>
                    <a href="tel:08505200880">0850 520 0880</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="left">
                <img class="lazyload" data-src="assets/images/norton.svg">
            </div>
            <div class="right">
                <img class="lazyload" data-src="{{ url('assets/images/isbankasi.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/denizbank.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/ziraat.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/bonus.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/maximum.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/axess.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/yapikredi.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/paraf.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/garanti.svg') }}">
                <img class="lazyload" data-src="{{ url('assets/images/akbank.svg') }}">
            </div>
        </div>
        <div class="copyright">
            Akıllıphone &copy; Copyright 1998 - 2023 Her Hakkı Saklıdır
        </div>
    </div>
</footer>
<footer class="mobile-footer">
    <div class="container">
        <div class="follow-us">
            <div class="category-title">Bizi Takip Edin!</div>
            <ul class="links">
                <li>
                    <a href="#">
                        <img src="{{ url('assets/images/facebook.svg') }}" alt="facebook">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ url('assets/images/twitter.svg') }}" alt="twitter">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ url('assets/images/google.svg') }}" alt="google">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ url('assets/images/pinterest.svg') }}" alt="pinterest">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ url('assets/images/instagram.svg') }}" alt="instagram">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="{{ url('assets/images/youtube.svg') }}" alt="youtube">
                    </a>
                </li>
            </ul>
        </div>
        <div class="have-question">
            <div class="category-title">
                Aklınıza takılan bir soru mu var?
            </div>
            <div class="call-us" >Çözüm Merkezimizi arayın</div>
            <a href="tel:08504609070">0850 520 0880</a>
        </div>
        <div class="footer-links">
            <div class="col-6">
                <div class="footer-category">
                    <div class="category-title">
                        Kurumsal
                        <img class="arrow-down" src="{{ url('assets/images/right-arrow.svg') }}">
                    </div>
                    <ul>
                        <li><a href="{{url('/sayfa/i/hakkimizda')}}">Hakkımızda</a></li>
                        {{--                        <li><a href="">Bizden Haberler</a></li>--}}
                        <li><a href="{{url('/sayfa/i/iletisim')}}">İletişim</a></li>
                        {{--                        <li><a href="#">İşlem Rehberi</a></li>--}}
                        {{--                        <li><a href="#">Hesabım</a></li>--}}
                        {{--                        <li><a href="#">Yardım</a></li>--}}
                        {{--                        <li><a href="#">Mobil Uygulamalar</a></li>--}}
                        <li><a href="{{url('/sayfa/i/bilgi-toplumu-hizmetleri')}}">Bilgi Toplumu Hizmetleri</a></li>
                        <li><a href="{{url('/sayfa/i/gizlilik-politikasi')}}">Gizlilik Politikası</a></li>
                        <li><a href="{{url('/sayfa/i/iade-ve-degisim')}}">İade ve Değişim</a></li>
                        <li><a href="{{url('/sayfa/i/islem-rehberi')}}">İşlem Rehberi</a></li>
                        <li><a href="{{url('/sayfa/i/mesafeli-satis-sozlesmesi')}}">Mesafeli Satış Sözleşmesi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6">
                <div class="footer-category">
                    <div class="category-title">
                        Kategoriler
                        <img class="arrow-down" src="{{ url('assets/images/right-arrow.svg') }}">
                    </div>
                    <ul>
                        <li> <a href="{{url('/reyonlar/ev-yasam-327?category=78')}}">Ev Yaşam</a></li>
                        <li> <a href="{{url('/reyonlar/bluetooth-kulaklik-256?category=115')}}">Bluetooth Kulaklık</a></li>
                        <li> <a href="{{url('/reyonlar/speaker-hoparlor-ses-bombasi-257?category=119')}}">Ses Bombası</a></li>
                        <li> <a href="{{url('/reyonlar/telefon-kiliflari-156?category=48')}}">Telefon Kılıfları</a></li>
                        <li> <a href="{{url('/reyonlar/usb-type-c-kablo-255?category=102')}}">Type C Kablo</a></li>
                        <li> <a href="{{url('/reyonlar/arac-ici-telefon-tutucu-213?category=3')}}">Araç Telefon Tutucu </a></li>
                        <li> <a href="{{url('/reyonlar/tablet-kiliflari-221?category=44')}}">Tablet Kılıfı</a></li>
                        <li> <a href="{{url('/reyonlar/kablosuz-sarj-aletleri-270?category=106')}}">Kablosuz Şarj Aletleri</a></li>
                        <li> <a href="{{url('/reyonlar/tamir-setleri-192?category=136')}}">Telefon Tamir Seti</a></li>
                        <li> <a href="{{url('/reyonlar/oyun-aksesuarlari-321?category=33')}}">Oyun Aksesuarları</a></li>
                        <li> <a href="{{url('/reyonlar/kisisel-bakim-337?category=75')}}">Kişisel Bakım</a></li>
                    </ul>
                </div>
            </div>
{{--            <div class="col-6">--}}
{{--                <div class="footer-category">--}}
{{--                    <div class="category-title">--}}
{{--                        Ödeme--}}
{{--                        <img class="arrow-down" src="{{ url('assets/images/right-arrow.svg') }}">--}}
{{--                    </div>--}}
{{--                    <ul>--}}
{{--                        <li><a href="#">Ödeme Seçenekleri</a></li>--}}
{{--                        <li><a href="#">Banka Kampanyaları</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-6">
                <div class="footer-category">
                    <div class="category-title">
                        Markalar
                        <img class="arrow-down" src="{{ url('assets/images/right-arrow.svg') }}">
                    </div>
                    <ul>
                        <li> <a href="{{url('/reyonlar?brand=2217')}}">Puluz</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2218')}}">Kuula</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2219')}}">Ezere</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2233')}}">North Bayaou</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2226')}}">Usams</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2224')}}">Gor</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2228')}}">Memo</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2225')}}">Dux Ducis</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2220')}}">Plextone</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2222')}}">Floveme</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2223')}}">Mijobs</a></li>
                        <li> <a href="{{url('/reyonlar?brand=2234')}}">Haweel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>    <!-- Bütün scriptler -->
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script src="{{ url('assets/js/app.js') }}?_v={{ env('ASSETS_VER') }}"></script>
<script src="{{ url('assets/js/owl.carousel.min.js') }}?_v={{ env('ASSETS_VER') }}"></script>
<script>
    $(document).ready(function () {
        let owl = $(".home-slider").owlCarousel({
            stageOuterClass: 'home-slider-inner',
            stagePadding: 0,
            smartSpeed: 450,
            dotsClass: 'container owl-dots',
            dotsData: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    autoWidth: true,
                    margin: 10,
                    center: true,
                },
                768: {
                    items: 1,
                    nav: false,
                    autoWidth: false,
                    center: false,
                    dots: false
                },
                1200: {
                    items: 1,
                    dots: true
                },
            }
        });
        $('.owl-dot').click(function () {
            owl.trigger('to.owl.carousel', [$(this).index(), 1000]);
        })
        owl.trigger('refresh.owl.carousel');
    });
</script>
<!-- Four card slider -->
<script>
    $(document).ready(function () {
        let fourSlider = $(".four-slider").owlCarousel({
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    autoWidth: true,
                    center: true,
                    loop: false,
                    margin: 17,
                    loop: true
                },
                1200: {
                    items: 4,
                    autoWidth: true,
                    margin: 30,
                    drag: false,
                    mouseDrag: false,
                }
            }
        });
    });
</script>
<!-- Three Category Slider -->
<script>
    $(document).ready(function () {
        $(".three-category").owlCarousel({
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    startPosition: 1,
                    stagePadding: 30,
                    margin: 16,
                },
                768: {
                    items: 1,
                    startPosition: 1,
                    stagePadding: 130,
                    margin: 30
                },
                1200: {
                    items: 3,
                    margin: 30,
                    drag: false,
                    mouseDrag: false,
                }
            }
        });
    });
</script>
<!-- Feature Slider -->
<script>
    $(document).ready(function () {
        $(".feature-slider").owlCarousel({
            dots: false,
            responsiveClass: true,
            margin: 20,
            responsive: {
                0: {
                    items: 2,
                },
                425: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                1200: {
                    items: 6,
                    drag: false,
                    mouseDrag: false,
                }
            }
        });
    });
</script>
<!-- Product Slider -->
<script>
    function create_product_owl_slider(target){
        if($(target).length){
            $(target).owlCarousel({
                responsiveClass: true,
                nav:true,
                dots:false,
                responsive: {
                    0: {
                        items: 2,
                        margin: 8,
                    },
                    425: {
                        items: 2,
                        margin: 15,
                    },
                    500: {
                        items: 3,
                        margin: 20,
                    },
                    768: {
                        items: 4,
                        margin: 15,
                    },
                    1024: {
                        items: 5,
                        margin: 10,
                    },
                    1200: {
                        items: 6,
                        margin: 30,
                        drag: true,
                        mouseDrag: true,
                    }
                }
            });
        }
    }
    create_product_owl_slider('.product-slider.owl-carousel');
</script>
<!-- Brands Slider -->
<script>
    // $(document).ready(function () {
    //     if ($(window).width() < 768) {
    //         startCarousel();
    //     } else {
    //         $('.owl-carousel').addClass('off');
    //     }
    // });
    // $(window).resize(function () {
    //     if ($(window).width() < 768) {
    //         startCarousel();
    //     } else {
    //         stopCarousel();
    //     }
    // });

    function startCarousel() {
        $(".brand-slider").owlCarousel({
            responsiveClass: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    margin: 30,
                    stagePadding: 50,
                },
                425: {
                    items: 2,
                    margin: 30,
                    stagePadding: 40,
                },
                575: {
                    items: 4,
                    margin: 30,
                    stagePadding: 40,
                },
                768: {
                    items: 9,
                    autoWidth: true,
                    dots: false,
                    drag: false,
                    mouseDrag: false,
                }
            }
        });
    }

    function stopCarousel() {
        var owl = $('.owl-carousel');
        owl.trigger('destroy.owl.carousel');
    }
</script>
<!-- One Card Slider -->
<script>
    $(document).ready(function () {
        $(".one-card-slider").owlCarousel({
            responsiveClass: true,
            dotsClass: 'one-slider-dots owl-dots',
            responsive: {
                0: {
                    items: 1,
                    dots: true,
                    margin: 24,
                    stagePadding: 24,
                },
                620: {
                    items: 2,
                    margin: 24,
                    dots: false,
                    stagePadding: 24
                },
                1024: {
                    items: 3,
                    margin: 24,
                    stagePadding: 24,
                    dots: false,
                },
                1200: {
                    items: 1,
                }
            }
        });

    });
</script>
<!-- Section 11 Group Slider -->
<script>
    $(document).ready(function () {
        $(".group-product-slider").owlCarousel({
            responsiveClass: true,
            dots: true,
            dotsContainer: '.custom-dots',
            dotClass: 'dot',
            responsive: {
                0: {
                    items: 1,
                    center: true,
                    dots: false,
                },
                575: {
                    items: 2,
                    dots: false,
                },
                820: {
                    items: 3,
                    center: false,
                    dots: false,
                },
                1200: {
                    dots: true,
                    margin: 30,
                }
            }
        });
    });
</script>
<!-- Blog Slider -->
<script>
    $(document).ready(function () {

        var sync1 = $("#mini-blog");
        var sync2 = $("#thumb-blog");
        var slidesPerPage = 2; //globaly define number of elements per page
        var syncedSecondary = true;
        if(sync1.length){
            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                dots: true,
                loop: true,
                responsiveRefreshRate: 200,
            }).on('changed.owl.carousel', syncPosition);
            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
        }
        if(sync2.length){
            sync2.on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            }).owlCarousel({
                items: slidesPerPage,
                dots: false,
                margin: 18,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100
            }).on('changed.owl.carousel', syncPosition2);
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }
            sync2.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        }

    });
</script>
<!-- Video Slider -->
<script>
    var sync1 = $(".slider");
    var sync2 = $(".navigation-thumbs");

    var thumbnailItemClass = '.owl-item';

    var slides = sync1.owlCarousel({
        video: true,
        items: 1,
        margin: 30,
        autoplayHoverPause: false,
        nav: false,
        dots: false,
    }).on('changed.owl.carousel', syncPosition3);

    function syncPosition3(el) {
        $owl_slider = $(this).data('owl.carousel');
        var loop = $owl_slider.options.loop;

        if (loop) {
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);
            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
        } else {
            var current = el.item.index;
        }

        var owl_thumbnail = sync2.data('owl.carousel');
        var itemClass = "." + owl_thumbnail.options.itemClass;


        var thumbnailCurrentItem = sync2
            .find(itemClass)
            .removeClass("synced")
            .eq(current);

        thumbnailCurrentItem.addClass('synced');

        if (!thumbnailCurrentItem.hasClass('active')) {
            var duration = 300;
            sync2.trigger('to.owl.carousel', [current, duration, true]);
        }
    }
    var thumbs = sync2.owlCarousel({
        items: 2,
        loop: false,
        margin: 10,
        nav: false,
        stagePadding: 25,
        rewind: true,
        dots: false,
        onInitialized: function (e) {
            var thumbnailCurrentItem = $(e.target).find(thumbnailItemClass).eq(this._current);
            thumbnailCurrentItem.addClass('synced');
        },
    })
        .on('click', thumbnailItemClass, function (e) {
            e.preventDefault();
            var duration = 300;
            var itemIndex = $(e.target).parents(thumbnailItemClass).index();
            sync1.trigger('to.owl.carousel', [itemIndex, duration, true]);
        }).on("changed.owl.carousel", function (el) {
            var number = el.item.index;
            $owl_slider = sync1.data('owl.carousel');
            $owl_slider.to(number, 100, true);
        });
    $('.ajaxForm').on('submit', function(e){
        e.preventDefault();
        webService.sendAjaxForm($(this));
    });
</script>
