@extends('layouts.default')
@section('head')
    <title>Favorilerim - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/favorites/main.css') }}">
@endsection
@section('content')
    <section class="profile section-padding mx-24" style="margin-top: 150px">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <x-profile.left-sidebar/>
                <div class="right">
                    <div class="profile-infos">
                        <div class="top">
                            <div class="title">Favorilerim</div>
                            <div>{{count($user_data['customerFavorites'])}} ürün</div>
                        </div>
                        <div class="favorite-list">
                            <div class="row">
                                @if(isset($user_data['customerFavorites']))
                                    @foreach($user_data['customerFavorites'] as $favorites)

                                   <?php $url = "incele/1?id=".$favorites['productId']; ?>

                                        <a href="{{ url($url) }}" class="favorite-item">
                                            <div>
                                                <div class="product-image">
                                                    <img class="lazyload" width="140" height="140" data-src="{{getProductImageUrl($favorites['featuredImage'])}}" alt="product image" src="{{getProductImageUrl($favorites['featuredImage'])}}">
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-name">
                                                        {{$favorites['productName']}}
                                                    </div>
{{--                                                    <div class="product-price">--}}
{{--                                                        42.42TL--}}
{{--                                                    </div>--}}
{{--                                                    <div class="product-old-price">--}}
{{--                                                        85,56TL--}}
{{--                                                    </div>--}}
                                                </div>
                                                <button class="delete-favorite">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#fff" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                                </button>
                                            </div>
                                        </a>
                                    @endforeach

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('js')
    <script src="../assets/js/profile/order/profile-order.js"></script>
@endsection
