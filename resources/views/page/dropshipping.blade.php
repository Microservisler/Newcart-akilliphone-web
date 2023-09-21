@extends('layouts.default')
@section('head')
    <title>Dropshipping - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/dropshipping.css') }}">
    <style>
        .dropshipping, .welcome-dropshipping {
            margin: 0px;
        }
    </style>
@endsection
@section('content')
    <section class="dropshipping" >
        <div class="welcome-dropshipping" style="background-image: url('/assets/images/dropshipping-bg.png');">
            <div class="welcome-content">
                <h1 class="main-title">Dropshipping</h1>
                <div class="breadcrumb">
                    <ul>
                        <li><a class="link" href="/">Anasayfa</a></li>
                        <li><a class="link" href="#">Dropshipping</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="join-us">
            <a href=""><img class="img-fluid" src="{{ url('assets/images/bayimiz.svg') }}" alt="Güvenli Alışveriş"></a>
            <a href=""><img class="img-fluid" src="{{ url('assets/images/alisveris.svg') }}" alt="Bayimiz Olun"></a>
        </div>
        <div class="body-dropshipping">
            <div class="container">
                <p>Türkçede stoksuz satış olarak da ifade edilen dropshipping , stok tutmak yerine, gelen siparişleri akilliphone.com ‘a yönlendirerek, ürünleri akilliphone.com ‘un
                    deposundan müşteriye ulaşması üzerine kurulu bir iş modelidir.
                </p>
                <h2>Dropshipping</h2>
                <p>Türkçede stoksuz satış olarak da ifade edilen dropshipping , stok tutmak yerine, gelen siparişleri akilliphone.com ‘a yönlendirerek, ürünleri akilliphone.com ’un deposundan müşteriye ulaşması üzerine kurulu bir iş modelidir. Düşük sermaye ve işletme giderleri gibi avantajları olduğu için özellikle e-ticarete yeni başlayan girişimciler tarafından tercih edilir. Kullanım şekli olarak, stok tutmayan yeni e-ticaret işletmeleri tedarikçileri aracılığı ile bu ürünleri e-ticaret sitelerinde sergiler ve son kullanıcıların satın almalarına olanak sağlarlar. Böylece depo’da stok tutulmayan ürünlerde satışa sunulmuş olur ve gönderimi akilliphone.com ’un deposu üzerinden sağlanır. akilliphone.com kurulduğu ilk günlerde bayilerimizden gelen yoğun talep üzerine bayilerine destek olabilmek için dropshipping hizmetine başlamıştır. Dropshipping sistemini sektörde ilk yapan firmayız.
                </p>
                <p><img src="{{ url('assets/images/sheme.svg') }}" alt="kargo şeması"></p>
                <p style="font-size:30px;line-height: 41px;" >Yılların tecrübesi ve sisteme yapılan <br>
                    yatırımlar sayesinde sizlere kaliteli hizmet ve <br>
                    <span style="color:var(--brand-color);font-weight:600;" >%100 müşteri memnuniyeti sunmaktayız.</span>
                </p>
                <strong>Dropshipping İş Modeli ve Dikkat Edilecekler :</strong>
                <p>Dropshipping hizmetinden en basit yöntemle faydalanmanızı sağlıyoruz.
                    Bayilerimize dropshipping hizmetini profesyonel olarak sunmaktayız.</p>
                <strong>Profesyonel bir ekip :</strong>
                <p>Ürünlerin kargoda kırılmaması için koli/balonlu torba/havalı ambalaj yastığı/balonlu naylon gibi ambalaj malzemeleri
                    Müşterilerinize ürünlerin sağlam, hasarsız ve şık bir ambalaj içerisinde ulaştırılması için paketlemeye gereken hassasiyet gösterilmektedir.
                    Bayimiz Dropshipping hizmetini ÜCRETSİZ OLARAK Kullanabilmektedir.
                    İsterseniz Sitenize Özel Koli , Paket, Poşet, Etiket, Sticker, Hediye Çeki vb. Kullanılmasını İstiyorsanız Firmamızla İletişime Geçiniz.</p>
                <strong>Fatura ve Teslimat Adresi :</strong>
                <p>Bayilerimizin en çok dikkat edecekleri nokta Fatura Bilgisi ve Teslimat Adresi olacaktır.
                    akilliphone.com faturayı bayi ünvanına keserek düzenlemektedir.
                    Son Müşteri adına fatura kesilmez ve müşteriye akilliphone.com faturası gönderilmez.
                    Bayi müşterisine kesmiş olduğu faturayı müşterisine email/posta/kargo ile göndermekle yükümlüdür. (Tarafımıza mail olarak gönderilen fatura siparişe eklenmektedir.)
                    akilliphone.com sizin adınıza sevk belgesi düzenleyerek paketle birlikte müşterinize gönderecektir. ( Sevk Belgesi üzerinde ürün tutarı yazmamaktadır.)
                    Adres bilgisi alanına müşterinize ait tüm bilgileri doğru bir şekilde girmeniz gerekecektir.
                    Kargo firmasında sorun yaşanmaması ve kargonun düzgün bir şekilde hızlıca müşterinize ulaşması için lütfen tüm bilgileri doğru girdiğinizden emin olunuz.
                </p>
                <strong>Kargolama :</strong>
                <p>Kargolar akilliphone.com’ un ARAS Kargo anlaşması ile gönderilecektir.
                    Tüm ürünler stoklarımızda mevcut olup, siparişleriniz aynı gün kargoya verilir.
                    Saat 17.00 ‘dan Sonra Verilen Siparişler Bir Sonraki Güne Sarkabilmektedir.
                    Kargo takip numarasını “Sipariş Takibi’nden yapabilirsiniz.
                    Bayi tarafından teslimat adresinin yanlış verilmesi, müşterinin adreste bulunmaması gibi durumlarda kargoda oluşan tüm masraflar Bayi tarafından karşılanacaktır.
                    Müşterinin sebep belirtmeden ürünü geri iade etmesi durumunda kargo ve ürün bedeli Bayi tarafından karşılanır.
                    Ürün kargolanması esnasında ürünün eksik gönderilmesi, fazla gönderilmesi, yanlış gönderilmesi, kırık, bozuk veya parçalanmış gönderilmesi durumunda
                    bunun görüntü alarak ve tutanak tutturarak tespit edilmesi halinde kargo ve ürün masrafları akilliphone.com’ a aittir.
                </p>
                <strong>Kargolama Ücretleri :</strong>
                <p>Kendi kargo anlaşmanız ile gönderim sağlanacaktır, sadece paketleme başına 2₺ ücret talep edilecektir.</p>
                <strong>Müşteri Hizmetleri / Destek</strong>
                <p>Mesai saatleri içersinde Destek sistemini kullanarak siparişe ait sorular sorabilir ve operasyon süreci hakkında bilgi alabilirsiniz.</p>
            </div>
        </div>
    </section>

@endsection
@section('js')

@endsection
