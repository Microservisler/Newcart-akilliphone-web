<section class="section-9 section-padding mx-24">
    <div class="container">
        <div class="section-title section-padding px-24">
            Favori Markaların
            <a class="link" href="#">Tümünü Gör</a>
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


