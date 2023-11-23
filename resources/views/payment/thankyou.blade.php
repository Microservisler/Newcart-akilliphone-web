@extends('layouts.default')
@section('head')
    <title>Ödeme Sayfası - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/shopping-section4.css') }}">
    <style>
        .pay3d-errors{
            color: #e91e63;
            border: 1px solid;
            padding: 10px;
            margin-bottom: 30px;
            border-radius: 5px;

        }
    </style>

@endsection
@section('content')
    <section class="shopping_section">
        <div class="container">
            <x-payment.steps :step="4"/>
                @if($error)
                    <div class="pay3d-errors">
                        {{ $error }}
                    </div>

                @else
                    <div class="signup-title">
                        <h1>Sipariş Özeti</h1>
                        Alışverişiniz için teşekkür ederiz. Siparişiniz en kısa sürede hazırlanacak.
                    </div>
                    <div class="shopping-wrapper">
                    <div class="form-wrapper">
                        <div class="order-summary">
                            <div class="order-description">
                                {!! Basket()::getOrderDescription($order) !!}
                            </div>
                        </div>
                        <div class="order-summary">
                            <div class="summary-title"> Sipariş numarası: <span class="order-number">{{ $order['orderId'] }}</span></div>
                            <div>
                                Sipariş numaranızı kaybetmeyiniz. Kargo takibi ve olası işlemlerinizde bu numara üzerinden işlem yapılacaktır.
                            </div>
                        </div>
                        <div class="order-summary">
                            {!! Basket()::getOrderSummary($order) !!}
                            <hr class="summary-title">
                            @if($extra)
                                {!! Basket()::getPaymentExtraDescription($extra) !!}
                            @else
                                {!! Basket()::getPaymentDescription($order['paymentTypeId']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="cart-wrapper">
                        <div class="header">
                            <div class="title">Siparişim</div>
                            <span class="item-count">{{ count($order['orderProducts']) }}</span>
                        </div>
                        <div class="body">
                            @foreach($order['orderProducts'] as $orderProduct)
                                <div class="purchased">
                                    <img src="assets/images/80x80-1.png" alt="">
                                    <div class="info">
                                        <div class="name">{{ $orderProduct['name'] }} Barkodu: {{ $orderProduct['barcode'] }} ({{ $orderProduct['quantity'] }} Adet)</div>
                                        <div class="price">{{ $orderProduct['total'] }}<span>&nbsp;TL</span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="total">
                            @foreach($order['orderTotals'] as $orderTotal)
                                <div class="info-total">
                                    <div class="descr">{{ $orderTotal['name'] }}</div>
                                    <div class="price">{{ $orderTotal['value'] }}<span>&nbsp;TL</span></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
        </div>
                @endif
    </section>
@endsection
@section('js')

@endsection
