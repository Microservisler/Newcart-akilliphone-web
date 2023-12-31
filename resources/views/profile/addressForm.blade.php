@extends('layouts.default')
@section('head')
    <title>Adres Bilgilerim - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/address/main.css') }}">

@endsection
@section('content')

    <section class="profile section-padding mx-24" style="margin-top: 150px">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <div class="left">
                    <div class="user-info">
                        <div class="shortened"><?php echo session('userNameIcon'); ?></div>
                        <div class="fullname"><?php echo session('userName'); ?></div>
                    </div>
                    <div>
                        <a href="orders" class="left-section ">
                            <div class="left-section-title">
                                <img src="../assets/images/icons/order.svg" alt="">
                                Siparişlerim
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
                            </svg>
                        </a>
{{--                        <a href="coupons" class="left-section" >--}}
{{--                            <div class="left-section-title">--}}
{{--                                <img src="../assets/images/icons/coupon.svg" alt="">--}}
{{--                                Kuponlarım--}}
{{--                            </div>--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">--}}
{{--                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
                        <a href="favorites" class="left-section">
                            <div class="left-section-title">
                                <img src="../assets/images/icons/favorite.svg" alt="">
                                Favorilerim / Listelerim
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
                            </svg>
                        </a>
                        <a href="comments" class="left-section ">
                            <div class="left-section-title">
                                <img src="../assets/images/icons/comment.svg" alt="">
                                Yorumlarım
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
                            </svg>
                        </a>
                        <a href="informations" class="left-section">
                            <div class="left-section-title">
                                <img src="../assets/images/icons/info.svg" alt="">
                                Üyelik Bilgilerim
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
                            </svg>
                        </a>
                        <a href="address" class="left-section" active>
                            <div class="left-section-title">
                                <img src="../assets/images/icons/address.svg" alt="">
                                Adres Bilgilerim
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
                            </svg>
                        </a>
{{--                        <a href="payment"  class="left-section">--}}
{{--                            <div class="left-section-title">--}}
{{--                                <img src="../assets/images/icons/card.svg" alt="">--}}
{{--                                Harici Ödeme--}}
{{--                            </div>--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847"--}}
{{--                                 viewBox="0 0 5.214 8.847">--}}
{{--                                <path id="Path_12527" data-name="Path 12527"--}}
{{--                                      d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z"--}}
{{--                                      transform="translate(11.054 10.947) rotate(180)" opacity="0.492" />--}}
{{--                            </svg>--}}
{{--                        </a>--}}
                    </div>
                </div>
            <div class="right">
                <div class="profile-infos">
                    <div class="top">
                        <div class="title">Yeni adres ekle</div>
                    </div>
                    <form action="{{route('profile.addressform')}}" method="post">
                        @csrf
                        <div class="form-wrapper">
                            <div class="signup-input">
                                <span class="label">Adres Başlık</span>
                                <input type="text" name="address[title]">
                            </div>

                            <div class="signup-input">
                            <select id="shippingAddress-cityId" required class="select-with-name" data-nametarget=".select-city" name="address[countryId]" style="width: 100%;
    height: 100%;
    font-size: 14px;
    color: var(--text-color);
    border: 1px solid #eee;
    border-radius: 4px;
    padding: 10px;">
                                <option value=""> -- </option>
                                @if($cities['data'])
                                    @foreach($cities['data'] as $city)
                                        @if($city['countryId']==2)
                                            <option value="{{ $city['cityId'] }}">{{ $city['name'] }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            </div>
                            <div class="signup-input">
                            <select id="shippingAddress-districtId" required class="select-with-name" data-nametarget=".select-district" name="address[cityId]"style="width: 100%;
    height: 100%;
    font-size: 14px;
    color: var(--text-color);
    border: 1px solid #eee;
    border-radius: 4px;
    padding: 10px;">
                                <option value=""> -- </option>
                                @if($cities['data'])
                                    @foreach($cities['data'] as $city)
                                        @foreach($city['districts'] as $district)
                                            <option class="district-option city-{{ $city['cityId'] }}" value="{{ $district['districtId'] }}" style="display: none">{{ $district['name'] }}</option>
                                        @endforeach
                                    @endforeach
                                @endif
                            </select>
                            </div>

                            <div class="signup-input">
                                <span class="label">Adresiniz</span>
                                <input type="text" name="address[address]">
                            </div>
                            <div class="signup-input">
                                <span class="label">İsim</span>
                                <input type="text" name="address[name]">
                            </div>
                            <div class="signup-input">
                                <span class="label">Soyisim</span>
                                <input type="text"  name="address[surname]">
                            </div>
                            <div class="signup-input">
                                <span class="label">Telefon </span>
                                <input type="text" name="address[phone]">
                            </div>


{{--                            <div class="signup-input">--}}
{{--                                <div class="signup-select">--}}
{{--                                    <span class="label">Şehir<span>&nbsp;*</span></span>--}}
{{--                                    <select>--}}
{{--                                        <option value="0"></option>--}}
{{--                                        <option value="1">Şehir 1</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="signup-input">--}}
{{--                                <div class="signup-select">--}}
{{--                                    <span class="label">İlçe<span>&nbsp;*</span></span>--}}
{{--                                    <select>--}}
{{--                                        <option value="0"></option>--}}
{{--                                        <option value="1">İlçe 1</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="signup-buttons">
                                <button type="submit" class="submit-btn">Kaydet</button>
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
    <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="./assets/js/signup-select.js"></script>
    <script src="./assets/js/flatpickr.min.js"></script>
    <script src="./assets/js/mask.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/tr.js"></script>

    <script>
        document.getElementById('shippingAddress-cityId').addEventListener('change', function() {
            // Seçilen değeri al
            var selectedValue = this.value;

            // Tüm seçenekleri gizle
            var options = document.getElementById('shippingAddress-districtId').getElementsByTagName('option');
            for (var i = 0; i < options.length; i++) {
                options[i].style.display = 'none';
            }

            // İlgili seçenek grubunu göster
            var selectedOptions = document.querySelectorAll('.district-option.city-' + selectedValue);
            if (selectedOptions.length > 0) {
                for (var j = 0; j < selectedOptions.length; j++) {
                    selectedOptions[j].style.display = 'block';
                }
            }
        });
    </script>

@endsection
