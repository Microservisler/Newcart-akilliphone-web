@extends('layouts.default')
@section('head')

@endsection
@section('content')
<div class="welcome-about">
    <h1 class="main-title">Hakkımızda</h1>
    <div class="breadcrumb">
        <ul>
            <li><a class="link" href="#">Anasayfa</a></li>
            <li><a class="link" href="#">Hakkımızda</a></li>
        </ul>
    </div>
    <div class="aboutus-content">
        Akilliphone.com sitesi, müşterine hizmet etmenin mutluluğu ile çalışmalarından ödün vermeksizin, her daim daha iyi hizmet ve kaliteyi sunmayı hedeflemekte olan bir firmadır. Cep telefonu aksesuarlarından ev yaşam ürünlerine kadar binlerce ürünlük geniş skalasıyla 10 yılı aşkın süredir müşterilerinin ihtiyaçlarına cevap vermekten memnuniyet duymaktadır. Akla gelebilecek her türlü aksesuar ve elektronik ürünleri stoklarında barındırarak, müşterilerine hızlı, güvenilir ve kaliteli bir hizmet sunabilmek firmanın öncelikli amaçlarındandır. Türkiye'de aksesuar ve elektronik marketi olarak giderek büyüyen bir yapıya sahiptir. akilliphone.com 20000'den fazla ürün çeşidiyle, müşterilerine dönemin son moda trendlerine uygun tüm ürünlerini kaliteli ürün ve hizmet anlayışıyla donatılmış bir misyon içerisinde hazırlayıp sunmaktadır. Akilliphone.com site bünyesinde sunduğu ürünlerin % 90'a varan geniş bir aralığını stoklarında bulundurmakta, bu sayede firma müşterilerine en hızlı ve en güvenilir hizmeti sunabilmenin haklı gururunu yaşamaktadır.
    </div>
</div>
<div class="body-about">
    <div class="container">
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/bayimiz-olun.svg') }}">
            </div>
            <div class="about-content ">
                <div class="title">Bayimiz<span>&nbsp;Olun</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
                <div class="btn" ><a href="#">Bayilik Başvurusu</a></div>
            </div>
        </div>
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/kapsamli.svg') }}" alt>
            </div>
            <div class="about-content ">
                <div class="title">Kapsamlı Ürün<span>&nbsp;Hatları</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
            </div>
        </div>
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/kalite.svg') }}" alt>
            </div>
            <div class="about-content ">
                <div class="title">En İyi<span>&nbsp;Kalite</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
            </div>
        </div>
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/fiyat.svg') }}" alt>
            </div>
            <div class="about-content ">
                <div class="title">En Düşük<span>&nbsp;Fiyat</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
            </div>
        </div>
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/musteri.svg') }}" alt>
            </div>
            <div class="about-content ">
                <div class="title">Müşteri<span>&nbsp;Hizmetleri</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
            </div>
        </div>
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/teslimat.svg') }}" alt>
            </div>
            <div class="about-content ">
                <div class="title">Hızlı ve Güvenli<span>&nbsp;Teslimat</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
            </div>
        </div>
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/alisveris.svg') }}" alt>
            </div>
            <div class="about-content ">
                <div class="title">Güvenli<span>&nbsp;Alışveriş</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
            </div>
        </div>
        <div class="c_row" >
            <div class="about-img">
                <img width="500" height="450" src="{{ url('assets/images/kultur.svg') }}" alt>
            </div>
            <div class="about-content ">
                <div class="title">Akilliphone.com<span>&nbsp;Kültür</span></div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo non felis ut feugiat. Sed nec nisi sit amet augue tempor malesuada eget non orci. Maecenas at neque vestibulum, varius nunc non, luctus augue. Duis </div>
            </div>
        </div>
    </div>
</div>
@endsection
