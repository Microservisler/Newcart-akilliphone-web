@extends('layouts.default')
@section('head')
    <title>İşlem Rehberi - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/aboutUs.css?_t=1.01') }}">
    <style>
        .welcome-about {
            margin: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="welcome-about">
        <h1 class="main-title">İşlem Rehberi</h1>
     <br>
        <div class="aboutus-content">

            Teknik Adımlar:
            <br>
            <ul>
                <li>
                    Mal ve Hizmetin Seçilmesi: İlgilendiğiniz ürün veya hizmeti seçin ve sepete ekleyin.
                </li>
                <li>Teslimat Bilgilerinin Girilmesi: Teslimat adresinizi ve iletişim bilgilerinizi girin.
                </li>
                <li> Ödeme Bilgilerinin Girilmesi: Ödeme yönteminizi seçin ve gerekli bilgileri girin.

                </li>
                <li>  Siparişin Onaylanması: Sipariş özetini kontrol edin ve onaylayın.

                </li>

            </ul><br>


            <h2 style="font-weight: bold;font-size: 20px;padding: 20px">Sözleşme Erişimi ve Saklama
            </h2>
            Elektronik ticarete ilişkin sözleşme, elektronik ortamda saklanır. Alıcı, sözleşmeye aynı ortamda 30 gün süreyle erişebilir.

            <h2 style="font-weight: bold;font-size: 20px;padding: 20px">Veri Girişi ve Düzeltme
            </h2>
            Alıcılar, sipariş vermeden önce veri girişindeki hataları "Özet Sipariş Formu" aracılığıyla açık ve anlaşılır bir şekilde belirleyebilir ve "Geri Al ve Değiştir" gibi teknik araçlar kullanarak düzeltebilirler.


            <h2 style="font-weight: bold;font-size: 20px;padding: 20px">Gizlilik Kuralları</h2>

            Elektronik ticaret işlemleri nedeniyle elde ettiğimiz kişisel verilere ilişkin gizlilik kuralları, web sitemizin Gizlilik Politikası bölümünde detaylı olarak açıklanmıştır.
            <br>


            <h2 style="font-weight: bold;font-size: 20px;padding: 20px">Alternatif Uyuşmazlık Çözüm Mekanizmaları
            </h2>
            Alıcıyla arasında uyuşmazlık çıkması halinde, mesafeli satış sözleşmesinin, “Uyuşmazlıkların Çözümü” bölümünde belirtilen mekanizmalar kullanılabilir.
            <br>


        </div>
    </div>

@endsection
