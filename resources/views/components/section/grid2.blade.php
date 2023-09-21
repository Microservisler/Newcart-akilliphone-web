<section class="section-padding {{ $class }}">
    <div class="container">
        <div class="section-title section-padding">
            {{ $title }}
            <a class="link" href="<?php echo $slug; ?>">Tümünü Gör</a>
        </div>
        <div class="row">
            @if ($banner)
                <div class="side-campaign">
                    <a href="#">
                        <img class="lazyload fluid-img" width="160" height="600"
                             data-src="{{ $banner }}" alt="Baseus Fırsatı Kaçırma">
                    </a>
                </div>

            @endif
            <div class="product-items">
                <div class="row">
                    @foreach ($items as $item)

                        <x-product.home-item2 :item="$item" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
