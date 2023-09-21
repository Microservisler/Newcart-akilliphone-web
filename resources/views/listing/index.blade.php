@extends('layouts.default')
@section('head')
    <title>Akilliphone - Online Store</title>

    <link rel="stylesheet" href="{{ url('assets/css/product-filter.css') }}?_v={{ env('ASSETS_VER') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script>
        var app;
    </script>
@endsection
@section('content')
    <?php
    if(isset($_GET['category'])){
        $getCategory=$_GET['category'];

    }

    if(isset($categories['data']['items'][$category_code])){

        $cat_ids = $categories['data']['items'][$category_code]['child_ids'];

    }
    ?>
    <section class="filter-section section-padding">
        <div class="container" id="container">
            <h1 class="title">Akıllı Aksesuarlar</h1>
            <div class="breadcrumb">
                <nav>
                    <ul>
                        <li><a href="/"><img src="{{ url('assets/images/home-icon.svg') }}"></a></li>
                        <li><a href="{{ url('reyonlar') }}">Tüm Ürünler</a></li>
                        @if(isset($category_code) )
                            @if($category_code)
                                @if(isset($categories['data']['items'][$category_code]['main']) )
                                    <li><a href="{{ getCategoryUrl($categories['data']['items'][$category_code]['main']) }}">{{ $categories['data']['items'][$category_code]['main']['name'] }}</a></li>
                                @endif
                                <li><a href="{{ getCategoryUrl($categories['data']['items'][$category_code]['info']) }}">{{ $categories['data']['items'][$category_code]['info']['name'] }}</a></li>
                            @endif

                        @endif
                    </ul>
                </nav>
            </div>
            <div class="row">
                <aside id="sidenav" class="left">
                    <span id="close"><svg width="20" height="20" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208s208-93.31 208-208S370.69 48 256 48Zm86.63 272L320 342.63l-64-64l-64 64L169.37 320l64-64l-64-64L192 169.37l64 64l64-64L342.63 192l-64 64Z"/></svg></span>
                    <div class="filtermenu-box">
                        <div class="title">
                            @if(isset($category_code) && $category_code )
                                @if( isset($categories['data']['items'][$category_code]) )
                                    {{ $categories['data']['items'][$category_code]['info']['name'] }}
                                @endif
                            @else
                                Kategoriler
                            @endif
                        </div>
                        <div class="content">
                            @if(isset($category_code) )
                                @if( isset($categories['data']['items'][$category_code]) )
                                    @foreach($categories['data']['items'][$category_code]['childs'] as $category)

                                        <a href="{{ getCategoryUrl($category['info']) }}">{{$category['info']['name']}}</a>
                                    @endforeach
                                @endif
                            @endif
                            @if(!isset($_GET['category']))
                                @foreach($main_menu['data']['items'] as $defaultCategories)

                                    <a href="{{ getCategoryUrl($defaultCategories) }}"> {{$defaultCategories['name']  }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <?php
                    $getSections=isset($_GET['section'])?$_GET['section']:0;

                    ?>
                    @if(isset($_GET['section']) )

                        <input checked type="checkbox" class="option-input forfilter sections " id="filter-sections" value="{{ $getSections }}"  style="display: none" >
                    @endif
                    <?php
                    $getText=isset($_GET['text'])?$_GET['text']:0;
                    ?>
                    @if(isset($_GET['text']) )
                        <input checked type="checkbox" class="option-input forfilter searchText " id="filter-search" value="{{ $getText }}"  style="display: none" >
                    @endif
                    @if(isset($_GET['category']) )

                        <input checked type="checkbox" class="option-input forfilter category " id="filter-cat" value="{{$_GET['category'] }}"  style="display: none" >
                    @endif
                    <div class="filtermenu-box">
                        <div class="title">markalar</div>
                        <div class="content">
                            <input class="search" type="text" placeholder="Marka Ara"  id="aramaKutusu" onkeyup="aramaYap()">
                            <div class="brand-box">

                                <ul id="markalar">
                                    @foreach ($filterable['brands'] as $item)
                                        <li>
                                            <label for="{{$item['name']}}">
                                                <input @if($item['id']==$selected_brand) checked @endif type="checkbox" class="option-input forfilter brands " id="{{$item['name']}}" value="{{$item['id']}}" >
                                                {{$item['name']}}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="filtermenu-box">
                        <div class="title">fiyat aralığı</div>
                        <div class="content">
                            <div class="price-search">
                                <div class="search-inputs">
                                    <input type="text" placeholder="En Az">
                                    <span>-</span>
                                    <input type="text"  placeholder="En Çok">
                                </div>
                                <button class="price-search-btn" type="submit" style="cursor: pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 49 49"><g transform="translate(-1176 -58)"><rect width="49" height="49" rx="24.5" transform="translate(1176 58)" fill="#1a9afc"/><path d="M23.96.806a6.006,6.006,0,0,0-2.2,8.2,6,6,0,0,0,7.189,2.664l2.7,4.679,1.926-1.112-2.7-4.679A6.007,6.007,0,0,0,32.165,3a6,6,0,0,0-8.2-2.2Zm6.278,3.31a3.783,3.783,0,0,1-3.27,5.673A3.8,3.8,0,0,1,23.689,7.9a3.783,3.783,0,0,1,3.27-5.673A3.8,3.8,0,0,1,30.238,4.116Z" transform="translate(1173.233 74.323)" fill="#fff"/></g></svg>
                                </button>
                            </div>

                        </div>
                        <label for="price-10" class="prices">
                            <input type="radio" class="option-input forfilter price" id="price-10"  name="fiyat" value="0-10">
                            0 - 10 TL
                        </label>
                        <label for="price-25" class="prices">
                            <input type="radio" class="option-input forfilter price" id="price-25"  name="fiyat" value="10-25">
                            10 - 25 TL
                        </label>
                        <label for="price-100" class="prices">
                            <input type="radio" class="option-input forfilter price" id="price-100"  name="fiyat" value="25-100">
                            25 - 100 TL
                        </label>
                        <label for="price-1000" class="prices">
                            <input type="radio" class="option-input forfilter price" id="price-1000"  name="fiyat" value="100-1000">
                            100 - 1.000 TL
                        </label>
                        <label for="price-10000" class="prices">
                            <input type="radio" class="option-input forfilter price" id="price-10000"  name="fiyat" value="1000-10000">
                            1.000 - 10.000 TL
                        </label>
                    </div>

                    <div class="filtermenu-box">
                        <div class="title">renk</div>
                        <div class="content">
                            @foreach ($colors['data']['0']['items'] as $color)
                                    <?php
                                    $sub_colors = explode(',', $color['value']);
                                    $sub_color_class = implode(' color-',  $sub_colors);
                                    ?>
                                <label for="color-{{$color['id']}}" class="colors  color-{{ $sub_color_class }}">
                                    <input type="checkbox" class="color forfilter" id="color-{{$color['id']}}" style="background-color:{{$color['style']}};" value="{{$color['value']}}">
                                    {{$color['name']}}
                                </label>
                            @endforeach

                        </div>
                    </div>
                </aside>
                <div class="right">
                    @if(isset($_GET['text']) )
                    <h3 style="    font-size: 20px;
    font-weight: 700;
    line-height: 47px;
    margin-bottom: 20px;
    color: #293341;">
                            "{{$_GET['text']}}" Araması İçin Sonuçlar Listeleniyor</h3>
                    @endif

                    @if($three_banner && isset($three_banner['data']))
                        <x-section.three-banner :items="$three_banner['data']['items']"  :index="2"/>
                    @else
                        <x-section.lost :title="'İmage section'" />
                    @endif

                    <div class="filter-buttons">
                        <div id="listbox" class="list">
                            <svg width="20" height="20" viewBox="0 0 32 32"><path fill="currentColor" d="m16 28l-7-7l1.41-1.41L16 25.17l5.59-5.58L23 21l-7 7zm0-24l7 7l-1.41 1.41L16 6.83l-5.59 5.58L9 11l7-7z"/></svg>
                            Sırala
                        </div>
                        <div id="burgermenu" class="side-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M11 20q-.425 0-.712-.288Q10 19.425 10 19v-6L4.2 5.6q-.375-.5-.112-1.05Q4.35 4 5 4h14q.65 0 .913.55q.262.55-.113 1.05L14 13v6q0 .425-.287.712Q13.425 20 13 20Z"/></svg>
                            Filtrele
                        </div>
                    </div>
                    <div id="tab-btns" class="tab-section">
                        <div class="tab block">
                            <label href="javascript:void(0)" class="tabSpec">
                                <input name="order" type="radio" class="option-input forfilter orderBy" value="order|desc">
                                Çok satanlar</label>
                            <label href="javascript:void(0)" class="tabSpec active">
                                <input name="order" type="radio" class="option-input forfilter orderBy" value="newly|desc">
                                En yeniler</label>
                            <label href="javascript:void(0)" class="tabSpec">
                                <input name="order" type="radio" class="option-input forfilter orderBy" value="price|asc">
                                En düşük fiyat</label>
                            <label href="javascript:void(0)" class="tabSpec" >
                                <input name="order" type="radio" class="option-input forfilter orderBy" value="price|desc">
                                En yüksek fiyat</label>
                        </div>

                        <div class="tab-right">
                            <select name="more"  id="siralama"  class="option-input forfilter orderBy">
                                <option value="" disabled selected hidden>Diğer</option>
                                <option value="name|asc" >Ada Göre Sıralama (A-Z) </option>
                                <option value="name|desc" > Ada Göre Sıralama (Z-A)</option>
                                <option value="rated|desc" >Çok Değerlendirilenler</option>
                            </select>
                            <!-- <div class="view-buttons">
                              <button class="list-btn"><img src="assets/images/list.svg" alt=""></button>
                              <button class="grid-btn"><img src="assets/images/grid.svg" alt=""></button>
                            </div> -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tabDetails" style="display:block;" >
                            <div class="product-items jscroll" id="jscroll">
                                <div class="product-wrapper ">
                                    <template v-for="item in datas.items" >
                                        <div class="product-item" >
                                            <a :href="'{{ url('incele') }}/' + item.slug + '?id='+item.productId">
                                                <div class="product-image">
                                                    <img class="lazyload" width="160" height="160" :src="item.thumb" alt="product image">
                                                </div>
                                                <div class="product-info">
                                                    <div class="product-name">
                                                        <span v-text="item.name"></span>
                                                    </div>
                                                    <div class="product-price" v-text="item.newPrice"></div>
                                                    <div class="product-old-price" v-text="item.oldPrice"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </template>
                                </div>
                                <div class="next jscroll-next-parent" style="display: none;"><a id="jscroll-next" class="jscroll-next" href="https://api.akillimagaza.com.tr/products">Sonraki</a></div>
                                <div class="result-wrapper" >@{{ error }}</div>
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

        $(document).on('change','#siralama',function (){
            $(".tabSpec").removeClass("active");
            $("input[type='radio'][name='order']").prop("checked",false);
        })
        // function myFunction() {
        //     var selectElement = document.getElementById("siralama");
        //     var selectedValue = selectElement.value;
        //
        //     // Seçilen değere göre yapılacak işlemler
        //     if (selectedValue === "1") {
        //
        //     } else if (selectedValue === "2") {
        //
        //         let fitered_url =  'https://api.akilliphone.com/products?sort=name&orderby=asc'+webService.createFilter();
        //         console.log(fitered_url);
        //         getFilteredProducts(fitered_url);
        //         console.log("Seçenek 2 seçildi.");
        //
        //     } else if (selectedValue === "3") {
        //
        //         let fitered_url =  'https://api.akilliphone.com/products?sort=name&orderby=desc'+webService.createFilter();
        //         console.log(fitered_url);
        //         getFilteredProducts(fitered_url);
        //
        //     }
        //     else if (selectedValue === "4") {
        //
        //         let fitered_url =  'https://api.akilliphone.com/products?sort=rated&orderby=desc'+webService.createFilter();
        //         console.log(fitered_url);
        //         getFilteredProducts(fitered_url);
        //
        //     }
        // }

        let fitered_url =  'https://api.akillimagaza.com.tr/products?' + webService.createFilter();
        webService.getFilteredProducts(fitered_url, false);

        var cdnUrl = 'https://cdn.akilliphone.com/';
        const { createApp } = Vue;
        var app = createApp({
            data() {
                return {
                    datas: {items:[],filterables:{brands:[]}},
                    error:"",
                    cdnUrl:cdnUrl,
                }
            },
            created: function(){

            }
        }).mount('#app-basic');

        $(document).on('change', '.forfilter', function(){
            let fitered_url =  'https://api.akillimagaza.com.tr/products?' + webService.createFilter();
            webService.getFilteredProducts(fitered_url, false);

        });
        /*
        Bu fonksiyonu webServiceJs dışına çıkarmayalım
        function getFilteredProducts(url, scrolling){

            console.log(url);
            var settings = {
                "url": url,
                'cache': false,
                "async": true,
                "crossDomain": true,
                "method": "GET",
                "headers": {
                    "Access-Control-Allow-Origin":"*",
                    "Authorization" :'Bearer <?php echo session()->get('token')?>',
        }
    };
    if(app.datas.hasOwnProperty('items')) {
        app.datas['items'] = [];
    }
    $.ajax(settings).done(function (response) {
        $(response.data.items).each(function (index){
            response.data.items[index]['newPrice']='*';
            response.data.items[index]['oldPrice']='';
            if(this.variants.length){
                if(this.variants[0]['price']){
                    response.data.items[index]['newPrice']=this.variants[0]['price'];
                    if(this.variants[0]['price']<this.variants[0]['oldPrice']){
                        response.data.items[index]['oldPrice']=this.variants[0]['oldPrice'];
                    }
                }
            }
        });

            app.cdnUrl=cdnUrl;
            console.log(app.datas.items);
            app.datas.items = response.data.items;
            $('#jscroll-next').attr('href', response.data.nextPageUrl)

        /*if(scrolling){
            app.datas=response.data;
        } else{
        }
    }).fail(function(xhr, status, error) {
        if (xhr.status === 404) {
            app.error="Aradığınız Kriterde Ürün Bulunamadı..!"
        } else if (xhr.status === 400) {
            app.error="Sunucu Hatası..! Lütfen Tekrar Deneyiniz."
        } else {
            app.error=error;
        }
        app.datas=[];
    });
}
*/
    </script>
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="{{ url('assets/js/jscroll.min.js') }}?_t={{ time() }}"></script>

    <script>
        const sideNav = document.getElementById("sidenav");
        const filterMenu = document.getElementById("burgermenu");
        const close = document.getElementById("close");
        filterMenu.addEventListener("click", function () {
            sideNav.classList.toggle("opened");
        });
        close.addEventListener("click", function () {
            sideNav.classList.toggle("opened");
        });
    </script>
    <script>
        const listbox = document.getElementById("listbox");
        const tab = document.getElementById("tab-btns")
        listbox.addEventListener("click", function () {
            tab.classList.toggle("block");
        });
    </script>
    <script>
        lazyload();
    </script>
    <!-- // Tab function javascript -->
    <script>
        var links = document.getElementsByClassName("tabSpec");
        for (var i = 0; i < links.length; i++) {
            links[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                if (current.length > 0) {
                    current[0].className = current[0].className.replace(" active", "");
                }
                this.className += " active";
            });
        }
    </script>
    <!-- Three category slider -->
    <script>
        $(document).ready(function () {
            $(".three-category").owlCarousel({
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        startPosition: 1,
                        stagePadding: 30,
                        margin: 16,
                    },
                    768: {
                        items: 1,
                        startPosition: 1,
                        stagePadding: 130,
                        margin: 30
                    },
                    1200: {
                        items: 3,
                        margin: 30,
                        drag: false,
                        mouseDrag: false,
                    }
                }
            });
        });
    </script>
    <!-- Three category slider -->
    <!-- Product Slider -->
    <script>
        $(document).ready(function () {
            $(".product-slider").owlCarousel({
                responsiveClass: true,
                dotsClass: 'owl-dots',
                responsive: {
                    0: {
                        items: 2,
                        margin: 8,
                        dots: true,
                    },
                    425: {
                        items: 2,
                        margin: 15,
                    },
                    500: {
                        items: 3,
                        margin: 20,
                    },
                    768: {
                        items: 4,
                        margin: 15,
                    },
                    1024: {
                        items: 5,
                        margin: 10,
                    },
                    1200: {
                        items: 6,
                        margin: 30,
                        dots: false,
                        drag: false,
                        mouseDrag: false,
                    }
                }
            });
        });
    </script>
    <script>
        base_url = window.location.href;
        $(document).ready(function(){
            $('#jscroll').jscroll({
                nextSelector: 'a.jscroll-next',
                debug: false,
                padding:500,
                callback: function (){
                    /*
                    console.log('loaded');
                    if(ajax_page>0) window.history.pushState(null, 'Title', updateURLParameter(base_url, 'page', (ajax_page*1)+1) );
                    if(base_url.includes('?')){
                    } else {
                        // window.history.pushState(null, 'Title',  base_url + '?page=' + ajax_page);
                    }
                    */
                }
            });
            $("img.lazy").lazyload();
        });

    </script>

    <script>
        function aramaYap() {
            var aranan = document.getElementById("aramaKutusu").value.toLowerCase();
            var liste = document.getElementById("markalar");
            var elemanlar = liste.getElementsByTagName("li");

            for (var i = 0; i < elemanlar.length; i++) {
                var eleman = elemanlar[i];
                var elemanMetni = eleman.innerText.toLowerCase();

                if (elemanMetni.indexOf(aranan) > -1) {
                    eleman.style.display = "";
                } else {
                    eleman.style.display = "none";
                }
            }
        }
    </script>
    <script>
        const radios = document.querySelectorAll('.option-input[type="radio"]');
        const minInput = document.querySelector('.search-inputs input:first-child');
        const maxInput = document.querySelector('.search-inputs input:last-child');
        radios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                const selectedValue = radio.value;
                const range = selectedValue.split('-');
                const selectedMin = range[0];
                const selectedMax = range[1];
                minInput.value = selectedMin;
                maxInput.value = selectedMax;
            });
        });

    </script>
    <!-- Product Slider -->
@endsection
