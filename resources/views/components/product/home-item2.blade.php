@if($item['variants'])
    <div class="product-item">
    <a href="{{ url('incele') }}/{{ $item['slug'] }}?id={{$item['productId']}}">
        <div class="product-image">

            <img class="lazyload" style="height:160px;width: 160px;" data-src="" alt="product image" src="<?php echo getProductImageUrl($item['featuredImage']) ?>">
        </div>
        <div class="product-info">
            <div class="product-name">{{ $item['name'] }}</div>
            <div class="product-price">
                <span> {{  number_format($item['variants'][0]['price'], 2, '.', '')   }} TL</span>
                @if(number_format($item['discountRate'], 0, '.', '')>0)
                    <span class="discount"> %{{  number_format($item['discountRate'], 0, '.', '')   }}  </span>

                @endif

            </div>
            @if($item['variants'][0]['price'] > $item['variants'][0]['oldPrice'])
                <div class="product-old-price" >{{ number_format($item['variants'][0]['oldPrice'], 2, '.', '') }} TL</div>
            @endif
        </div>
    </a>
</div>
@endif
