@extends('layouts.payment')
@section('head')
    <title>Ödeme Sayfası - AkıllıPhone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/shopping/shopping-section2.css') }}?_v=<?=env('ASSETS_VER')?>">
    <style>
        .district-option{
            display: none;
        }

    </style>
@endsection
@section('content')
    <x-payment.steps :step="2"/>
    <div class="signup-title">
        <h1>Bu Adresi Kullan</h1>
        @if(isUserLogged())
            <div class="radio-group p-1">
                <label class="custom-radio">Yeni Adres
                    <input class="address-manualy" required id="test" type="radio" name="shippingAddress[addressId]" checked="" value="">
                    <span></span>
                </label>
                @foreach(userInfo('addresses') as $address)
                    <label class="custom-radio">{{ $address['title'] }}
                        <input class="address-registered" required type="radio" name="shippingAddress[addressId]" value="{{$address['addressId']}}">
                        <span></span>
                    </label>
                @endforeach
            </div>
        @endif
        Teslimat adresiniz için lütfen aşağıdaki formu doldurun.

    </div>

    <form action="{{ route('payment.step.post', 3) }}" class="shopping-wrapper" method="post" >
        <div class="form-wrapper" style="padding-bottom: 10px">
            <div class="signup-input hide-address-registered">
                <input required id="customer-firstName" name="customer[firstName]" type="text" placeholder="Ad" value="{{ $basket->customer['firstName'] }}">
            </div>
            <div class="signup-input hide-address-registered">
                <input required id="customer-lastName" name="customer[lastName]" type="text" placeholder="Soyad" value="{{ $basket->customer['lastName'] }}">
            </div>
            <div class="signup-input hide-address-registered">
                <div class="signup-select">
                    <select required id="shippingAddress-countryId" class="select-with-name" data-nametarget=".select-country" name="shippingAddress[countryId]">
                        @if($countries['data'])
                            <?php
                                $selectedCountry = $basket->shippingAddress['countryId']?$basket->shippingAddress['countryId']:2;
                                ?>
                            @foreach($countries['data'] as $country)
                                <option value="{{ $country['countryId'] }}" @if($selectedCountry==$country['countryId']) selected @endif>{{ $country['name'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="signup-input hide-address-registered">
                <div class="signup-select">
                    <select id="shippingAddress-cityId" class="select-with-name" data-nametarget=".select-city" name="shippingAddress[cityId]">
                        <option value=""> -- </option>
                        @if($cities['data'])
                            @foreach($cities['data'] as $city)
                                @if($city['countryId']==2)
                                    <option value="{{ $city['cityId'] }}" @if($basket->shippingAddress['cityId']==$city['cityId']) selected @endif>{{ $city['name'] }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="signup-input hide-address-registered">
                <div class="signup-select">
                    <select id="shippingAddress-districtId" class="select-with-name" data-nametarget=".select-district" name="shippingAddress[districtId]">
                        <option value=""> -- </option>
                        @if($cities['data'])
                            @foreach($cities['data'] as $city)
                                @foreach($city['districts'] as $district)
                                    <option class="district-option city-{{ $city['cityId'] }}" value="{{ $district['districtId'] }}" @if($basket->shippingAddress['districtId']==$district['districtId']) selected @endif>{{ $district['name'] }}</option>
                                @endforeach
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="signup-input hide-address-registered">
                <span class="label">Adres Adı</span>
                <input id="shippingAddress-name" name="shippingAddress[name]" type="text" value="{{$basket->shippingAddress['name']}}">
            </div>
            <div class="signup-input textarea hide-address-registered">
                <span class="label">Açık Adres</span>
                <textarea id="shippingAddress-address" name="shippingAddress[addressLine1]" id="" cols="30" rows="2" placeholder="Mahalle, sokak, cadde ve diğer bilgilerinizi giriniz">{{$basket->shippingAddress['addressLine1']}}</textarea>
            </div>

            <div class="signup-input">
                <span class="label">Telefon</span>
                <input name="customer[phone]" type="text" id="mobile_code" class="form-control" value="{{$basket->customer['phone']}}">
            </div>
            <div class="signup-input hide-address-registered">
                <input name="customer[email]" type="text" placeholder="Eposta Adresi" style="height: 83%;" value="{{$basket->customer['email']}}">
            </div>
            <div class="signup-bill signup-bill-type" style="width: 100%">
                <span>Fatura Tipi:</span>
                <label for="indiv">
                    <input class="option-input checkbox" name="invoiceType" type="radio" id="indiv" @if($basket->billingAddress['invoiceType']=='bireysel') checked @endif  required value="bireysel">
                    Bireysel
                </label>
                <label for="company">
                    <input class="option-input checkbox"  name="invoiceType" type="radio" id="company" @if($basket->billingAddress['invoiceType']=='kurumsal') checked @endif required value="kurumsal">
                    Kurumsal
                </label>
            </div>
            <div class="signup-bill">
                <label for="bill">
                    <input class="option-input checkbox" type="checkbox" checked id="bill" required>
                    Fatura ve teslimat  adresim aynı.
                </label>
            </div>
            <div class="signup-title shipping">
                <h1>Kargo Seçenekleri</h1>
            </div>
            <div class="radio-group">
                @foreach($basket->shippingBrands as $shippingBrand)
                    <label class="custom-radio">
                        <img src="{{ $shippingBrand['icon'] }}" alt="">
                        <input required type="radio" {{ $shippingBrand['checked'] }} name="shippingBrand" value="{{  $shippingBrand['code'] }}">
                        <span></span>
                    </label>
                @endforeach
            </div>

        </div>
        <?php $buttonText="Devam Et";?>
        <x-payment.cart-wrapper :basket="$basket" :buttonText="'Devam Et'"/>
        <input type="hidden" class="select-country" name="shippingAddress[country]" value="{{$basket->shippingAddress['country']?$basket->shippingAddress['country']:'Türkiye'}}">
        <input type="hidden" class="select-city" name="shippingAddress[city]" value="{{$basket->shippingAddress['city']}}">
        <input type="hidden" class="select-district" name="shippingAddress[district]" value="{{$basket->shippingAddress['district']}}">
    </form>

@endsection
@section('js')
    <script src="{{ url('assets/js/signup-select.js.') }}?_v={{ env('ASSETS_VER') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
    <script>
        $("#mobile_code").intlTelInput({
            initialCountry: "tr",
            separateDialCode: true,
        });
        $('.address-registered').on('click', function(){
            let addresses = [];
            @if(userInfo('addresses'))
    addresses = {!! json_encode(userInfo('addresses'), JSON_UNESCAPED_UNICODE) !!} ;
            @endif
            $(addresses).each(function(){
                console.log(this);
                if($('.address-registered:checked').val() == this.addressId){
                    $("#customer-firstName").val(this.name)
                    $("#customer-lastName").val(this.surname)
                    $("#shippingAddress-name").val(this.title)
                    $("#shippingAddress-address").val(this.address1)
                    $("#shippingAddress-countryId").val(this.countryId)
                    $("#shippingAddress-cityId").val(this.cityId)
                    $("#shippingAddress-districtId").val(this.districtId)

                    $("#shippingAddress-countryId + .select-selected").text($("#shippingAddress-countryId option:selected").text())
                    $("#shippingAddress-cityId + .select-selected").text($("#shippingAddress-cityId option:selected").text())
                    $("#shippingAddress-districtId + .select-selected").text($("#shippingAddress-districtId option:selected").text())

                }
            });
});
        $('.address-manualy').on('click', function(){
            $("#customer-firstName").val('')
            $("#customer-lastName").val('')
            $("#shippingAddress-name").val('')
            $("#shippingAddress-address").val('')
            $("#shippingAddress-countryId").val('')
            $("#shippingAddress-cityId").val('')
            $("#shippingAddress-districtId").val('')

            $("#shippingAddress-countryId + .select-selected").text('')
            $("#shippingAddress-cityId + .select-selected").text('')
            $("#shippingAddress-districtId + .select-selected").text('')
        });
        $('.address-manualy').on('click', function(){
            $('.hide-address-registered').fadeIn();
        });
        $('#shippingAddress-cityId').on('change', function(){
            $('#shippingAddress-districtId').val('');
            $('.district-option').hide();
            $('.district-option.city-' + $(this).val()).show();
        });
        $('#shippingAddress-cityId').change();
        $('#shippingAddress-districtId').val('{{ $basket->shippingAddress['districtId'] }}');

        $('.select-with-name').on('change', function(){
            $($(this).data('nametarget')).val( $(this).find('option:checked').text() );
        });

    </script>
@endsection
