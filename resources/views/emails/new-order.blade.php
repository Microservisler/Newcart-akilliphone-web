<strong><h1>Tebrikler Siparişiniz başarıyla oluşturuldu</h1></strong>
@if($order)
    {!! Basket()::getOrderDescription($order) !!}
@endif
@if(isset($extra))
    <hr>
    {!! Basket()::getPaymentExtraDescription($extra) !!}
@endif
@if($order)
    <hr>
    {!! Basket()::getOrderSummary($order) !!}
    <hr>
    <strong>Ürün Bilgileri</strong>
    <table>
        <tr>
            <td><div style="padding: 0px 10px">Resim</div></td>
            <td><div style="padding: 0px 10px">Ürün</div></td>
            <td><div style="padding: 0px 10px">Adet</div></td>
            <td><div style="padding: 0px 10px">Tutar</div></td>
        </tr>
        @foreach($order['orderProducts'] as $orderProduct)
            <tr>
                <td><img src="assets/images/80x80-1.png" alt=""></td>
                <td><div style="padding: 0px 10px">{{ $orderProduct['name'] }}<br>Barkodu: {{ $orderProduct['barcode'] }}</div></td>
                <td><div style="padding: 0px 10px">{{ $orderProduct['quantity'] }} Adet</div></td>
                <td><div style="padding: 0px 10px">{{ $orderProduct['total'] }}<span>&nbsp;TL</span></div></td>
            </tr>
        @endforeach
    </table>
@endif
