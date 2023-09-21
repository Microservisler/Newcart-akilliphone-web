<div class="product-item">
    <a href="{{ url('incele') }}/{{ $item['slug'] }}?id={{$item['productId']}}">
    <div class="product-image">

            <img class="lazyload" style="height:160px;width: 160px;" data-src="" alt="product image" src="<?php echo getProductImageUrl($item['featuredImage']) ?>">

    </div>
    <div class="product-info">
        <div class="product-name">{{ $item['name'] }}</div>
        <div class="product-price">{{  number_format($item['variants'][0]['price'], 2, '.', '')   }} TL</div>
        <div class="product-old-price" >{{ number_format($item['variants'][0]['oldPrice'], 2, '.', '') }} TL</div>
    </div>
    </a>
</div>
