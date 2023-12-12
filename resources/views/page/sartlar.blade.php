@extends('layouts.default')
@section('head')
    <title>Hakkımızda - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/aboutUs.css?_t=1.01') }}">
    <style>
        .welcome-about {
            margin: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="welcome-about" style="padding-top: 200px">
        <h1 class="main-title">Garanti ve İade Şartları</h1>
     <br>
        <div class="aboutus-content">
           <p>Akilliphone.com firması, müşterilerinin duyduğu güven çerçevesinde, kaliteli hizmet anlayışıyla çalışan bir firmadır. Bu kapsamda müşterilerinin istek ve taleplerine kayıtsız kalmadan hareket etmeyi, müşteri memnuniyetinin dolayısıyla da firma vizyonunun bir parçası olarak kabul etmektedir. Bu gerekçelerle müşterilerin satın aldıkları bir ürünü firma bünyesine iade etme haklarını saklı tutmaktadır. Akilliphone.com firması, müşterilerin nedenlerini de belirterek satın aldıkları ürünleri, kullanmadan, herhangi bir zarar vermeden ve ürünün yeniden satılabilirliğini bozmadan 14  gün içerisinde iade edebilmesi imkanını sunmaktadır. Müşterilerine gerekli ilgi ve alakayı gösterme konusunda titizlikle hareket etmekte olan firma, belirttiği ifadelerin dışında olan, ambalajı açılmış, tahrip edilmiş ürünlerin iadesini kabul etmemektedir.
           </p>
            <br>
            <p>
            Orijinal ambalaja sahip bir ürün iade edilmek isteniyorsa, bu ürün akilliphone.com firmasına orijinal ambalajı açılmamış bir şekilde iade edilmelidir. Iade edilmek istenen ürün, imkan varsa akilliphone.com firması adına düzenlenecek olan bir iade faturası, eğer iade faturası oluşturma imkanı yoksa da ürüne ait fatura ve sevk irsaliyesinin aslı ile birlikte iade edilmelidir. Fatura ve sevk irsaliyesi belgelerinin asıllarının yokluğunda, iade edilen ürünün KDV gibi mali yükümlülükleri ürünün iade edilecek bedelinden düşürülecektir. Ürünler müşterilere teslim edildikleri haliyle iade edilmelidir. Ürün ve ambalajı üzerinde fark edilecek bir karalama, yırtılma, kırılma, tahrip etme, kullanılma, bozulma, açılma gibi olumsuz durumda, ürünün iadesi kabul edilmemekte, ürün bedelinin iadesi gerçekleştirilmemektedir.
            </p>
            <br>

        </div>
    </div>
    <div class="body-about">
        <div class="container">
            <div class="c_row" >
                <div class="about-img">
                    <img width="500" height="450" src="{{ url('assets/images/bayimiz-olun.svg') }}">
                </div>
                <div class="about-content ">
                 <p style="line-height: normal;">   Bahsi geçen iade şartlarını sağlayan ürün iadelerinde, ürünün iadesinin kargo bedeli müşteriye ait olmaktadır. Iade işlemi sırasında gönderimler, akilliphone.com firmasının anlaşmalı olduğu kargo şirketi olan ARAS Kargo ile gerçekleşmelidir. Diğer kargo şirketleri kullanılarak gerçekleştirilen iade işlemleri kabul edilmeyecektir. Akilliphone.com kaliteli hizmet anlayışıyla çevrelenmiş çalışmaları kapsamında, hem müşterilerinin hem de kendi çalışmalarının zarar görmesini önlemek adına bu tarz şartlar çerçevesinde çalışma ihtiyacı duymaktadır. Müşterilerinin beklentilerini karşılamayan bir ürünün iade edilmesinin doğal olduğunu kabul ettiği gibi, müşterilerinin de akilliphone.com firmasının sunduğu hizmet anlayışına saygı duyarak, iade edecekleri ürüne zarar vermemeleri talebiyle hareket etmektedir. Hoşgörü ve anlayışla dolu bir hizmet ile müşteri memnuniyeti öncelikli hedefler arasına yerleştirilmektedir.
                 </p>
                </div>
            </div>
        </div>
    </div>
@endsection
