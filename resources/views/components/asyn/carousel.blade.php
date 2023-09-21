<section id="{{ $sectionId }}" class="section-8 section-padding">
    <div class="container">
        <div class="section-title section-padding">{{ $title }}<a class="link" href="<?php echo $slug; ?>">Tümünü Gör</a>
        </div>
        <div class="product-asyn-slider owl-carousel owl-theme" >
            <template v-for="item in sections.{{ $sectionId }}">
                <div class="product-item"  >
                    <a :href="'{{ url('incele') }}/' + item.slug + '?id='+item.productId">
                        <div class="product-image">

                            <img class="lazyload" style="height:160px;width: 160px;" alt="product image"  :src="item.thumb">
                        </div>
                        <div class="product-info">
                            <div class="product-name">@{{ item.name }}</div>
                            <template v-if="item.variants[0]">
                                <div class="product-price">
                                    <span>@{{ item.newPrice }}</span>
                                    <template v-if="item.variants[0].price<item.variants[0].oldPrice">
                                        <span class="discount"> %@{{ item.discountRate }} </span>
                                    </template>
                                </div>
                                <template v-if="item.discountRate">
                                    <div class="product-old-price" > @{{ item.oldPrice }}</div>
                                </template>
                            </template>
                        </div>
                    </a>
                </div>
            </template>
        </div>
    </div>
</section>
