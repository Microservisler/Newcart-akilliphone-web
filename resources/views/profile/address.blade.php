@extends('layouts.default')
@section('head')
    <title>Adres Bilgilerim - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/address/main.css') }}">
@endsection
@section('content')
    <?php
    if(session('userInfo')['data']['addresses']){
        $addresses=session('userInfo')['data']['addresses'];
    }
    ?>
    <section class="profile section-padding mx-24" style="margin-top: 150px">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <x-profile.left-sidebar/>
                <div class="right">
                    <div class="profile-infos">
                        <div class="top">
                            <div class="title">Adreslerim</div>
                        </div>
                        <a href="{{route('profile.addressform')}}" class="new-address-btn">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zm0 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 3.5a.5.5 0 0 1 .5.5v2.5H11a.5.5 0 0 1 .492.41L11.5 8a.5.5 0 0 1-.5.5H8.5V11a.5.5 0 0 1-.41.492L8 11.5a.5.5 0 0 1-.5-.5V8.5H5a.5.5 0 0 1-.492-.41L4.5 8a.5.5 0 0 1 .5-.5h2.5V5a.5.5 0 0 1 .41-.492z" fill="#1A9AFC" fill-rule="evenodd"></path></svg>
                           Adres Ekleme
                        </a>

                        @foreach($addresses as $addres)

                            <div class="address-list">
                                <div class="address">
                                    <div class="address-header">
                                        {{$addres['title']}}
                                    </div>
                                    <div class="address-body">
                                        {{$addres['address1']}}
                                    </div>
                                    <div class="address-footer">
                                        <a class="edit-address" href="addressedit/{{$addres['addressId']}}">Düzenle</a>
                                        <a class="delete-address" href="#">Sil</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="./assets/js/signup-select.js"></script>
    <script src="./assets/js/flatpickr.min.js"></script>
    <script src="./assets/js/mask.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/tr.js"></script>

@endsection
