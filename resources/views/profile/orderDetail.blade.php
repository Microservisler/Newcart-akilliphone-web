@extends('layouts.default')
@section('head')
    <title>Sipariş Detay - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/order/main.css') }}">
@endsection
@section('content')
    <?php
    $user=session('userInfo');
    $order=$orders;

    ?>
    <section class="profile section-padding mx-24" style="margin-top: 150px">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <x-profile.left-sidebar/>
                <div class="right">
                    <div class="orders">
                        <div class="top">
                            <div class="title">Sipariş detayı</div>
                        </div>
                        <div class="detail">
                            <div class="detail-body">
                                @foreach( $order['orderProducts'] as $product)
                                        <?php
                                        $dateTime = new DateTime($order['createdAt']);
                                        $newDateFormat = $dateTime->format("d-m-Y");
                                        ?>
                                    <div class="product-details">
                                        <div class="product-img">
                                            <img src="<?php echo 'https://cdn-x.akilliphone.com/'.$product['image']?>" alt="product name">
                                        </div>
                                        <div class="product-info">
                                            <div class="name">
                                               {{$product['name']}}
                                            </div>
                                            <div class="code">
                                                {{$product['barcode']}}
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                            </div>
                            <div class="detail-header">
                                <div class="info">
                                    <div class="title">Sipariş Tarihi</div>
                                    <div class="descr">{{$newDateFormat}}</div>
                                </div>
                                <div class="info">
                                    <div class="title">Sipariş Numarası</div>
                                    <div class="descr">{{$order['orderNo']}}</div>
                                </div>
                                <div class="info">
                                    <div class="title">Sipariş Özeti</div>
                                    <div class="descr">1 Teslimat, 2 Ürün</div>
                                </div>
                                <div class="info">
                                    <div class="title">Tutar</div>
                                    <div class="descr">{{$order['orderTotals'][0]['value']}}</div>
                                </div>
                                <div class="info">
                                    <div class="title">Alıcı</div>
                                    <div class="descr">{{$order['orderCustomer']['firstName']." ". $order['orderCustomer']['lastName'] }}</div>
                                </div>
                                <a class="refund-btn" href="#">İade Talebi</a>
                                <a class="refund-btn" href="#">Siparişlerim</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        var settings = {
            "url": "https://api.duzzona.site/orders",
            'cache': false,
            "async": true,
            "crossDomain": true,
            "method": "GET",
            "headers": {
                "Access-Control-Allow-Origin":"*",
            }
        };
        $.ajax(settings).done(function (response) {
            console.log(response);
        }).fail(function(xhr, status, error) {


        });

    </script>
    <script src="../assets/js/profile/order/profile-order.js"></script>
@endsection
