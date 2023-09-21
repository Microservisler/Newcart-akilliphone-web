@extends('layouts.default')
@section('head')
    <title>Yorumlarım - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/comments/main.css') }}">
@endsection
@section('content')
    <section class="profile section-padding mx-24">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <x-profile.left-sidebar/>
                <div class="right">
                    <div class="profile-infos">
                        <div class="top">
                            <div class="title">Yorumlarım</div>
                            <div>3 Yorum</div>
                        </div>
                        <div class="comment-list">
                            <div class="comment">
                                <div class="comment-header">
                                    <div class="comment-header-top">
                                        <img src="../assets/images/product1.png" width="80" height="80" alt="">
                                        <div>Hoco iPhone 14 Plus 6.7 Kılıf Manyetik Magsafeli Darbe Emici Telefon Kılıfı</div>
                                    </div>
                                    <div class="comment-header-bottom">
                                        <div class="rating-area">
                                            <span><img src="../assets/images/full-star.svg" alt=""></span>
                                            <span><img src="../assets/images/full-star.svg" alt=""></span>
                                            <span><img src="../assets/images/full-star.svg" alt=""></span>
                                            <span><img src="../assets/images/full-star.svg" alt=""></span>
                                            <span><img src="../assets/images/empty-star.svg" alt=""></span>
                                        </div>
                                        <div>18 Şubat Cumartesi </div>
                                    </div>
                                </div>
                                <div class="comment-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam suscipit dolorem assumenda itaque! Voluptatum repellendus a neque, nihil delectus vitae!
                                </div>
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
