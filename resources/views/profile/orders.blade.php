@extends('layouts.default')
@section('head')
    <title>Siparişler - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/order/main.css') }}">
@endsection
@section('content')
    <?php
    $user=session('userInfo');


    ?>
    <section class="profile section-padding mx-24" style="margin-top: 150px">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <x-profile.left-sidebar/>
                <div class="right">
                    <div class="orders">
                        <div class="top">
                            <div class="title">Siparişlerim</div>
                            <div class="search">
                                <input placeholder="Ürün İsmi veya Marka Ara" type="search">
                                <button class=""><img width="49" height="49" src="../assets/images/search-icon.svg"
                                                      alt="">
                                </button>
                            </div>
                            <div class="signup-select">
                                <select style="display: none">
                                    <option value="0"></option>
                                    <option value="1" selected>Tüm siparişler</option>
                                    <option value="2">Son 30 Gün</option>
                                    <option value="3">Son 6 Ay</option>
                                </select>
                            </div>
                        </div>
                        <div class="order-list">
        @if(isset($orders))


                            @foreach($orders as $order)
                                <?php
                                    $dateTime = new DateTime($order['createdAt']);
                                   $newDateFormat = $dateTime->format("d-m-Y");
                                    ?>
                                <div class="order">
                                    <div class="order-header">
                                        <div class="info">
                                            <div class="title">Sipariş Tarihi</div>
                                            <div class="descr">{{$newDateFormat}}</div>
                                        </div>
                                        <div class="info">
                                            <div class="title">Sipariş Özeti</div>
                                            <div class="descr">1 Teslimat, 2 Ürün</div>
                                        </div>
                                        <div class="info">
                                            <div class="title">Alıcı</div>
                                            <div class="descr">
                                                @if(isset($order['orderCustomer']['firstName']) &&isset($order['orderCustomer']['lastName']) )

                                                    {{$order['orderCustomer']['firstName']." ". $order['orderCustomer']['lastName'] }}
                                                @elseif(isset($order['orderCustomer']['firstName']))
                                                    {{$order['orderCustomer']['firstName']}}
                                                @endif

                                            </div>
                                        </div>
                                        <div class="info">
                                            <div class="title">Tutar</div>
                                            <div class="descr">@if(isset($order['orderTotals'][0]['value']))
                                                    {{$order['orderTotals'][0]['value']." ₺"}}
                                                @elseif($order['orderTotal'])
                                                    {{$order['orderTotal']." ₺"}}
                                                @endif
                                            </div>
                                        </div>
                                        <a class="refund-btn" href="#">İade Talebi</a>
                                    </div>
                                    <div class="order-body">
                                        @foreach($order['orderProducts'] as $product)

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

                                        <a class="order-detail" href="./orderdetail/<?php echo $order['orderNo'] ?>">Sipariş Detayı</a>
                                    </div>
                                </div>

                            @endforeach
                            @endif
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
