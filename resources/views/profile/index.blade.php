@extends('layouts.default')
@section('head')
    <title>{{$page}} - AkıllıPhone</title>
    <link rel="stylesheet" href='{{ url("assets/css/profile/".$page."/main.css") }}'>
    <link rel="stylesheet" href="{{ url('assets/css/profile/informations/main.css') }}">
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
                            <div class="title">Üyelik Bilgilerim</div>
                        </div>
                        <form action="">
                            <div class="form-wrapper">
                                <div class="signup-input">
                                    <span class="label">Adı<span>&nbsp;*</span></span>
                                    <input type="text">
                                </div>
                                <div class="signup-input">
                                    <span class="label">Soyadı<span>&nbsp;*</span></span>
                                    <input type="text">
                                </div>
                                <div class="signup-input">
                                    <span class="label">E-Posta Adresi<span>&nbsp;*</span></span>
                                    <input type="text">
                                </div>
                                <div class="signup-input">
                                    <div class="signup-select">
                                        <span class="label">Cinsiyet<span>&nbsp;*</span></span>
                                        <select>
                                            <option value="0"></option>
                                            <option value="1">Erkek</option>
                                            <option value="2">Kadın</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="signup-input">
                                    <span class="label">Doğum Tarihi<span>&nbsp;*</span></span>
                                    <input type="text" id="date-picker">
                                </div>
                                <div class="signup-input">
                                    <span class="label">Cep Tel<span>&nbsp;*</span></span>
                                    <input id="mobilePhone" type="text">
                                </div>
                                <div class="signup-agreement">
                                    <label for="membership">
                                        <input class="option-input checkbox" type="checkbox" id="membership"
                                               required>
                                        Üyelik Sözleşmesi şartlarını okudum ve kabul ediyorum. Tarafımla pazarlama
                                        ve tanıtım amaçlı iletişime geçilmesine izin veriyorum.
                                    </label>
                                </div>
                                <div class="signup-buttons">
                                    <a class="submit-btn" href="#">Bilgilerimi Güncelle</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="../assets/js/profile/order/profile-order.js"></script>
@endsection
