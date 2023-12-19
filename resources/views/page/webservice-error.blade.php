@extends('layouts.default')
@section('head')
    <title>Web Servis Hatası - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/aboutUs.css?_t=1.01') }}">
    <style>
        .welcome-about {
            margin: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="welcome-about" style="padding-top: 200px">
        <h1 class="main-title">Teknik Bir Hata Oluştu</h1>
        <br>
        <div class="aboutus-content">
            <h2 style="font-weight: bold;font-size: 20px;padding: 20px">Lütfen daha sonra tekrar deneyiniz</h2>
            <p>Teknik bir problemden kaynaklanan bu hata için özür dileriz.</p>
        </div>
    </div>

@endsection
