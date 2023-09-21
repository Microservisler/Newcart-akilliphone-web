@extends('layouts.payment')
@section('head')
    <title>Ödeme Sayfası - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/shopping/shopping-section.css') }}?_v={{ env('ASSETS_VER') }}">
@endsection
@section('content')
    <x-payment.steps :step="1"/>
    @if($basket->basketItemCount)
        <div class="for-you-special"></div>
        <div id="basket-table">
            {!! $basket->table !!}
        </div>
    @else
        Alışveriş sepetiniz boş! <a href="{{ route('index') }}">Alışverişe Devam Et</a>
    @endif
@endsection
@section('recently-viewed')
    <x-product.recently-viewed />
@endsection
