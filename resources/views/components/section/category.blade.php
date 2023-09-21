<section class="four-product-slider section-padding mx-24">
    <div class="container">
        <div class="four-slider owl-carousel owl-theme">
            @foreach ($items as $row)
                <a href="{{ url('reyonlar') }}/{{ $row['slug'] }}" class="big-product-card">
                    @foreach ($row['items'] as $item)
                    <div class="card-category">
                        <img width="232" height="147" src="<?php echo getProductImageUrl($item['brandImage'], 232, 147); ?>" alt="">
                    </div>
                    <div class="card-details">
                        <div class="product-image">
                            <img width="82" height="82" src="<?php echo getProductImageUrl($item['image'], 82, 82); ?>" alt="">
                        </div>
                        <div class="product-info">
                            <div class="product-name">{{ $item['name'] }}</div>
                            <div class="product-prices">
                                <div class="current">
                                    <span class="price">42.42TL</span>
                                    <span class="discount">%50</span>
                                </div>
                                <div class="old">85.56TL</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </a>
            @endforeach
        </div>
    </div>
</section>
