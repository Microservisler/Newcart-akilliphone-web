@extends('layouts.default')

@section('head')
    <title>{{$product['metaTitle']}}</title>
    <link rel="stylesheet" href="{{ url('assets/css/product-details.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
@endsection
@section('content')

    <?php
    $currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    ?>
    <div id="app-basic">
        <section class="product-details" style="padding-top: 147px">
            <div class="container">
                {!! $product['breadcrumb'] !!}
                <div class="mobile-product-header">
                    <div class="mobile-product-header-inner">
                        <div class="brand">{{$product['brand']['name']}}</div>
                        <h1 class="product-title">{{$product['name']}}</h1>

                        <div class="rating-area">
                            <div class="stars">
                                <span><img src="https://ethem.akilliphone.com/assets/images/full-star.svg" alt=""></span>
                                <span><img src="https://ethem.akilliphone.com/assets/images/full-star.svg" alt=""></span>
                                <span><img src="https://ethem.akilliphone.com/assets/images/full-star.svg" alt=""></span>
                                <span><img src="https://ethem.akilliphone.com/assets/images/full-star.svg" alt=""></span>
                                <span><img src="https://ethem.akilliphone.com/assets/images/empty-star.svg" alt=""></span>
                            </div>
                            <a href="">Yorum Yap</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="left">


                        <div thumbsSlider="" class="swiper product-detail-thumb">

                            <div class="swiper-wrapper">
                                <template v-for="item in variant.variantImages">
                                    <div class="swiper-slide"><img width="97" height="97" :src="cdnUrl+item.image" alt=""></div>
                                </template>
                            </div>

                        </div>
                        <div class="swiper product-detail-slider">
                            <div class="swiper-wrapper">
                                <template v-for="item in variant.variantImages">
                                    <div class="swiper-slide">
                                        <div class="swiper-slide">
                                            <div>
                                                <img :src="cdnUrl+item.image" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination d-none"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="product-details-area">
                            <div class="details-top">
                                <ul class="details-top-left">

                                    <template v-for="stock in variant.variantOptions">
                                        <template v-if="stock.stock > 0">

                                            <li><span>STOKTA</span></li>

                                        </template>
                                        <template v-else>


                                            <li><span style="background-color: red">TÜKENDİ</span></li>


                                        </template>



                                    </template>




                                    <li class="comment"><a href="#">Yorum Yap</a></li>




                                </ul>
                                <ul class="details-top-right">
                                    <li>Barcode:<br>
                                        <template v-for="barcode in variant.variantOptions">
                                            <div v-text="barcode.barcode"></div>

                                        </template>

                                    </li>
                                    <li>
                                        Ürün Kodu:<br>

                                        <div v-text="variant.code"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="detail-title-area">
                                <h1 class="product-title">  <a href="{{ url("reyonlar?brand=".$product['brand']['brandId']) }}"> <span>{{$product['brand']['name']}}</span></a> {{$product['name']}}
                                </h1>
                                <div>
                                    <a href="{{ url("reyonlar?brand=".$product['brand']['brandId']) }}">  <img src="{{"https://cdn.akilliphone.com/".$product['brand']['image'] }}" alt=""></a>
                                </div>
                            </div>
                            <div class="rating-area">

                                <template v-for="n in 5">
                                <span>
                                    <img :src="n <= variant.voteRate ? '{{ url('assets/images/full-star.svg') }}' : '{{ url('assets/images/empty-star.svg') }}'" alt="">
                                </span>
                                </template>

                            </div>
                            <div class="product-price-area align-items-baseline">
                                <div class="product-price-area-top ">
                                    <div class="product-price " v-if="variant.price" v-text="variant.price+'TL'"> </div>
                                    <div class="product-oldprice" v-if="variant.oldPrice>variant.price" v-text="variant.oldPrice+'TL'"> </div>
                                    <div class="discount" v-if="variant.oldPrice>variant.price" v-text="'%'+variant.product.discountRate" > </div>
                                </div>


                                <div class="product-color-btn" v-for="variant">
                                    <span class="title">Renk:</span>
                                    @foreach ($product['variants'] as $item)

                                        <div class="color-btn" data-variantid="{{$item['variantId']}}">
                                            <button style="height: 100%;width: 100%"><img src="{{"https://cdn.akilliphone.com/".$item['featuredImage'] }}" alt=""></button>
                                            <div class="tooltip">
                                                {{$item["name"]}}
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div v-text="variant.variantId" style="display: none" id="variantIdDiv"></div>
                                <div class="product-price-area-bottom">
                                    <div class="qty-input">
                                        <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                        <input id="product-qty" class="product-qty" type="number" name="product-qty" min="1" max="10" value="1">
                                        <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                    </div>


                                    <template v-for="stock in variant.variantOptions">
                                        <template v-if="stock.stock > 0">

                                            <div class="addtocart" ><button style="cursor:pointer;">Sepete Ekle</button></div>

                                        </template>
                                        <template v-else>


                                            <div class="qty-input" style="cursor: not-allowed; background-color: #ECECEC" >Tükendi</div>


                                        </template>



                                    </template>

                                    <div class="iconcart">
                                        <a class="favorite-btn" id="favorite-btn" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="16.5" height="16.5"
                                                                                                               viewBox="0 0 16.5 16.5">
                                                <path id="noun_Heart_2102871_1_" data-name="noun_Heart_2102871 (1)"
                                                      d="M17.679,6A4.631,4.631,0,0,0,14.25,7.554,4.631,4.631,0,0,0,10.821,6,5.045,5.045,0,0,0,6,11.233c0,4.212,7.478,10.817,7.8,11.1a.688.688,0,0,0,.9.008c.319-.27,7.805-6.664,7.805-11.1A5.045,5.045,0,0,0,17.679,6ZM14.257,20.9c-2.271-2.079-6.882-6.877-6.882-9.663a3.673,3.673,0,0,1,3.446-3.858,3.361,3.361,0,0,1,2.843,1.679.687.687,0,0,0,1.172,0,3.362,3.362,0,0,1,2.843-1.679,3.673,3.673,0,0,1,3.446,3.858C21.125,14.179,16.527,18.876,14.257,20.9Z"
                                                      transform="translate(-6 -6)" fill="#d8d8d8" />
                                            </svg>
                                        </a>
                                        <div class="share-btn">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="17.982" height="17.962"
                           viewBox="0 0 17.982 17.962">
                        <path id="share"
                              d="M14.462,10.976a3.487,3.487,0,0,0-2.873,1.515l-4.871-2.2a3.423,3.423,0,0,0,0-2.61L11.586,5.47a3.487,3.487,0,1,0-.619-1.978,3.467,3.467,0,0,0,.06.588L5.855,6.431a3.493,3.493,0,1,0-.011,5.109l5.185,2.341a3.544,3.544,0,0,0-.059.587,3.493,3.493,0,1,0,3.492-3.492Zm0-9.48a2,2,0,1,1-2,2,2,2,0,0,1,2-2ZM3.486,10.976a2,2,0,1,1,2-2,2,2,0,0,1-2,2Zm10.976,5.488a2,2,0,1,1,2-2,2,2,0,0,1-2,2Z"
                              transform="translate(0.026 0.001)" fill="#d8d8d8" />
                      </svg>
                    </span>
                                            <ul class="share-links">
                                                <li>
                                                    <a href="https://wa.me/?text=Ürünü İncele {{$currentURL}}" class="share-link">
                                                        <div class="icon"></div>
                                                        <div class="name">Whatsapp'dan paylaş</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer.php?u={{$currentURL}}" class="share-link">
                                                        <div class="icon"></div>
                                                        <div class="name">Facebook'ta paylaş</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/share?url={{$currentURL}}" class="share-link">
                                                        <div class="icon"></div>
                                                        <div class="name">Twitter'da paylaş</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/share?url={{$currentURL}}" class="share-link">
                                                        <div class="icon"></div>
                                                        <div class="name">Instagram'da paylaş</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="shipping-tabs">
                                    <div class="tab">
                                        <button class="tablinks active" onclick="openCity(event, 'shipping')">Aynı Gün<br>Kargo <img
                                                src="{{ url('assets/images/ayni-gun.svg') }}" alt=""></button>
                                        <button class="tablinks" onclick="openCity(event, 'freeShipping')">Kargo<br>Bedava <img
                                                src="{{ url('assets/images/ucretsiz-kargo.svg') }}"  alt=""></button>
                                        <button class="tablinks" onclick="openCity(event, 'rebate')">Kolay<br>İade <img
                                                src="{{ url('assets/images/kolay-iade.svg') }}"  alt=""></button>
                                    </div>
                                    <div id="shipping" class="tabcontent" style="display:block;">
                                        Saat 17:00’a kadar verdiğiniz siparişleri aynı gün kargoya teslim ediyoruz.

                                    </div>
                                    <div id="freeShipping" class="tabcontent">
                                        {{ Akilliphone\BasketService::getFreeShippingLimit() }}₺ ve üzeri alışverişlerde KARGO BEDAVA
                                    </div>
                                    <div id="rebate" class="tabcontent">
                                        Ürünü satın aldığınız tarihten itibaren 14 gün içinde nedenini belirterek iade hakkınız bulunmaktadır. İade etmek istediğiniz ürünün, kullanılmamış, hasarsız ve orijinal ambalajında olması gerekmektedir.
                                    </div>
                                    <div id="hirePurch" class="tabcontent">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="product-spec-tabs">
                    <div class="tab">
                        <button class="tabSpec active" onclick="openSpec(event, 'Description')">Açıklama</button>
                        <button class="tabSpec" onclick="openSpec(event, 'Yorum')">Yorumlar (<?php echo count($product["reviews"]) ?>)</button>
                        <button class="tabSpec" onclick="openSpec(event, 'Soru')">Soru & Cevap (<?php echo count($product["questions"]) ?>)</button>
                    </div>

                    <div id="Description" class="tabDetails" style="display:block;">

                        <?php
                        echo $product["description"]?>

                    </div>
                    <div class="showMore">
                        <center>
                            <button class="showMoreBtn" id="showMoreDetail">Daha Fazla</button>

                        </center>
                    </div>
                    <div id="Yorum" class="tabDetails">
                        <p style="text-align: center;">Henüz yapılmış bir yorum bulunamadı</p>
                        <?php
                        if (session('userInfo')){
                            $userInf=session('userInfo');
                            $ad= $userInf['data']['firstName'];
                            $soyad=$userInf['data']['lastName'];
                            $sonuc = $ad[0]." ".$soyad[0];


                        }


                        ?>
                        @foreach($product['reviews']  as $reviews)

                            <div class="comment-list">
                                <div class="comment-item">
                                    <div class="left">
                                        <div class="buyer">
                                            {{$sonuc}}
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="top">
                                            <div class="rating-area">


                                                    <?php $ratingCount=5-$reviews["rating"]; ?>


                                                @for ($i = 0; $i < $reviews["rating"]; $i++)



                                                    <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>


                                                @endfor
                                                @for ($i = 0; $i < $ratingCount; $i++)
                                                    <span><img src="{{ url('assets/images/empty-star.svg') }}" alt=""></span>


                                                @endfor


                                            </div>
                                            <div class="date">
                                                {{$reviews["createdAt"]}}
                                            </div>
                                        </div>
                                        <div class="comment">
                                            {{$reviews["review1"]}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach


                        <?php

                        if(session('userInfo')){
                            $control=0;
                            if(session('userInfo')['data']['orders']==[]){
                                echo ' <button  class="review-btn">Sipariş vermediğiniz ürüne yorum yapamazsınız.</button>';
                            }
                            else{
                                foreach (session('userInfo')['data']['orders'] as $orders){
                                    if($orders['productId']==$product['productId']){
                                        echo  '<button id="open-review" class="review-btn">Yorum Yap</button>';
                                        $control=1;
                                        break;

                                    }
                                }
                                if ($control!=1){
                                    echo '   <button   class="review-btn">Sipariş vermediğiniz ürüne yorum yapamazsınız.</button>';
                                }
                            }

                        }
                        else{
                            echo '<button  class="review-btn">Yorum Yapmak İçin Giriş Yapmalısınız</button>';
                        }
                        ?>


                        <div class="review-menu" id="review-menu">
                            <div class="review-menu-details">
                                <div class="details-title">Ürünü Değerlendir</div>
                                <svg id="close-review-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m8.4 17l3.6-3.6l3.6 3.6l1.4-1.4l-3.6-3.6L17 8.4L15.6 7L12 10.6L8.4 7L7 8.4l3.6 3.6L7 15.6L8.4 17Zm3.6 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                                </svg>

                                <div class="review-wrapper">
                                    <fieldset class="rating" name="rating" id="rating">
                                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"
                                                                                                        title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"
                                                                                                        title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"
                                                                                                        title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"
                                                                                                        title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"
                                                                                                        title="Sucks big time - 1 star"></label>
                                    </fieldset>
                                    <input type="text" name="title" placeholder="Başlık" id="reviewtitle" value="" class="review-text" style="height: 50px !important;">
                                    <textarea id="review" placeholder="Değerlendirmenizle ilgili detayları burada belirtebilirsiniz." class="review-text" maxlength="2000" name="review" style="margin-top: 15px"></textarea>

                                </div>
                                <button id="submitReview">Değerlendir</button>


                            </div>
                        </div>
                        <div id="close-review-canvas" class="close-review-canvas"></div>
                    </div>

                    <div id="Soru" class="tabDetails">
                        <div class="question-list">
                            <template v-for="questions in product.questions">
                                <div class="question-item">
                                    <div class="question">
                                        <div class="title" >
                                            Soru
                                        </div>
                                        <div class="text" v-text="questions.question1">

                                        </div>
                                    </div>
                                    <div class="answer">
                                        <div class="title">
                                            Cevap
                                        </div>
                                        <div class="text" v-text="questions.answer">
                                        </div>
                                    </div>

                                </div>
                            </template>

                        </div>
                        <?php

                        if(session('userInfo')){

                            echo ' <button id="open-details" class="details-btn">Soru Sor</button>';

                        }
                        else{
                            echo '  <button  class="details-btn">Soru Sormak İçin Giriş Yapmalısınız </button>';
                        }
                        ?>

                        <div class="site-menu" id="site-menu">
                            <div class="site-menu-details">
                                <div class="details-title">Soru Sor</div>
                                <svg id="close-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m8.4 17l3.6-3.6l3.6 3.6l1.4-1.4l-3.6-3.6L17 8.4L15.6 7L12 10.6L8.4 7L7 8.4l3.6 3.6L7 15.6L8.4 17Zm3.6 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                                </svg>
                                <div class="question-form">
                                    <div class="question-wrapper">
                  <textarea placeholder="Sorunuzla ilgili detayları burada belirtebilirsiniz." id="question"
                            maxlength="2000" oninput="checkLength()"></textarea>
                                        <span id="remainingCharacter">
                    2000
                  </span>
                                    </div>
                                    <button id="submitQuestion" disabled>Gönder</button>
                                </div>

                            </div>
                        </div>
                        <div id="close-canvas" class="close-canvas"></div>
                    </div>



                </div>
            </div>
        </section>

        <x-asyn.carousel :sectionId="'new_product'" :title="'Yeni Gelen Ürünler'" :slug="'/reyonlar?offset=12&page=1&section=new_arrivals'" />

        @if($product['productCategories'])
        <x-asyn.carousel :sectionId="'section1'" :title="'İlginizi Çekebilecek ürünler'" :slug="'/reyonlar/'. $product['productCategories'][0]['category']['slug'].'?category='.$product['productCategories'][0]['category']['categoryId']" />
        @endif
        <x-asyn.carousel :sectionId="'section2'" :title="'Çok satanlar'" :slug="'/reyonlar/'. $product['brand']['slug'].'?brand='.$product['brand']['brandId']" />




        <x-product.recently-viewed />
        <?php

        if (isset(session('userInfo')['data']['id'])){
            $userId=session('userInfo')['data']['id'];
        }else {
            $userId="";
        }
        ?>

    </div>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <script>
        var product = <?php echo json_encode($product, JSON_UNESCAPED_UNICODE)?>;
        var variant = [];
        var reviews = [];
        var variantId = '{{ $variantId }}';
        var cdnUrl = 'https://cdn.akilliphone.com/';
        const { createApp } = Vue;
        var app = createApp({
            data() {
                return {
                    sections: {},
                    target:'',
                    product: product,
                    variant: variant,
                    cdnUrl:cdnUrl,
                    reviews:reviews,
                }
            },updated: function () {
                this.$nextTick(function () {
                    create_product_owl_slider( '#' + this.target +' .product-asyn-slider');
                })
            },
        }).mount('#app-basic');

        @if( $product['productCategories'] )
        webService.getSectionProducts('products?cat=<?php echo $product['productCategories'][0]['categoryId'] ?>&sort=newly&orderby=desc&offset=12', 'section1');
        @endif
        @if( $product['brand'] )
        webService.getSectionProducts('products?cat=<?php echo $product['productCategories'][0]['categoryId'] ?>&sort=order&orderby=desc&offset=12', 'section2');
        @endif
        webService.getSectionProducts('products?offset=12&page=1&section=new_arrivals', 'new_product');
        let  variantIdValue = {{$product["variants"][0]["variantId"]}};
        console.log(variantIdValue);
        $('body').on('click', '.color-btn', function(){
            getVariant( $(this).data('variantid') );
            variantIdValue = app.variant.variantId;

        });
        function getVariant(variantId){
            var settings = {
                "url": "https://api.duzzona.site/variants/" + variantId,
                'cache': false,
                "async": true,
                "crossDomain": true,
                "method": "GET",
                "headers": {
                    "Access-Control-Allow-Origin":"*",
                    "Authorization" :'Bearer <?php echo session()->get('userToken')?>',
                }
            };
            $.ajax(settings).done(function (response) {
                app.variant = response.data;
                app.cdnUrl=cdnUrl;
                console.log(app)

                //console.log(app)
                //window.history.pushState("nextState", response.data.name, '{{ url('incele/') }}/' + response.data.slug);
            });
        }
        getVariant(variantId);
        //question


        const favoriteBtn = document.getElementById('favorite-btn');

        favoriteBtn.addEventListener('click', function() {
            var body = {
                customerId:"{{$userId}}",
                productId:{{$product['productId']}},
                variantId: variantIdValue,

            };
            var token = "<?php echo session("userToken")?>";
            var apiUrl = 'https://api.duzzona.site/favorite';
            var requestOptions = {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(body)
            };
            console.log(requestOptions)
            fetch(apiUrl, requestOptions)
                .then(response => response.json())
                .then(data => {

                    console.log(data);
                })
                .catch(error => {
                    console.error('Hata oluştu: ' + error);
                });

        });

        var productThumb = new Swiper(".product-detail-thumb", {
            slidesPerView: 3,
            direction: "vertical",
            watchSlidesProgress: true,
        });
        var swiper = new Swiper(".product-detail-slider", {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 38,
            navigation: true,
            thumbs: {
                swiper: productThumb,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                992: {
                    pagination: false,
                },
            },

        });
        var QtyInput = (function () {
            var $qtyInputs = $(".qty-input");
            if (!$qtyInputs.length) {
                return;
            }
            var $inputs = $qtyInputs.find(".product-qty");
            var $countBtn = $qtyInputs.find(".qty-count");
            var qtyMin = parseInt($inputs.attr("min"));
            var qtyMax = parseInt($inputs.attr("max"));

            $inputs.change(function () {
                var $this = $(this);
                var $minusBtn = $this.siblings(".qty-count--minus");
                var $addBtn = $this.siblings(".qty-count--add");
                var qty = parseInt($this.val());

                if (isNaN(qty) || qty <= qtyMin) {
                    $this.val(qtyMin);
                    $minusBtn.attr("disabled", true);
                } else {
                    $minusBtn.attr("disabled", false);

                    if (qty >= qtyMax) {
                        $this.val(qtyMax);
                        $addBtn.attr('disabled', true);
                    } else {
                        $this.val(qty);
                        $addBtn.attr('disabled', false);
                    }
                }
            });

            $countBtn.click(function () {
                var operator = this.dataset.action;
                var $this = $(this);
                var $input = $this.siblings(".product-qty");
                var qty = parseInt($input.val());

                if (operator == "add") {
                    qty += 1;
                    if (qty >= qtyMin + 1) {
                        $this.siblings(".qty-count--minus").attr("disabled", false);
                    }

                    if (qty >= qtyMax) {
                        $this.attr("disabled", true);
                    }
                } else {
                    qty = qty <= qtyMin ? qtyMin : (qty -= 1);

                    if (qty == qtyMin) {
                        $this.attr("disabled", true);
                    }

                    if (qty < qtyMax) {
                        $this.siblings(".qty-count--add").attr("disabled", false);
                    }
                }
                $input.val(qty);
            });
        })();
        let siteMenu = document.getElementById('site-menu');
        let openBtn = document.getElementById('open-details');
        let closeCanvas = document.getElementById('close-canvas', 'close-menu');
        let closeMenu = document.getElementById('close-menu');
        let submitQuestion = document.getElementById('submitQuestion');

        if(openBtn){
            openBtn.addEventListener("click", function () {
                if (siteMenu.classList.contains('site-menu')) {
                    siteMenu.classList.add('site-menu--active')
                    closeCanvas.style.display = "block"
                    document.body.style.overflow = 'hidden'
                }
            })
        }
        if(closeCanvas){
            closeCanvas.addEventListener("click", function () {
                if (siteMenu.classList.contains('site-menu--active')) {
                    siteMenu.classList.remove('site-menu--active')
                    closeCanvas.style.display = "none"
                    document.body.style.overflow = 'auto'
                }
            })
        }
        if(closeMenu){
            closeMenu.addEventListener("click", function () {
                if (siteMenu.classList.contains('site-menu--active')) {
                    siteMenu.classList.remove('site-menu--active')
                    closeCanvas.style.display = "none"
                    document.body.style.overflow = 'auto'
                }
            })
        }
        if(submitQuestion){
            submitQuestion.addEventListener("click", function () {

                const question1 = document.getElementById("question").value;
                var requestData = {
                    customerId:"{{$userId}}",
                    productId:{{$product['productId']}},
                    question: question1,
                    answer: "",
                    whoAnswered: ""
                };

                var token = "<?php echo session("userToken")?>";
                var apiUrl = 'https://api.duzzona.site/questions';
                var requestOptions = {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(requestData)
                };
                fetch(apiUrl, requestOptions)
                    .then(response => response.json())
                    .then(data => {

                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Hata oluştu: ' + error);
                    });


                if (siteMenu.classList.contains('site-menu--active')) {
                    siteMenu.classList.remove('site-menu--active')
                    closeCanvas.style.display = "none"
                    document.body.style.overflow = 'auto'
                }
                Swal.fire({
                    title: 'Sorunuz başarıyla gönderildi.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    icon: 'success',
                    showConfirmButton: false,
                })
                location.reload()
            })

        }
        let reviewMenu = document.getElementById('review-menu');
        let reviewBtn = document.getElementById('open-review');
        let closeReviewCanvas = document.getElementById('close-review-canvas', 'close-review-menu');
        let closeReviewMenu = document.getElementById('close-review-menu');
        let submitReview = document.getElementById('submitReview');

        if(reviewBtn){
            reviewBtn.addEventListener("click", function () {
                if (reviewMenu.classList.contains('review-menu')) {
                    reviewMenu.classList.add('review-menu--active')
                    closeReviewCanvas.style.display = "block"
                    document.body.style.overflow = 'hidden'
                }
            })
        }
        if(closeReviewCanvas){
            closeReviewCanvas.addEventListener("click", function () {
                if (reviewMenu.classList.contains('review-menu--active')) {
                    reviewMenu.classList.remove('review-menu--active')
                    closeReviewCanvas.style.display = "none"
                    document.body.style.overflow = 'auto'
                }
            })
        }
        if(closeReviewMenu){
            closeReviewMenu.addEventListener("click", function () {
                if (reviewMenu.classList.contains('review-menu--active')) {
                    reviewMenu.classList.remove('review-menu--active')
                    closeReviewCanvas.style.display = "none"
                    document.body.style.overflow = 'auto'
                }
            })
        }
        if(submitReview){
            submitReview.addEventListener("click", function () {


//
                var stars = document.getElementsByName('rating');
                var selectedValue = null;

                for (var i = 0; i < stars.length; i++) {
                    if (stars[i].checked) {
                        selectedValue = stars[i].value;
                        break;
                    }
                }

                if (selectedValue !== null) {

                } else {
                    selectedValue=0;
                }
                var review1= document.getElementById('review').value;
                var title1 = document.getElementById('reviewtitle').value;
                var requestData = {
                    customerId:"{{$userId}}",
                    productId:{{$product['productId']}},
                    title: title1,
                    review: review1,
                    rating: selectedValue
                };

                var token = "<?php echo session("userToken")?>";
                var apiUrl = 'https://api.duzzona.site/reviews';
                var requestOptions = {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(requestData)
                };
                fetch(apiUrl, requestOptions)
                    .then(response => response.json())
                    .then(data => {

                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Hata oluştu: ' + error);
                    });



                if (reviewMenu.classList.contains('review-menu--active')) {
                    reviewMenu.classList.remove('review-menu--active')
                    closeReviewCanvas.style.display = "none"
                    document.body.style.overflow = 'auto'
                }
                Swal.fire({
                    title: 'Değerlendirme başarıyla gönderildi.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    icon: 'success',
                    showConfirmButton: false,
                })
                location.reload()
            })

        }

        const showMoreButton = document.querySelector('.showMoreBtn');
        if(showMoreButton){
            showMoreButton.addEventListener('click', function () {
                const tabDetailsDiv = document.querySelector('.tabDetails');

                if (tabDetailsDiv.classList.contains('showAll')) {
                    tabDetailsDiv.classList.remove('showAll');
                    showMoreButton.innerHTML = 'Daha Fazla';
                } else {
                    tabDetailsDiv.classList.add('showAll');
                    showMoreButton.innerHTML = 'Daha Az';
                }
            });
        }
        function checkLength() {
            const maxLength = 2000;
            const question = document.getElementById("question").value;
            const remainingChars = maxLength - question.length;
            const remainingCharacter = document.getElementById("remainingCharacter");
            remainingCharacter.innerText = `${remainingChars}`;
            const submitButton = document.getElementById("submitQuestion");

            if (question.length >= 3) {
                submitButton.disabled = false;
                submitButton.classList.add("active");
            } else {
                submitButton.disabled = true;
                submitButton.classList.remove("active");
            }
            console.log(question.length)
        }
        function openCity(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        function openSpec(evt, tabName) {
            var i, tabDetails, tabSpec;
            tabDetails = document.getElementsByClassName("tabDetails");
            for (i = 0; i < tabDetails.length; i++) {
                tabDetails[i].style.display = "none";
            }
            tabSpec = document.getElementsByClassName("tabSpec");
            for (i = 0; i < tabSpec.length; i++) {
                tabSpec[i].className = tabSpec[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
            if (tabName == "Description")
            {
                document.getElementById("showMoreDetail").style.display = "block";
                document.getElementById("showMoreDetail").className = "showMoreBtn";
            }
            else
            {
                document.getElementById("showMoreDetail").style.display = "none";
                document.getElementById("showMoreDetail").className = "";
            }
        }
        function getQuestion(value){
            var settings = {
                "url": "https://api.akilliphone.com/variants/" + variantId,
                'cache': false,
                "async": true,
                "crossDomain": true,
                "method": "GET",
                "headers": {
                    "Access-Control-Allow-Origin":"*",
                    "Authorization" :'Bearer <?php echo session()->get('userToken')?>',
                }
            };
            $.ajax(settings).done(function (response) {

                app.variant = response.data;
                app.cdnUrl=cdnUrl;
            });
        }

        lazyload();
    </script>

@endsection
