@extends('layouts.default')
@section('head')
    <title>Akilliphone - Online Store</title>

@endsection
@section('content')
    @if($main_slider && isset($main_slider['data']))
        <x-section.main-slider :items="$main_slider['data']['items']"/>
    @endif
    @if($tall_banner && isset($tall_banner['data']))
        <x-section.tall-banner :items="$tall_banner['data']['items']" :index="1"/>
    @else
        <x-section.lost :title="'İmage section'" />
    @endif
    @if($product_slider && isset($product_slider['data']))
        <x-section.product-slider :items="$product_slider['data']['items']"/>
    @else
        <x-section.lost :title="'İmage Product- Slider'" />
    @endif

    <x-asyn.carousel :sectionId="'new_product'" :title="'Yeni Ürünler'" :slug="'/reyonlar?offset=12&page=1&section=new_arrivals'" />
    <x-asyn.carousel :sectionId="'best_sold'" :title="'Çok Satan Ürünler'" :slug="'/reyonlar?offset=12&page=1&section=most_ordered'" />
    <x-asyn.carousel :sectionId="'restocked'" :title="'Yeniden Stokta'" :slug="'/reyonlar?offset=12&page=1&section=restocked'" />
    <x-asyn.carousel :sectionId="'on_sale'" :title="'İndirime Girenler'" :slug="'/reyonlar?offset=12&page=1&section=on_sale'" />
    @if($tall_banner && isset($tall_banner['data']))
        <x-section.tall-banner :items="$tall_banner['data']['items']"  :index="2"/>
    @else
        <x-section.lost :title="'İmage section'" />
    @endif
    @include('home.brand-slider')
    <x-asyn.carousel :sectionId="'section1'" :title="'Aksesuarlar'" :slug="'/reyonlar/aksesuarlar-207?category=270'" />
    <x-asyn.carousel :sectionId="'section2'" :title="'Araç Aksesuarları'" :slug="'/reyonlar/arac-aksesuarlari-280?category=2'" />
    <x-asyn.carousel :sectionId="'section3'" :title="'Ev Yaşam'" :slug="'/reyonlar/ev-yasam-327?category=78'" />
    <x-asyn.carousel :sectionId="'section4'" :title="'Şarj Aletleri'" :slug="'/reyonlar/sarj-aletleri-203?category=103'" />
    <x-asyn.carousel :sectionId="'section5'" :title="'Dönüştürücüler'" :slug="'/kablolar-ve-donusturuculer-209?category=89'" />
    <x-asyn.carousel :sectionId="'section6'" :title="'Ses Sistemleri'" :slug="'/reyonlar/ses-sistemleri-157?category=112'" />
    <x-asyn.carousel :sectionId="'section7'" :title="'Kişisel Ürünler'" :slug="'/reyonlar/kisisel-bakim-337?category=75'" />
    <x-asyn.carousel :sectionId="'section11'" :title="'Benzer Kategoriler'" :slug="'/reyonlar/kisisel-bakim-337?category=75'" />


@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const { createApp } = Vue;
        var app = createApp({
            data() {
                return {
                    sections: {},
                    error:"",
                    cdnUrl:cdnUrl,
                    target:'',
                }
            },
            created: function(){

            },
            updated: function () {
                this.$nextTick(function () {
                    create_product_owl_slider( '#' + this.target +' .product-asyn-slider');
                })
            },
            methods : {
                getProductImageUrl: function(url, w, h){
                    return webService.getProductImageUrl(url, w, h);
                }
            }
        }).mount('#app-basic');


        webService.getSectionProducts('products?offset=12&page=1&section=new_arrivals', 'new_product');
        webService.getSectionProducts('products?offset=12&page=1&section=most_ordered', 'best_sold');
        webService.getSectionProducts('products?offset=12&page=1&section=restocked', 'restocked');
        webService.getSectionProducts('products?offset=12&page=1&section=on_sale', 'on_sale');

        webService.getSectionProducts('products?cat=76&sort=newly&orderby=desc&offset=12', 'section11');

        webService.getSectionProducts('products?cat=1,2,3,6,5,12,9,10,8,7,4,11,48,55,63,57,44,45,47,46,13,21,16,20,19,23,24,30,31,27,32,28,25,29,26,34,41,40,36,38,37,39,35,33,43&sort=newly&orderby=desc&offset=12', 'section1');
        webService.getSectionProducts('products?cat=2,3,6,5,12,9,10,8,7,4,11&sort=newly&orderby=desc&offset=12', 'section2');
        webService.getSectionProducts('products?cat=78,83,85,87,80,88,84,81,86,79&sort=newly&orderby=desc&offset=12', 'section3');
        webService.getSectionProducts('products?cat=103,105,107,110,104,108,109,111,106&sort=newly&orderby=desc&offset=12', 'section4');
        webService.getSectionProducts('products??cat=89,95,92,102,101,90,96,98,100,94,97,91,99,93&sort=newly&orderby=desc&offset=12', 'section5');
        webService.getSectionProducts('products?cat=112,113,115,119,117,122,118,114,121,116,120&sort=newly&orderby=desc&offset=12', 'section6');
        webService.getSectionProducts('products?cat=84&sort=newly&orderby=desc&offset=12', 'section7');
        lazyload();
    </script>
@endsection
