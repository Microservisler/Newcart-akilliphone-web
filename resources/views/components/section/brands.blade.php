<section class="section-9 section-padding mx-24">
    <div class="container">
        <div class="section-title section-padding px-24">
            Favori Markaların
            <a class="link" href="#">Tümünü Gör</a>
        </div>

        <div class="left-slider">
            <div class="one-card-slider owl-carousel owl-theme">
@foreach($products['items'] as $productItem)


                <div class="card-slider">
                    <div class="card-brand"><img class="lazyload" width="100" height="30"
                                                 data-src="<?php echo getProductImageUrl($productItem['brandImage']); ?>" alt="{{$productItem['brandName']}}"></div>
                    <hr class="divider">
                    <div class="card-image"><img class="lazyload" width="128" height="128"
                                                 data-src="<?php echo getProductImageUrl($productItem['image']); ?>" alt="Xiaomi"></div>
                    <div class="card-info">
                        <div class="card-name">{{$productItem['name']}}</div>
                        <div class="card-prices">
                            <div class="card-price">
                                <span class="current">{{number_format($productItem['newPrice'], 2, '.', '')}} TL</span>
                                <span class="discount">%27</span>
                            </div>
                            <div class="card-old-price">{{number_format($productItem['oldPrice'], 2, '.', '')}} TL </div>
                        </div>
                        <div class="add-btn"><a href="#">Sepete Ekle</a></div>
                    </div>
                    <a class="all-brands" href="#">Tüm {{$productItem['brandName']}} Ürünleri</a>
                </div>
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
                @foreach ($items as $item)
                        <div class="swiper-slide">
                    <a href="{{ url("reyonlar?brand=".$item['brandId']) }}" class="brand-logo"><img class="lazyload fluid-img" data-src="<?php echo getProductImageUrl($item['image']); ?>" alt="{{ $item['name'] }}"></a>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
