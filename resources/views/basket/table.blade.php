<style>
    .product-dropshipping{
        display: flex;
        width: 100%;
    }
    .product-dropshipping table td{
        padding: 5px;
        font-size: 12px;
    }
    .product-dropshipping .form-control{
        border: 1px solid #cdcdcd;
        padding: 5px 10px;
    }
</style>
<div class="cart-wrapper">
    <div class="details-wrapper">
        <h1 class="basket_title">Sepetim</h1>
        <div class="shopping-cart">
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-quantity">ADET</label>
                <label class="product-line-price text-start ps-3">FİYAT</label>
            </div>
            @if($basket->basketItems)
                @foreach($basket->basketItems as $item)
                    <div class="product">
                        <div class="product-image">
                            <img src="{{ $item['featuredImage'] }}">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><a href="{{ $item['url'] }}">{{ $item['productName'] }}<br>{{ $item['name'] }}</a>
                                <span>{{ $item['code'] }}</span>
                                <span>
<svg xmlns="http://www.w3.org/2000/svg" width="13.414" height="13.414" viewBox="0 0 13.414 13.414">
<path id="Path_1639" data-name="Path 1639" d="M988.767,636.211a6.707,6.707,0,1,0,6.707,6.707A6.717,6.717,0,0,0,988.767,636.211Zm0,1.341a5.356,5.356,0,0,1,5.366,5.346v.02a5.356,5.356,0,0,1-5.346,5.366h-.02a5.356,5.356,0,0,1-5.366-5.346v-.02a5.356,5.356,0,0,1,5.346-5.366Zm0,1.118a.67.67,0,0,0-.67.671v3.577a.671.671,0,0,0,.335.58l2.71,1.565a.67.67,0,0,0,.671-1.16l-2.375-1.37v-3.191a.67.67,0,0,0-.67-.67Z" transform="translate(-982.06 -636.211)" fill="#0c9aff"></path>
</svg> {{ \Akilliphone\BasketService::getShippingDayAlert() }}
</span>
                            </div>
                        </div>
                        <div class="product-quantity">
                            <button class="value-button decrease" data-decrease="">-</button>
                            <input class="decrease-increase" data-value data-variyantid="{{ $item['variantId'] }}" type="text" value="{{ $item['quantity'] }}">
                            <button class="value-button increase" data-increase="">+</button>
                        </div>
                        <div class="product-line-price">
                            <span class="product-current-price">{{ $item['total'] }}</span>
                            @if($item['alert'])
                            <span class="basket-message {{ $item['alert']['class'] }}">{{ $item['alert']['message'] }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                Sepetiniz Boş
            @endif
        </div>


        <div class="return-shopping">
            <a href="{{ route('index') }}" class="return-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="5.001" height="8.774" viewBox="0 0 5.001 8.774">
                    <g id="flaticon1568189262-svg" transform="translate(102.14 8.773) rotate(180)">
                        <path id="Path_1398" data-name="Path 1398" d="M101.96,4.821,98.187,8.593a.614.614,0,0,1-.869-.869l3.338-3.338L97.319,1.049A.614.614,0,0,1,98.187.18l3.773,3.772a.614.614,0,0,1,0,.869Z" transform="translate(0 0)" fill="#7b7b7b"></path>
                    </g>
                </svg>
                Alışverişe Devam Et
            </a>
        </div>
    </div>
    @include('basket.totals')
</div>
<script>

</script>

