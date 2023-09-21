@extends('layouts.default')

@section('head')
    <title>{{$product['metaTitle']}}</title>
    <link rel="stylesheet" href="{{ url('assets/css/product-details.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
@endsection
@section('content')

    <div id="app-basic">
        <section class="product-details">
            <div class="container">
                <div class="breadcrumb">
                    <nav>

                        <ul>
                            <li><a href="#"><img src="{{ url('assets/images/home-icon.svg') }}"></a></li>
                            @if(isset($product['productCategories'][0]))
                            <li><a href="#">{{$product['productCategories'][0]['category']['name']}}</a></li>
                            @endif
                            @if(isset($product['productCategories'][1]))
                            <li><a href="#">{{$product['productCategories'][1]['category']['name'] }}</a></li>
                            @endif
                            @if(isset($product['productCategories'][2]))
                            <li><a href="#">{{$product['productCategories'][2]['category']['name'] }}</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
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
                                    <li><span>STOKTA</span></li>
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

                                <h2 class="product-title">  <a href="{{ url("reyonlar?brand=".$product['brand']['brandId']) }}"> <span>{{$product['brand']['name']}}</span></a> {{$product['name']}}
                                    </h2>
                                    <img width="93" height="42" src="{{"https://cdn.akilliphone.com/".$product['brand']['image'] }}" alt="">
                            </div>
                            <div class="rating-area">

                                <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>
                                <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>
                                <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>
                                <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>
                                <span><img src="{{ url('assets/images/empty-star.svg') }}" alt=""></span>
                            </div>
                            <div class="product-price-area align-items-baseline">
                                <div class="product-price-area-top ">
                                    <div class="product-price " v-if="variant.price" v-text="variant.price+'TL'"> </div>
                                    <div class="product-oldprice" v-if="variant.oldPrice>variant.price" v-text="variant.oldPrice+'TL'"> </div>
                                    <div class="discount" v-if="variant.oldPrice>variant.price" v-text="'%'+variant.product.discountRate" > </div>
                                    <!-- <div class="buy-via-app">
                                      <svg id="Group_5248" data-name="Group 5248" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="13.557" height="13.553"
                                        viewBox="0 0 13.557 13.553">
                                        <defs>
                                          <clipPath id="clip-path">
                                            <rect id="Rectangle_2058" data-name="Rectangle 2058" width="13.557" height="13.553"
                                              fill="#cecece" />
                                          </clipPath>
                                        </defs>
                                        <g id="Group_5247" data-name="Group 5247" clip-path="url(#clip-path)">
                                          <path id="Path_10654" data-name="Path 10654"
                                            d="M5.865,0H7.81V.226q0,3.208,0,6.416a.982.982,0,0,1-1.093,1.1H.07V5.814H5.865Z"
                                            transform="translate(-0.067)" fill="#cecece" />
                                          <path id="Path_10655" data-name="Path 10655"
                                            d="M143.886,149.643h5.794V143.85h1.944v.212q0,3.218,0,6.436a.979.979,0,0,1-1.085,1.086h-6.652Z"
                                            transform="translate(-138.066 -138.032)" fill="#cecece" />
                                          <path id="Path_10656" data-name="Path 10656" d="M0,.028H4.5v4.5H0Zm1.3,3.2H3.21V1.318H1.3Z"
                                            transform="translate(0 -0.027)" fill="#cecece" />
                                          <path id="Path_10657" data-name="Path 10657"
                                            d="M228.131,4.636h-4.5V.14h4.5Zm-3.2-1.3h1.915V1.426h-1.915Z"
                                            transform="translate(-214.588 -0.134)" fill="#cecece" />
                                          <path id="Path_10658" data-name="Path 10658"
                                            d="M4.681,228.168H.184v-4.5h4.5Zm-3.207-1.3H3.387v-1.912H1.474Z"
                                            transform="translate(-0.177 -214.626)" fill="#cecece" />
                                          <rect id="Rectangle_2055" data-name="Rectangle 2055" width="1.913" height="1.913"
                                            transform="translate(9.051 5.817)" fill="#cecece" />
                                          <rect id="Rectangle_2056" data-name="Rectangle 2056" width="1.914" height="1.912"
                                            transform="translate(5.819 9.041)" fill="#cecece" />
                                          <rect id="Rectangle_2057" data-name="Rectangle 2057" width="1.913" height="1.912"
                                            transform="translate(9.046 9.048)" fill="#cecece" />
                                        </g>
                                      </svg>
                                      Uygulama ile Satın Al
                                      <svg xmlns="http://www.w3.org/2000/svg" width="6.18" height="3.559" viewBox="0 0 6.18 3.559">
                                        <g id="Group_5251" data-name="Group 5251" transform="translate(-1465.81 -446.914)">
                                          <path id="caret-down_1_" data-name="caret-down (1)"
                                            d="M5.881,9h5.245a.469.469,0,0,1,.328.8L8.837,12.42a.469.469,0,0,1-.666,0L5.553,9.8A.469.469,0,0,1,5.881,9Z"
                                            transform="translate(1460.396 437.914)" />
                                        </g>
                                      </svg>
                                      <div class="qrcode-area row row-cols-1">
                                        <div class="col">
                                          <div class="row d-flex align-items-center">
                                            <div class="col-5 text-center p-0" style="margin-top: 12px;padding-right:6px !important;">QR
                                              Kodu Okutarak <br> Direkt Satın Alabilirsiniz.
                                              <img class="qr-code" src="./svg/product-detail/qr_code.svg" alt="">
                                            </div>
                                            <div class="col-7 pe-0" style="padding-left: 12px;border-left: 1px solid #EBEBEB;"><span
                                                style="display: inline-block;margin-bottom: 27px;">Adımları Takip Edin.</span>
                                              <ul class="list-unstyled m-0">
                                                <li>1. Google veya Apple Store’dan
                                                  Uygulamamızı İndirin.</li>
                                                <li>2. Uygulama’dan satın alın
                                                  Ve indirimden yararlanın!</li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col">İndirimli Satın Al!
                                          <img style="margin-left: 30px;" src="./svg/product-detail/app_store.svg" alt="">
                                          <img style="margin-left: 11px;" src="./svg/product-detail/google_play.svg" alt="">
                                        </div>
                                      </div>
                                    </div> -->
                                </div>
                                <div class="mobil-taksit-info"><span>290,03 TL x 9 ay’a varan Taksit seçenekleri</span></div>
                                <div class="product-color-btn" vX-for="variant">
                                    <span class="title">Renk:</span>
                                    @foreach ($product['variants'] as $item)

                                    <div class="color-btn" data-variantid="{{$item['variantId']}}">
                                        <button><img src="{{"https://cdn.akilliphone.com/".$item['featuredImage'] }}" style="width: 25px; height: 25px;" alt=""></button>
                                        <div class="tooltip">
                                            {{$item["name"]}}
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="product-price-area-bottom">
                                    <div class="qty-input">
                                        <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                        <input id="product-qty" class="product-qty" type="number" name="product-qty" min="1" max="10" value="1">
                                        <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                                    </div>
                                    <div class="addtocart"><button>Sepete Ekle</button></div>
                                    <div class="iconcart">
                                        <a class="favorite-btn" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16.5" height="16.5"
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
                                                    <a href="#" class="share-link">
                                                        <div class="icon"></div>
                                                        <div class="name">Whatsapp'dan paylaş</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="share-link">
                                                        <div class="icon"></div>
                                                        <div class="name">Facebook'ta paylaş</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="share-link">
                                                        <div class="icon"></div>
                                                        <div class="name">Twitter'da paylaş</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="share-link">
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
                                        200₺ ve üzeri alışverişlerde KARGO BEDAVA

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
                        <button class="showMoreBtn">Daha Fazla</button>
                        </center>
                    </div>
                    <div id="Yorum" class="tabDetails">
                        <p style="text-align: center;">Henüz yapılmış bir yorum bulunamadı</p>
{{--                        <div class="comment-list">--}}
{{--                            <div class="comment-item">--}}
{{--                                <div class="left">--}}
{{--                                    <div class="buyer">--}}
{{--                                        EK--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="right">--}}
{{--                                    <div class="top">--}}
{{--                                        <div class="rating-area">--}}
{{--                                            <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>--}}
{{--                                            <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>--}}
{{--                                            <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>--}}
{{--                                            <span><img src="{{ url('assets/images/full-star.svg') }}" alt=""></span>--}}
{{--                                            <span><img src="{{ url('assets/images/empty-star.svg') }}" alt=""></span>--}}
{{--                                        </div>--}}
{{--                                        <div class="date">--}}
{{--                                            7 Nisan 2023, Cuma--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="comment">--}}
{{--                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim fuga maxime, voluptates et cupiditate exercitationem, similique odit quos ea earum nesciunt aspernatur veniam consectetur? Dolores perferendis alias laudantium reprehenderit dicta!--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <button id="open-review" class="review-btn">Yorum Yazmak İçin Giriş Yapmalısınız</button>
                        <div class="review-menu" id="review-menu">
                            <div class="review-menu-details">
                                <div class="details-title">Ürünü Değerlendir</div>
                                <svg id="close-review-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="m8.4 17l3.6-3.6l3.6 3.6l1.4-1.4l-3.6-3.6L17 8.4L15.6 7L12 10.6L8.4 7L7 8.4l3.6 3.6L7 15.6L8.4 17Zm3.6 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                                </svg>
                                <form action="#" class="review-form">
                                    <div class="review-wrapper">
                                        <fieldset class="rating">
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
                                        <textarea placeholder="Değerlendirmenizle ilgili detayları burada belirtebilirsiniz." id="review"
                                                  class="review-text" maxlength="2000"></textarea>
                                    </div>
                                    <button id="submitReview">Değerlendir</button>
                                </form>

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
                        <button id="open-details" class="details-btn">Soru Sor</button>
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

    </div>
@endsection
@section('js')

    <script>
        function yorum(){
            var product = <?php echo json_encode($product, JSON_UNESCAPED_UNICODE)?>;
            var yorum = document.getElementById("review");
            var yorumText = yorum.value;
            var starInputs = document.querySelectorAll('input[name="rating"]');
            var selectedRating = null;
            for (var i = 0; i < starInputs.length; i++) {
                if (starInputs[i].checked) {
                    selectedRating = starInputs[i].value;
                    break; // İlk seçili yıldızı bulduğumuzda döngüyü sonlandırabiliriz.
                }
            }

            var body ={
                "customerId": 0,
                "productId": product.productId,
                "title": "string",
                "review": yorumText,
                "rating": selectedRating
            }
            fetch('https://api.akillimagaza.com.tr/review', {
                method: 'POST', // POST isteği
                headers: {
                    "Access-Control-Allow-Origin":"*",
                    "Authorization" :'Bearer <?php echo session()->get('token')?>',
                },
                body: JSON.stringify(body) // JSON verileri göndermek için stringify kullanılır
            })
                .then(response => response.json()) // Sunucu cevabını JSON olarak işle
                .then(data => {
                    console.log(data); // Sunucudan gelen verileri konsola yazdır
                })
                .catch(error => {
                    console.error('Hata:', error);
                });



        }
        function questions(){
            var product = <?php echo json_encode($product, JSON_UNESCAPED_UNICODE)?>;
            var soru = document.getElementById("question");
            var soruText = soru.value;

            var body={
                "productId": product.productId,
                "customerId": "string",
                "question": soruText,
                "answer": "",
                "whoAnswered": ""
            }
            fetch('https://api.akillimagaza.com.tr/question', {
                method: 'POST', // POST isteği
                headers: {
                    "Access-Control-Allow-Origin":"*",
                    "Authorization" :'Bearer <?php echo session()->get('token')?>',
                },
                body: JSON.stringify(body) // JSON verileri göndermek için stringify kullanılır
            })
                .then(response => response.json()) // Sunucu cevabını JSON olarak işle
                .then(data => {
                    console.log(data); // Sunucudan gelen verileri konsola yazdır
                })
                .catch(error => {
                    console.error('Hata:', error);
                });


        }

        var product = <?php echo json_encode($product, JSON_UNESCAPED_UNICODE)?>;
        var variant = [];
        var variantId = '{{ $variantId }}';
        var cdnUrl = 'https://cdn.akilliphone.com/';
        const { createApp } = Vue;
        var app = createApp({
            data() {
                return {
                    product: product,
                    variant: variant,
                    cdnUrl:cdnUrl,

                }

            }
        }).mount('#app-basic');

        $('body').on('click', '.color-btn', function(){
            getVariant( $(this).data('variantid') );
        });
        console.log(product)
        function getVariant(variantId){
            var settings = {
                "url": "https://api.akillimagaza.com.tr/variants/" + variantId,
                'cache': false,
                "async": true,
                "crossDomain": true,
                "method": "GET",
                "headers": {
                    "Access-Control-Allow-Origin":"*",
                    "Authorization" :'Bearer <?php echo session()->get('token')?>',
                }
            };
            $.ajax(settings).done(function (response) {
                app.variant = response.data;
                app.cdnUrl=cdnUrl;

                //console.log(app)
                //window.history.pushState("nextState", response.data.name, '{{ url('incele/') }}/' + response.data.slug);
            });
        }
        getVariant(variantId);


        //question




        const questionButton = document.getElementById('questionButton');
        const questionText = document.getElementById('questionText');
        if(questionButton){
            questionButton.addEventListener('click', function() {
                const value = questionText.value;


                const xhr = new XMLHttpRequest();
                const url = "https://api.akillimagaza.com.tr/reviews";

                xhr.open("POST", url);

                const requestBody = {
                    "productId": 12957,
                    "customerId": 3,
                    "title": value,
                    "review": "Answer",
                    "rating": 0
                }
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.setRequestHeader( "Authorization" , 'Bearer <?php echo session()->get('token')?>');
                xhr.send(JSON.stringify(requestBody));

                xhr.onreadystatechange = function () {
                    console.log(xhr.response)
                };


            });
        }




    </script>
<script>
        const questionButton = document.getElementById('questionButton');
        const questionText = document.getElementById('questionText');

        questionButton.addEventListener('click', function() {
            const value = questionText.value;
            console.log(value);
        });


        function getQuestion(value){
            var settings = {
                "url": "https://api.akilliphone.com/variants/" + variantId,
                'cache': false,
                "async": true,
                "crossDomain": true,
                "method": "GET",
                "headers": {
                    "Access-Control-Allow-Origin":"*",
                    "Authorization" :'Bearer <?php echo session()->get('token')?>',
                }
            };
            $.ajax(settings).done(function (response) {

                app.variant = response.data;
                app.cdnUrl=cdnUrl;
            });
        }



</script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
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
    </script>

    <script>
        // Product Page Shipping Tabs
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
        // Product Spec and Comment
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
        }
        // Ürün ekle butonu
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
    </script>
    <!-- Drawer Question Menu -->
    <script>
        let siteMenu = document.getElementById('site-menu');
        let openBtn = document.getElementById('open-details');
        let closeCanvas = document.getElementById('close-canvas', 'close-menu');
        let closeMenu = document.getElementById('close-menu');
        let submitQuestion = document.getElementById('submitQuestion');

        openBtn.addEventListener("click", function () {
            if (siteMenu.classList.contains('site-menu')) {
                siteMenu.classList.add('site-menu--active')
                closeCanvas.style.display = "block"
                document.body.style.overflow = 'hidden'
            }
        })
        closeCanvas.addEventListener("click", function () {
            if (siteMenu.classList.contains('site-menu--active')) {
                siteMenu.classList.remove('site-menu--active')
                closeCanvas.style.display = "none"
                document.body.style.overflow = 'auto'
            }
        })
        closeMenu.addEventListener("click", function () {
            if (siteMenu.classList.contains('site-menu--active')) {
                siteMenu.classList.remove('site-menu--active')
                closeCanvas.style.display = "none"
                document.body.style.overflow = 'auto'
            }
        })
        submitQuestion.addEventListener("click", function () {
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
        })

    </script>
    <!-- Drawer Review Menu -->
    <script>
        let reviewMenu = document.getElementById('review-menu');
        let reviewBtn = document.getElementById('open-review');
        let closeReviewCanvas = document.getElementById('close-review-canvas', 'close-review-menu');
        let closeReviewMenu = document.getElementById('close-review-menu');
        let submitReview = document.getElementById('submitReview');

        reviewBtn.addEventListener("click", function () {
            if (reviewMenu.classList.contains('review-menu')) {
                reviewMenu.classList.add('review-menu--active')
                closeReviewCanvas.style.display = "block"
                document.body.style.overflow = 'hidden'
            }
        })
        closeReviewCanvas.addEventListener("click", function () {
            if (reviewMenu.classList.contains('review-menu--active')) {
                reviewMenu.classList.remove('review-menu--active')
                closeReviewCanvas.style.display = "none"
                document.body.style.overflow = 'auto'
            }
        })
        closeReviewMenu.addEventListener("click", function () {
            if (reviewMenu.classList.contains('review-menu--active')) {
                reviewMenu.classList.remove('review-menu--active')
                closeReviewCanvas.style.display = "none"
                document.body.style.overflow = 'auto'
            }
        })
        submitReview.addEventListener("click", function () {
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
        })

    </script>
    <!-- Drawer Review Menu -->
    <script>
        function checkLength() {
            const maxLength = 2000;
            const question = document.getElementById("question").value;
            const remainingChars = maxLength - question.length;
            const remainingCharacter = document.getElementById("remainingCharacter");
            remainingCharacter.innerText = `${remainingChars}`;
            const submitButton = document.getElementById("submitQuestion");

            if (question.length >= 10) {
                submitButton.disabled = false;
                submitButton.classList.add("active");
            } else {
                submitButton.disabled = true;
                submitButton.classList.remove("active");
            }
            console.log(question.length)
        }

    </script>
    <script>
        lazyload();
    </script>
    <script>
        const showMoreButton = document.querySelector('.showMoreBtn');

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
        /*
        $('body').on('click', '.addtocart', function (){
            $.ajax( "{{ url('basket/add') }}/" + app.variant.variantId + '/' + $('#product-qty').val() )
                .done(function(basket) {
                    $('.shopping-cart').html(basket.mini);
                    Swal.fire({
                        title: 'Ürün Sepete Eklendi.',
                        toast: true,
                        position: 'top-end',
                        timer: 3000,
                        icon: 'success',
                        showConfirmButton: false,
                    });

                })
                .fail(function() {
                    Swal.fire({
                        title: 'Ürün Spete Eklenemedi.',
                        toast: true,
                        position: 'top-end',
                        timer: 3000,
                        icon: 'error',
                        showConfirmButton: false,
                    });

                })
                .always(function() {
                    //alert( "complete" );
                });
        });
        */
    </script>
@endsection
