<section class="recently-viewed section-padding">
    <div class="container">
        <div class="section-title section-padding">
            Son İnceledikleriniz
        </div>
        <div class="product-slider owl-carousel owl-theme">
            @if(\Akilliphone\BasketService::getLastVieweds())
                @foreach(\Akilliphone\BasketService::getLastVieweds() as $item)
                    <x-product.home-item2 :item="$item"/>
                @endforeach
            @endif
        </div>
    </div>
</section>
