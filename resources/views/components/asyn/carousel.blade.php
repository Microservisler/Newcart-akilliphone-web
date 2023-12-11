<section id="{{ $sectionId }}" class="section-8 section-padding">
    <div class="container">
        <div class="section-title section-padding">{{ $title }}<a class="link" href="<?php echo $slug; ?>">Tümünü Gör</a>
        </div>
        <div class="product-asyn-slider owl-carousel owl-theme" >
            <template v-for="item in sections.{{ $sectionId }}">
                <template v-if="item && item.variants && item.variants.length > 0 && item.variants[0].hasOwnProperty('variantOptions')">
                <template v-if="item.variants[0].variantOptions[0].stock > 0">
                 <div class="product-item">
                    <a :href="'{{ url('incele') }}/' + item.slug + '?id='+item.productId">
                        <div class="product-image">

                            <img class="lazyload" style="height:160px;width: 160px;" alt="product image"  :src="item.thumb">
                        </div>
                        <div class="product-info">
                            <div class="product-name">@{{ item.name }}</div>

                                <div class="product-price">
                                    <span>@{{ item.newPrice }}</span>
                                    <template v-if="item.variants[0].price<item.variants[0].oldPrice">
                                        <span class="discount"> %@{{ item.discountRate }} </span>
                                    </template>
                                </div>
                                <template v-if="item.discountRate">
                                    <div class="product-old-price" > @{{ item.oldPrice }}</div>
                                </template>


                        </div>
                       </a>
                     </div>
                </template>
               </template>
{{--                <template v-else>--}}
{{--                    <div class="product-item">--}}
{{--                        <a :href="'{{ url('incele') }}/' + item.slug + '?id='+item.productId">--}}
{{--                            <div class="product-image" style="position: relative" >--}}

{{--                                <img class="lazyload" style="height:160px;width: 160px; opacity: 0.5;" alt="product image"  :src="item.thumb">--}}
{{--                                <span class="discount" style="color: red; font-weight: bold;position: absolute;top: 0;left:0;"> <img src="{{ url('assets/images/tukendi.png') }}" style="border: none"> </span>--}}
{{--                            </div>--}}

{{--                            <div class="product-info" style="opacity: 0.6">--}}

{{--                                <div class="product-name">@{{ item.name }}</div>--}}
{{--                                <div class="product-price" style="opacity: 0.6">--}}
{{--                                    <span>@{{ item.newPrice }}</span>--}}
{{--                                    <template v-if="item.variants[0].price<item.variants[0].oldPrice">--}}
{{--                                        <span class="discount"> %@{{ item.discountRate }} </span>--}}
{{--                                    </template>--}}
{{--                                </div>--}}
{{--                                <template v-if="item.discountRate" style="opacity: 0.6">--}}
{{--                                    <div class="product-old-price" > @{{ item.oldPrice }}</div>--}}
{{--                                </template>--}}


{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </template>--}}

             </template>
        </div>
    </div>
</section>
