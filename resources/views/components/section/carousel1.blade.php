<section class="section-8 section-padding">
    <div class="container">
        <div class="section-title section-padding">{{ $title }}<a class="link" href="#">Tümünü Gör</a>
        </div>
        <div class="product-slider owl-carousel owl-theme">
            @foreach ($items as $item)
                <x-product.home-item :item="$item" />
            @endforeach

        </div>
    </div>
</section>
