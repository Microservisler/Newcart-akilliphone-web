r<section class="four-product-slider section-padding mx-24">
    <div class="container">
        <div class="four-slider owl-carousel owl-theme">
            @foreach ($items as $row)
                @if($row['product'])
                <a href="{{ url('incele') }}/{{ $row['product']['slug'] }}?id={{$row['product']['productId']}}" class="big-product-card">
                    @endif

                    <div class="card-category">
                        <img width="232" height="147" src="<?php echo getProductImageUrl($row['desktopImage'], 232, 147); ?>" alt="">
                    </div>
                    <div class="card-details">
                        <div class="product-image">
                                @if($row['product'])
                            <img width="82" height="82" src="<?php echo getProductImageUrl($row['product']['featuredImage']); ?>" alt="">
                                @endif
                        </div>
                        <div class="product-info">
                            @if($row['product'] && isset($row['product']['variants'][0]))
                            <div class="product-name">{{ $row['product']['name'] }}</div>
{{--                            <div class="product-prices">--}}
{{--                                <div class="current">--}}
{{--                                    <span class="price">{{ number_format($row['product']['variants'][0]['price'], 2, '.', '') }} ₺</span>--}}
{{--                                    @if($row['product']['discountRate'])--}}
{{--                                        <span class="discount">%{{ $row['product']['discountRate'] }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                @if($row['product']['discountRate'])--}}
{{--                                <div class="old">{{ number_format($row['product']['variants'][0]['oldPrice'], 2, '.', '') }} ₺</div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                            @endif
                        </div>
                    </div>

                </a>
            @endforeach
        </div>
    </div>
</section>
