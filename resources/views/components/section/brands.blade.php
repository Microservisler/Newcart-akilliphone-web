<section class="section-9 section-padding mx-24">
    <div class="container">
        <div class="section-title section-padding px-24">
            Favori Markaların
            <a class="link" href="#">Tümünü Gör</a>
        </div>

        <div class="left-slider">
            <div class="one-card-slider owl-carousel owl-theme">

        @foreach($products as $productItem)

            @if($productItem['product']!=[])
                        <div class="card-slider">
                            <a href="{{ getProductUrl($productItem['product'],$productItem['product']['productId']) }}">
                            <div class="card-brand"><img class="lazyload" width="100" height="30"
                                                         data-src="<?php echo getProductImageUrl($productItem['product']['brand']['image']); ?>" alt="{{$productItem['product']['brand']['name']}}">
                            </div>

                            <hr class="divider">
                            <div class="card-image"><img class="lazyload" width="128" height="128"
                                                         data-src="<?php echo getProductImageUrl($productItem['product']['featuredImage']); ?>" alt="Xiaomi">
                            </div>
                            <div class="card-info">
                                <div class="card-name">{{$productItem['product']['name']}}</div>
                             </a>
                                <div class="card-prices">
                                    <div class="card-price">
                                        <span class="current">{{number_format($productItem['product']['variants'][0]['price'], 2, '.', '')}} TL</span>
                                        @if(isset($productItem["product"]["discountRate"]))
                                            @if($productItem["product"]["discountRate"] != 0.0)

                                                <span class="discount">%{{$productItem["product"]["discountRate"]}}</span>
                                            @endif


                                        @endif


                                    </div>
                                    @if($productItem['product']['variants'][0]['oldPrice']<$productItem['product']['variants'][0]['price'])
                                        <div class="card-old-price">{{number_format($productItem['product']['variants'][0]['oldPrice'], 2, '.', '')}} TL </div>
                                    @endif

                                </div>
                            </div>
                            <a class="all-brands" href="#">Tüm {{$productItem['product']['brand']['name']}} Ürünleri</a>
                        </div>
            @endif


                    @endforeach


            </div>
        </div>
        <div class="favorite-brands">
            <div class="section-title section-padding">
                Favori Markaların
                <a class="link" href="/reyonlar">Tüm Markalar</a>
            </div>
            <div class="brand-slider swiper">
                <div class="swiper-wrapper">
                @foreach ($items['items'] as $item)

                        <div class="swiper-slide">
                    <a href="{{ url("reyonlar?brand=".$item['brandId']) }}" class="brand-logo">
                        <img class="lazyload fluid-img" data-src="<?php echo getProductImageUrl($item['image']); ?>" alt="{{ $item['name'] }}" style="height: 50px">
                    </a>
                        </div>

                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


