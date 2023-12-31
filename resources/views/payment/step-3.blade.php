@extends('layouts.payment')
@section('head')
    <title>Ödeme Sayfası - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/shopping-section3.css') }}">
    <style>
        .pay-transfer{
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <section class="shopping_section">
        <div class="container">
            <x-payment.steps :step="3"/>
            <div class="signup-title">
                <h1>Ödeme Yöntemi Seçiniz</h1>
            </div>
            @if(empty($iyzico_form))
            <div class="tab">
                <button class="tabSpec" onclick="openSpec(event, 'newCard')">Kayıtlı Kartlarım</button>
                <button class="tabSpec active" onclick="openSpec(event, 'creditCard')">Yeni Kart</button>
            </div>
            @endif
            @if(!$iyzico_form)
            <form action="{{ route('payment.step.post', 4) }}" method="post">
            @endif
                <div class="shopping-wrapper">
                    <div class="form-wrapper">
                        @if($iyzico_form)
                            <style>
                                .css-4276uk-Popup-Box-Box {
                                    max-width: 100%!important;
                                }
                            </style>
                            <div id="iyzipay-checkout-form" class="responsive"></div>
                            {!! $iyzico_form !!}
                        @else
                            <div id="newCard" class="tabDetails" style="display: none;">
                                <div class="saved-card-list">
                                    <div class="custom_radio">
                                        <input type="radio" name="card" id="card1" checked="">
                                        <label class="title" selected="" for="card1">
                                            <div class="saved-card">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                     viewBox="0 0 512 512">
                                                    <path fill="#C2CCCE"
                                                          d="M505.999 104.494a23.067 23.067 0 0 0-19.614-19.615l-.329-.329H22.572l-.327.329A23.067 23.067 0 0 0 2.63 104.494l-.328.327v298.987l.328.329a23.067 23.067 0 0 0 19.615 19.615l.327.327h463.483l.329-.329a23.062 23.062 0 0 0 19.614-19.614l.329-.329V104.821l-.328-.327z"></path>
                                                    <path fill="#597B91" d="M2.302 149.609h504.024V236H2.302z"></path>
                                                    <path fill="#FFF"
                                                          d="M442.478 294.697H69.522c-23.116 0-41.855 18.739-41.855 41.854c0 23.116 18.739 41.855 41.855 41.855h372.957c23.116 0 41.855-18.739 41.855-41.855c-.001-23.115-18.74-41.854-41.856-41.854z"></path>
                                                    <path fill="#597B91"
                                                          d="M348.576 371.698c-1.13 0-2.238-.024-3.326-.072c-13.51-.604-22.237-4.798-27.875-9.934c-19.207 9.371-42.187 13.168-51.84 4.363c-3.646-3.324-8.474-10.958.139-24.728c6.98-11.159 8.596-20.652 4.021-23.623c-5.534-3.594-19.407-.151-28.546 13.417c-7.215 10.713-20.291 21.218-34.977 28.101c-7.572 3.549-26.516 11.043-38.877 4.004c-6.398-3.643-15.306-13.61-3.072-39.438c1.489-3.144 1.483-4.788 1.364-5.117c-2.353-2.743-22.062-1.928-42.894 9.78c-13.271 7.458-20.56 16.171-18.57 22.195a7.501 7.501 0 0 1-14.244 4.705c-4.067-12.314 2.827-25.195 19.411-36.271c18.365-12.266 52.469-23.503 66.095-11.737c3.506 3.026 8.478 10.021 2.394 22.866c-4.848 10.233-6.078 18.263-3.062 19.979c8.7 4.959 40.956-8.093 53.991-27.447c6.122-9.09 14.594-15.913 23.857-19.215c9.37-3.34 18.591-2.759 25.3 1.596c9.678 6.284 14.898 21.184.527 44.159c-2.144 3.428-2.468 5.253-2.509 5.876c3.303 2.229 18.115.825 33.107-6.037c-2.906-8.005-2.909-17.684.06-27.01c3.132-9.841 8.966-17.644 15.605-20.872c10.473-5.092 18.629 1.841 22.433 9.324c7.173 14.11 1.809 29.42-14.717 42.004c-.323.247-.65.492-.981.735c20.276 10.854 64.889-6.649 84.099-15.161a7.5 7.5 0 0 1 6.077 13.715c-29.741 13.177-54.27 19.843-72.99 19.843zm-16.932-57.141c-1.332.248-5.402 3.743-8.013 11.238c-1.632 4.685-2.439 10.385-1.314 15.562c.363-.267.723-.536 1.081-.811c7.26-5.556 14.942-14.089 10.318-23.186c-1.031-2.028-1.84-2.655-2.072-2.803z"></path>
                                                </svg>
                                                <div class="card-info">
                                                    <div class="owner">Emre Karataş</div>
                                                    <div class="card-number">4234 56<span>••</span>&nbsp;<span>••••</span>&nbsp;9876
                                                    </div>
                                                </div>
                                                <div class="card-logo">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                         viewBox="0 0 32 32">
                                                        <path fill="#C2CCCE"
                                                              d="M26.117 14.628s.422 2.067.517 2.5h-1.855l.889-2.417c-.011.017.183-.506.294-.828zM32 6.222v19.556a2.668 2.668 0 0 1-2.667 2.667H2.666a2.668 2.668 0 0 1-2.667-2.667V6.222a2.668 2.668 0 0 1 2.667-2.667h26.667A2.668 2.668 0 0 1 32 6.222zM8.472 20.178l3.511-8.622H9.622l-2.183 5.889l-.239-1.194l-.778-3.967c-.128-.55-.522-.706-1.011-.728H1.817l-.039.172a8.783 8.783 0 0 1 2.344.95l1.989 7.5zm5.245.011l1.4-8.633h-2.233l-1.394 8.633zm7.772-2.822c.011-.983-.589-1.733-1.872-2.35c-.783-.395-1.261-.661-1.261-1.067c.011-.367.406-.745 1.283-.745a3.825 3.825 0 0 1 1.661.328l.2.094l.306-1.867a5.553 5.553 0 0 0-2-.367c-2.206 0-3.756 1.178-3.767 2.855c-.017 1.239 1.111 1.928 1.956 2.344c.861.422 1.156.7 1.156 1.072c-.011.578-.7.844-1.339.844c-.889 0-1.367-.139-2.095-.461l-.294-.139l-.311 1.939c.522.239 1.489.45 2.489.461c2.344.005 3.872-1.156 3.889-2.944zm7.844 2.822l-1.8-8.633h-1.728c-.533 0-.939.156-1.167.717l-3.317 7.917h2.344s.383-1.067.467-1.294h2.867c.067.306.267 1.294.267 1.294z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="custom_radio">
                                        <input type="radio" name="card" id="card2">
                                        <label class="title" selected="" for="card2">
                                            <div class="saved-card">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                     viewBox="0 0 512 512">
                                                    <path fill="#C2CCCE"
                                                          d="M505.999 104.494a23.067 23.067 0 0 0-19.614-19.615l-.329-.329H22.572l-.327.329A23.067 23.067 0 0 0 2.63 104.494l-.328.327v298.987l.328.329a23.067 23.067 0 0 0 19.615 19.615l.327.327h463.483l.329-.329a23.062 23.062 0 0 0 19.614-19.614l.329-.329V104.821l-.328-.327z"></path>
                                                    <path fill="#597B91" d="M2.302 149.609h504.024V236H2.302z"></path>
                                                    <path fill="#FFF"
                                                          d="M442.478 294.697H69.522c-23.116 0-41.855 18.739-41.855 41.854c0 23.116 18.739 41.855 41.855 41.855h372.957c23.116 0 41.855-18.739 41.855-41.855c-.001-23.115-18.74-41.854-41.856-41.854z"></path>
                                                    <path fill="#597B91"
                                                          d="M348.576 371.698c-1.13 0-2.238-.024-3.326-.072c-13.51-.604-22.237-4.798-27.875-9.934c-19.207 9.371-42.187 13.168-51.84 4.363c-3.646-3.324-8.474-10.958.139-24.728c6.98-11.159 8.596-20.652 4.021-23.623c-5.534-3.594-19.407-.151-28.546 13.417c-7.215 10.713-20.291 21.218-34.977 28.101c-7.572 3.549-26.516 11.043-38.877 4.004c-6.398-3.643-15.306-13.61-3.072-39.438c1.489-3.144 1.483-4.788 1.364-5.117c-2.353-2.743-22.062-1.928-42.894 9.78c-13.271 7.458-20.56 16.171-18.57 22.195a7.501 7.501 0 0 1-14.244 4.705c-4.067-12.314 2.827-25.195 19.411-36.271c18.365-12.266 52.469-23.503 66.095-11.737c3.506 3.026 8.478 10.021 2.394 22.866c-4.848 10.233-6.078 18.263-3.062 19.979c8.7 4.959 40.956-8.093 53.991-27.447c6.122-9.09 14.594-15.913 23.857-19.215c9.37-3.34 18.591-2.759 25.3 1.596c9.678 6.284 14.898 21.184.527 44.159c-2.144 3.428-2.468 5.253-2.509 5.876c3.303 2.229 18.115.825 33.107-6.037c-2.906-8.005-2.909-17.684.06-27.01c3.132-9.841 8.966-17.644 15.605-20.872c10.473-5.092 18.629 1.841 22.433 9.324c7.173 14.11 1.809 29.42-14.717 42.004c-.323.247-.65.492-.981.735c20.276 10.854 64.889-6.649 84.099-15.161a7.5 7.5 0 0 1 6.077 13.715c-29.741 13.177-54.27 19.843-72.99 19.843zm-16.932-57.141c-1.332.248-5.402 3.743-8.013 11.238c-1.632 4.685-2.439 10.385-1.314 15.562c.363-.267.723-.536 1.081-.811c7.26-5.556 14.942-14.089 10.318-23.186c-1.031-2.028-1.84-2.655-2.072-2.803z"></path>
                                                </svg>
                                                <div class="card-info">
                                                    <div class="owner">Emre Karataş</div>
                                                    <div class="card-number">5234 56<span>••</span>&nbsp;<span>••••</span>&nbsp;9876
                                                    </div>
                                                </div>
                                                <div class="card-logo">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                         viewBox="0 0 24 24">
                                                        <path fill="#C2CCCE"
                                                              d="M11.343 18.031c.058.049.12.098.181.146a7.391 7.391 0 0 1-4.107 1.238a7.416 7.416 0 1 1 4.104-13.593c-.06.051-.12.098-.165.15A7.963 7.963 0 0 0 8.595 12a7.996 7.996 0 0 0 2.748 6.031zm5.241-13.447c-1.52 0-2.931.456-4.105 1.238c.06.051.12.098.165.15A7.963 7.963 0 0 1 15.405 12a8.002 8.002 0 0 1-2.748 6.031c-.058.049-.12.098-.181.146a7.386 7.386 0 0 0 4.107 1.238A7.414 7.414 0 0 0 24 12a7.417 7.417 0 0 0-7.416-7.416zM12 6.174A7.388 7.388 0 0 0 9.169 12A7.386 7.386 0 0 0 12 17.827A7.39 7.39 0 0 0 14.831 12A7.388 7.388 0 0 0 12 6.174z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="creditCard" class="tabDetails" style="display: block;">
                                <div class="credit-card-section">
                                    <div class="creditcard-info">
                                        <div class="creditcard-text">
                                            <div class="custom_radio">
                                                <input type="radio" id="creditCardRadio" name="paymentType" value="finansbank" checked><label
                                                    class="title" for="creditCardRadio">Kredi Kartı</label>
                                            </div>
                                            Bilgileriniz akilliphone.com tarafından saklanmamaktadır. Ödeme altyapısı
                                            MasterPass tarafından
                                            sağlanmaktadır.
                                        </div>
                                        <div class="creditcard-wrapper">
                                            <div class="creditcard">
                                                <div class="front">
                                                    <div id="ccsingle"></div>
                                                    <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;"
                                                         xml:space="preserve">
<g id="Front">
    <g id="CardBackground">
        <g id="Page-1_1_">
            <g id="amex_1_">
                <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                  C0,17.9,17.9,0,40,0z"></path>
            </g>
        </g>
        <path class="darkcolor greydark"
              d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z"></path>
    </g>
    <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">0123 4567
        8910 1112
    </text>
    <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">ad
        soyad
    </text>
    <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8"></text>
    <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8"></text>
    <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8"></text>
    <g>
        <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">01/23</text>
        <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
        <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
        <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		"></polygon>
    </g>
    <g id="cchip">
        <g>
            <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                              c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z"></path>
        </g>
        <g>
            <g>
                <rect x="82" y="70" class="st12" width="1.5" height="60"></rect>
            </g>
            <g>
                <rect x="167.4" y="70" class="st12" width="1.5" height="60"></rect>
            </g>
            <g>
                <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                  c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                  C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                  c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                  c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z"></path>
            </g>
            <g>
                <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5"></rect>
            </g>
            <g>
                <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5"></rect>
            </g>
            <g>
                <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5"></rect>
            </g>
            <g>
                <rect x="142" y="117.9" class="st12" width="26.2" height="1.5"></rect>
            </g>
        </g>
    </g>
</g>
                                                        <g id="Back">
                                                        </g>
</svg>
                                                </div>
                                                <div class="back">
                                                    <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;"
                                                         xml:space="preserve">
<g id="Front">
    <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11"></line>
</g>
                                                        <g id="Back">
                                                            <g id="Page-1_2_">
                                                                <g id="amex_2_">
                                                                    <path id="Rectangle-1_2_" class="darkcolor greydark" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                              C0,17.9,17.9,0,40,0z"></path>
                                                                </g>
                                                            </g>
                                                            <rect y="61.6" class="st2" width="750" height="78"></rect>
                                                            <g>
                                                                <path class="st3" d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                          C707.1,246.4,704.4,249.1,701.1,249.1z"></path>
                                                                <rect x="42.9" y="198.6" class="st4" width="664.1"
                                                                      height="10.5"></rect>
                                                                <rect x="42.9" y="224.5" class="st4" width="664.1"
                                                                      height="10.5"></rect>
                                                                <path class="st5"
                                                                      d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z"></path>
                                                            </g>
                                                            <text transform="matrix(1 0 0 1 621.999 227.2734)"
                                                                  id="svgsecurity" class="st6 st7">985
                                                            </text>
                                                            <g class="st8">
                                                                <text transform="matrix(1 0 0 1 518.083 280.0879)"
                                                                      class="st9 st6 st10"></text>
                                                            </g>
                                                            <rect x="58.1" y="378.6" class="st11" width="375.5"
                                                                  height="13.5"></rect>
                                                            <rect x="58.1" y="405.6" class="st11" width="421.7"
                                                                  height="13.5"></rect>
                                                            <text transform="matrix(1 0 0 1 59.5073 228.6099)"
                                                                  id="svgnameback" class="st12 st13"></text>
                                                        </g>
</svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-container">
                                        <div class="field-container">
                                            <label for="name">Kart Üzerindeki İsim</label>
                                            <input class="card-input name" id="name" name="cc[name]" maxlength="20" type="text"
                                                   value="{{ $cc['name'] }}" placeholder="">
                                        </div>
                                        <div class="field-container">
                                            <label for="cardnumber">Kart Numarası</label>
                                            <input class="card-input cardnumber" id="cardnumber" name="cc[cardnumber]" type="text"
                                                    inputmode="numeric" value="{{ $cc['cardnumber'] }}" placeholder=".... .... .... ....">
                                            <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471"
                                                 version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                            </svg>
                                        </div>
                                        <div class="field-container">
                                            <label for="expirationdate">Tarih</label>
                                            <input class="card-input expirationdate" id="expirationdate" name="cc[expirationdate]"
                                                   type="text" pattern="(?:0[1-9]|1[0-2])/[0-9]{2}" inputmode="numeric"
                                                   value="{{ $cc['expirationdate'] }}" placeholder="../..">
                                        </div>
                                        <div class="field-container">
                                            <label for="securitycode">Kart Güvenlik Kodu</label>
                                            <input class="card-input securitycode" id="securitycode" name="cc[securitycode]" type="text"
                                                   pattern="[0-9]*" inputmode="numeric" value="{{ $cc['securitycode'] }}" placeholder="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($iyzico_link)
                                <div class="pay-transfer">
                                    <div class="creditcard-text">
                                        <div class="custom_radio">

                                            <label class="title" for="iyzico"><a href="{{ $iyzico_link }}"><input type="radio" id="iyzico" name="paymentType" value="iyzico"> Kredi Kartı İle Taksitli Ödeme</a></label>
                                        </div>
                                    </div>
                                    <div class="pay-logo">
                                        <img src="" alt="">
                                    </div>
                                </div>
                            @endif
                            <div class="pay-transfer">
                                <div class="creditcard-text">
                                    <div class="custom_radio">
                                        <input type="radio" id="transfer" name="paymentType" value="banktransfer">
                                        <label class="title" for="transfer">Havale</label>
                                    </div>
                                    {!! Basket()::getPaymentDescription(5) !!}
                                </div>
                                <div class="pay-logo">
                                    <img src="assets/images/ziraat.svg" alt="">
                                </div>
                            </div>
                        @endif

                        <div class="return-shopping">
                            <a href="{{ route('basket.index') }}" class="return-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="5.001" height="8.774"
                                     viewBox="0 0 5.001 8.774">
                                    <g id="flaticon1568189262-svg" transform="translate(102.14 8.773) rotate(180)">
                                        <path id="Path_1398" data-name="Path 1398"
                                              d="M101.96,4.821,98.187,8.593a.614.614,0,0,1-.869-.869l3.338-3.338L97.319,1.049A.614.614,0,0,1,98.187.18l3.773,3.772a.614.614,0,0,1,0,.869Z"
                                              transform="translate(0 0)" fill="#7b7b7b"></path>
                                    </g>
                                </svg>
                                Sepete Geri Dön
                            </a>
                        </div>
                        <div class="contract-box">
                            <div class="title">CAYMA HAKKININ KULLANILMASI</div>
                            <p>Alıcı, hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin,
                                mal satışına
                                ilişkin işlemlerde teslimat tarihinden itibaren, hizmet satışına ilişkin işlemlerde
                                sözleşmenin kurulduğu
                                tarih olan satın alma tarihinden itibaren 14 (on dört) gün içerisinde cayma hakkını
                                kullanabilir. Alıcı,
                                malın teslimine kadar olan süre içinde de cayma hakkını kullanabilir.
                                Alıcı, cayma hakkını n11.com’a giriş yaparak n11.com’da yer alan Hesabım&gt;Mevcut
                                Sipariş&gt;Siparişlerim
                                üzerinden “İade Et” bağlantısına tıklayarak kullanabilir. Alıcı’nın ilgili sayfada yer
                                alan iade talep
                                formunu doldurup, satıcıya ait iade adres bilgilerini alarak, cayma hakkını kullandığı
                                tarihten itibaren
                                10 (on) gün içinde malı geri göndermesi gerekmektedir. Mal ile beraber faturasının,
                                malın kutusunun,
                                ambalajının, varsa standart aksesuarlarının, mal ile birlikte hediye edilen diğer
                                ürünlerin de eksiksiz ve
                                hasarsız olarak iade edilmesi gerekmektedir. Alıcı, cayma süresi içinde malı;
                                işleyişine, teknik
                                özelliklerine ve kullanım talimatlarına uygun bir şekilde kullandığı takdirde meydana
                                gelen değişiklik ve
                                bozulmalardan sorumlu değildir. Cayma hakkının kullanılmasına ilişkin detaylı bilgi
                                n11.com’da yer alan
                                http://www.n11.com/genel/urun-iadesi-2082300
                                sayfasında yer almaktadır.
                                Alıcı’nın cayma hakkını kullanmasından itibaren 14 (on dört) gün içerisinde (malın
                                Satıcı’nın iade için
                                belirttiği taşıyıcı aracılığıyla geri gönderilmesi kaydıyla), Alıcı’nın ilgili mal veya
                                hizmete ilişkin
                                Satıcı veya Aracı Hizmet Sağlayıcı’ya yaptığı tüm ödemeler Alıcı’ya satın alırken
                                kullandığı ödeme aracına
                                uygun bir şekilde ve tüketiciye herhangi bir masraf veya yükümlülük getirmeden ve tek
                                seferde iade
                                edilecektir.
                                Alıcı iade edeceği malı Satıcı’ya Ön Bilgilendirme Formu'nda belirtilen Satıcı’nın
                                anlaşmalı kargo şirketi
                                ile gönderdiği sürece, iade kargo bedeli Satıcı’ya aittir. Alıcı’nın iade edeceği malı
                                Ön Bilgilendirme
                                Formu'nda belirtilen Satıcı’nın iade için öngördüğü anlaşmalı kargo şirketi dışında bir
                                kargo şirketi ile
                                göndermesi halinde, iade kargo bedeli ve malın kargo sürecinde uğrayacağı hasardan
                                Satıcı sorumlu
                                değildir.
                                Mevzuat uyarınca Alıcı aşağıdaki hallerde cayma hakkını kullanamaz:
                                Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve Satıcı’nın
                                kontrolünde olmayan mal
                                veya hizmetlere ilişkin sözleşmelerde (örn. ziynet, altın ve gümüş kategorisindeki
                                ürünler);
                                Alıcı'nın istekleri veya açıkça onun kişisel ihtiyaçları doğrultusunda hazırlanan,
                                niteliği itibariyle
                                geri gönderilmeye elverişli olmayan ve çabuk bozulma tehlikesi olan veya son kullanma
                                tarihi geçme
                                ihtimali olan malların teslimine ilişkin sözleşmelerde;
                                Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan
                                mallardan; iadesi
                                sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin sözleşmelerde;
                                Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan
                                mallara ilişkin
                                sözleşmelerde;
                                Alıcı tarafından ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması
                                şartıyla maddi ortamda
                                sunulan kitap, ses veya görüntü kayıtlarına, yazılım programlarına ve bilgisayar sarf
                                malzemelerine
                                ilişkin sözleşmelerde;
                                Abonelik sözleşmesi kapsamında sağlananlar dışında gazete, dergi gibi süreli yayınların
                                teslimine ilişkin
                                sözleşmelerde;
                                Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba
                                kiralama, yiyecek-içecek
                                tedariki ve eğlence veya dinlenme amacıyla yapılan boş zamanın değerlendirilmesine
                                ilişkin sözleşmelerde;
                                Bahis ve piyangoya ilişkin hizmetlerin ifasına ilişkin sözleşmelerde;
                                Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetlere
                                ilişkin
                                sözleşmelerde; ve
                                Elektronik ortamda anında ifa edilen hizmetler ile tüketiciye anında teslim edilen gayri
                                maddi mallara
                                ilişkin sözleşmelerde (hediye kartı, hediye çeki, para yerine geçen kupon ve benzeri).
                                Mesafeli Sözleşmeler Yönetmeliği’nin kapsamı dışında bırakılmış olan mal veya hizmetler
                                (Satıcı’nın
                                düzenli teslimatları ile Alıcı'nın meskenine teslim edilen gıda maddelerinin,
                                içeceklerin ya da diğer
                                günlük tüketim maddeleri ile seyahat, konaklama, lokantacılık, eğlence sektörü gibi
                                alanlarda hizmetler)
                                bakımından cayma hakkı kullanılamayacaktır.
                                Tatil kategorisinde satışa sunulan bu tür mal ve hizmetlerin iptal ve iade şartları her
                                Satıcı’nın
                                uygulama ve kurallarına tabidir.
                            </p>
                        </div>
                        <div class="contract-box">
                            <div class="title">ÖN BİLGİLENDİRME FORMU</div>
                            <p>Alıcı, hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin,
                                mal satışına
                                ilişkin işlemlerde teslimat tarihinden itibaren, hizmet satışına ilişkin işlemlerde
                                sözleşmenin kurulduğu
                                tarih olan satın alma tarihinden itibaren 14 (on dört) gün içerisinde cayma hakkını
                                kullanabilir. Alıcı,
                                malın teslimine kadar olan süre içinde de cayma hakkını kullanabilir.
                                Alıcı, cayma hakkını n11.com’a giriş yaparak n11.com’da yer alan Hesabım&gt;Mevcut
                                Sipariş&gt;Siparişlerim
                                üzerinden “İade Et” bağlantısına tıklayarak kullanabilir. Alıcı’nın ilgili sayfada yer
                                alan iade talep
                                formunu doldurup, satıcıya ait iade adres bilgilerini alarak, cayma hakkını kullandığı
                                tarihten itibaren
                                10 (on) gün içinde malı geri göndermesi gerekmektedir. Mal ile beraber faturasının,
                                malın kutusunun,
                                ambalajının, varsa standart aksesuarlarının, mal ile birlikte hediye edilen diğer
                                ürünlerin de eksiksiz ve
                                hasarsız olarak iade edilmesi gerekmektedir. Alıcı, cayma süresi içinde malı;
                                işleyişine, teknik
                                özelliklerine ve kullanım talimatlarına uygun bir şekilde kullandığı takdirde meydana
                                gelen değişiklik ve
                                bozulmalardan sorumlu değildir. Cayma hakkının kullanılmasına ilişkin detaylı bilgi
                                n11.com’da yer alan
                                http://www.n11.com/genel/urun-iadesi-2082300
                                sayfasında yer almaktadır.
                                Alıcı’nın cayma hakkını kullanmasından itibaren 14 (on dört) gün içerisinde (malın
                                Satıcı’nın iade için
                                belirttiği taşıyıcı aracılığıyla geri gönderilmesi kaydıyla), Alıcı’nın ilgili mal veya
                                hizmete ilişkin
                                Satıcı veya Aracı Hizmet Sağlayıcı’ya yaptığı tüm ödemeler Alıcı’ya satın alırken
                                kullandığı ödeme aracına
                                uygun bir şekilde ve tüketiciye herhangi bir masraf veya yükümlülük getirmeden ve tek
                                seferde iade
                                edilecektir.
                                Alıcı iade edeceği malı Satıcı’ya Ön Bilgilendirme Formu'nda belirtilen Satıcı’nın
                                anlaşmalı kargo şirketi
                                ile gönderdiği sürece, iade kargo bedeli Satıcı’ya aittir. Alıcı’nın iade edeceği malı
                                Ön Bilgilendirme
                                Formu'nda belirtilen Satıcı’nın iade için öngördüğü anlaşmalı kargo şirketi dışında bir
                                kargo şirketi ile
                                göndermesi halinde, iade kargo bedeli ve malın kargo sürecinde uğrayacağı hasardan
                                Satıcı sorumlu
                                değildir.
                                Mevzuat uyarınca Alıcı aşağıdaki hallerde cayma hakkını kullanamaz:
                                Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve Satıcı’nın
                                kontrolünde olmayan mal
                                veya hizmetlere ilişkin sözleşmelerde (örn. ziynet, altın ve gümüş kategorisindeki
                                ürünler);
                                Alıcı'nın istekleri veya açıkça onun kişisel ihtiyaçları doğrultusunda hazırlanan,
                                niteliği itibariyle
                                geri gönderilmeye elverişli olmayan ve çabuk bozulma tehlikesi olan veya son kullanma
                                tarihi geçme
                                ihtimali olan malların teslimine ilişkin sözleşmelerde;
                                Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan
                                mallardan; iadesi
                                sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin sözleşmelerde;
                                Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan
                                mallara ilişkin
                                sözleşmelerde;
                                Alıcı tarafından ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması
                                şartıyla maddi ortamda
                                sunulan kitap, ses veya görüntü kayıtlarına, yazılım programlarına ve bilgisayar sarf
                                malzemelerine
                                ilişkin sözleşmelerde;
                                Abonelik sözleşmesi kapsamında sağlananlar dışında gazete, dergi gibi süreli yayınların
                                teslimine ilişkin
                                sözleşmelerde;
                                Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba
                                kiralama, yiyecek-içecek
                                tedariki ve eğlence veya dinlenme amacıyla yapılan boş zamanın değerlendirilmesine
                                ilişkin sözleşmelerde;
                                Bahis ve piyangoya ilişkin hizmetlerin ifasına ilişkin sözleşmelerde;
                                Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetlere
                                ilişkin
                                sözleşmelerde; ve
                                Elektronik ortamda anında ifa edilen hizmetler ile tüketiciye anında teslim edilen gayri
                                maddi mallara
                                ilişkin sözleşmelerde (hediye kartı, hediye çeki, para yerine geçen kupon ve benzeri).
                                Mesafeli Sözleşmeler Yönetmeliği’nin kapsamı dışında bırakılmış olan mal veya hizmetler
                                (Satıcı’nın
                                düzenli teslimatları ile Alıcı'nın meskenine teslim edilen gıda maddelerinin,
                                içeceklerin ya da diğer
                                günlük tüketim maddeleri ile seyahat, konaklama, lokantacılık, eğlence sektörü gibi
                                alanlarda hizmetler)
                                bakımından cayma hakkı kullanılamayacaktır.
                                Tatil kategorisinde satışa sunulan bu tür mal ve hizmetlerin iptal ve iade şartları her
                                Satıcı’nın
                                uygulama ve kurallarına tabidir.
                            </p>
                        </div>
                        <div class="contract-box">
                            <div class="title">MESAFELİ SATIŞ SÖZLEŞMESİ</div>
                            <p>MADDE 1- TARAFLAR
                                1.1. SATICI:
                                Ünvanı: Berkant Elektronik Hizmetler ve Ticaret A.Ş.
                                Adresi: Kuştepe Mah. Mecidiyeköy Yolu Cad. Trump Towers No:12 Kule:2 Kat:2
                                Şişli/İSTANBUL
                                Telefon: 0212 705 68 00
                                Fax: 0216 592 65 28
                                Müşteri Hizmetleri Telefon: 0850 252 40 00
                                Mersis Numarası: 0265017991000011
                                1.2. ALICI(“TÜKETİCİ”):
                                Adı/Soyadı/Ünvanı: Mücahit Taşkın
                                Adresi : yunus emre mh 4012sk no:.8 AKYAZI Sakarya / Türkiye
                                Telefon: 905455982392
                                Email: mucahitttaskin@gmail.com
                                MADDE 2- KONU
                                İşbu sözleşmenin konusu, TÜKETİCİ’nin www.hepsiburada.com internet sitesinden elektronik
                                ortamda
                                siparişini yaptığı aşağıda nitelikleri ve satış fiyatı belirtilen ürünün satışı ve
                                teslimi ile ilgili
                                olarak 6502 sayılı Tüketicinin Korunması Hakkındaki Kanun hükümleri gereğince tarafların
                                hak ve
                                yükümlülüklerinin saptanmasıdır.
                                MADDE 3- SÖZLEŞME KONUSU ÜRÜN, ÖDEME VE TESLİMATA İLİŞKİN BİLGİLER
                                3.1- Sözleşme konusu mal veya hizmetin adı, adeti, KDV dahil satış fiyatı, ödeme şekli
                                ve temel
                                nitelikleri
                                Ürün Adı ve Temel Nitelikleri Adet Satış Bedeli
                                (KDV dahil toplam Türk Lirası) Vadeli Satış Bedeli
                                (KDV dahil toplam)
                                Apple AirPods 2. Nesil Bluetooth Kulaklık MV7N2TU/A (Apple Türkiye Garantili) 1 999,90
                                Vadesiz
                                3.2- Ödeme Şekli : Kredi Kartı ile İşlem
                                Sipariş özeti sayfasında sipariş toplamının kaç taksitle ödeneceği bilgisi
                                bulunmaktadır.
                                Bankanız kampanyalar düzenleyerek sizin seçtiğiniz taksit adedinin daha üstünde bir
                                taksit adedi
                                uygulayabilir, taksit öteleme gibi hizmetler sunulabilir. Bu tür kampanyalar bankanızın
                                inisiyatifindedir
                                ve şirketimizin bilgisi dâhilinde olması durumunda sayfalarımızda kampanyalar hakkında
                                bilgi
                                verilmektedir.
                                Kredi kartınızın hesap kesim tarihinden itibaren sipariş toplamı taksit adedine
                                bölünerek kredi kartı
                                özetinize bankanız tarafından yansıtılacaktır. Banka taksit tutarlarını küsurat
                                farklarını dikkate alarak
                                aylara eşit olarak dağıtmayabilir. Detaylı ödeme planınızın oluşturulması bankanız
                                inisiyatifindedir.
                                3.3- Diğer yandan vadeli satışların sadece Bankalara ait kredi kartları ile yapılması
                                nedeniyle, TÜKETİCİ,
                                ilgili faiz oranlarını ve temerrüt faizi ile ilgili bilgileri bankasından ayrıca teyit
                                edeceğini,
                                yürürlükte bulunan mevzuat hükümleri gereğince faiz ve temerrüt faizi ile ilgili
                                hükümlerin Banka ve
                                TÜKETİCİ arasındaki kredi kartı sözleşmesi kapsamında uygulanacağını kabul, beyan ve
                                taahhüt eder.
                                Ayrıca, Kredili satış imkanının Bankalar tarafından sadece Banka Müşterisi olan
                                TÜKETİCİ'ye sağlanması
                                nedeniyle, TÜKETİCİ, ilgili faiz oranlarını ve temerrüt faizi ile ilgili bilgileri
                                bankasından ayrıca
                                teyit edeceğini, yürürlükte bulunan mevzuat hükümleri gereğince faiz ve temerrüt faizi
                                ile ilgili
                                hükümlerin Banka ve TÜKETİCİ arasındaki Anında/Mesafeli Alışveriş Kredisi sözleşmesi
                                kapsamında
                                uygulanacağını kabul, beyan ve taahhüt eder. Kredi verme ve detaylı ödeme planınızın
                                oluşturulması
                                Bankanız inisiyatifindedir.
                                3.4 - İade Prosedürü:
                                TÜKETİCİ'nin cayma hakkını kullandığı durumlarda ya da siparişe konu olan ürünün çeşitli
                                sebeplerle
                                tedarik edilememesi veya hakem heyeti kararları ile TÜKETİCİ'ye bedel iadesine karar
                                verilen durumlarda,
                                ödeme seçeneklerine ilişkin iade prosedürü aşağıda belirtilmiştir:
                                a) Kredi Kartı ile Ödeme Seçeneklerinde İade Prosedürü
                                Alışveriş kredi kartı ile ve taksitli olarak yapılmışsa, TÜKETİCİ ürünü kaç taksit ile
                                aldıysa Banka
                                TÜKETİCİ'ye geri ödemesini taksitle yapmaktadır. SATICI bankaya ürün bedelinin tamamını
                                tek seferde
                                ödedikten sonra, Banka poslarından yapılan taksitli harcamaların TÜKETİCİ'nin kredi
                                kartına iadesi
                                durumunda, konuya müdahil tarafların mağdur duruma düşmemesi için talep edilen iade
                                tutarları, yine
                                taksitli olarak hamil taraf hesaplarına Banka tarafından aktarılır. TÜKETİCİ'nin satış
                                iptaline kadar
                                ödemiş olduğu taksit tutarları, eğer iade tarihi ile kartın hesap kesim tarihleri
                                çakışmazsa her ay karta
                                1 (bir) iade yansıyacak ve TÜKETİCİ iade öncesinde ödemiş olduğu taksitleri satışın
                                taksitleri bittikten
                                sonra, iade öncesinde ödemiş olduğu taksitleri sayısı kadar ay daha alacak ve mevcut
                                borçlarından düşmüş
                                olacaktır.
                                Kart ile alınmış mal ve hizmetin iadesi durumunda SATICI, Banka ile yapmış olduğu
                                sözleşme gereği
                                TÜKETİCİ'ye nakit para ile ödeme yapamaz. SATICI, bir iade işlemi söz konusu olduğunda
                                ilgili yazılım
                                aracılığı ile iadesini yapacak olup, SATICI ilgili tutarı Banka'ya nakden veya mahsuben
                                ödemekle yükümlü
                                olduğundan yukarıda anlatmış olduğumuz prosedür gereğince TÜKETİCİ'ye nakit olarak ödeme
                                yapılamamaktadır.
                                Kredi kartına iade, SATICI'nın Banka'ya bedeli tek seferde ödemesinden sonra, Banka
                                tarafından yukarıdaki
                                prosedür gereğince yapılacaktır.
                                TÜKETİCİ, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.
                                b) Havale/EFT Ödeme Seçeneklerinde İade Prosedürü
                                İade, TÜKETİCİ'den banka hesap bilgileri istenerek, TÜKETİCİ'nin belirttiği hesaba
                                (hesabın fatura
                                adresindeki kişinin adına veya kullanıcı üyenin adına olması şarttır) havale ve EFT
                                şeklinde yapılacaktır.
                                SATICI bankaya ürün bedelinin tamamını tek seferde geri öder.
                                Havale/EFT yoluyla alınmış mal ve hizmetin iadesi durumunda SATICI, Banka ile yapmış
                                olduğu sözleşme
                                gereği TÜKETİCİ'ye nakit para ile ödeme yapamaz. SATICI, bir iade işlemi söz konusu
                                olduğunda ilgili
                                yazılım aracılığı ile iadesini yapacak olup, SATICI ilgili tutarı Banka'ya nakden veya
                                mahsuben ödemekle
                                yükümlü olduğundan yukarıda anlatmış olduğumuz prosedür gereğince TÜKETİCİ'ye nakit
                                olarak ödeme
                                yapılamamaktadır.
                                TÜKETİCİ, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.
                                c) Alışveriş Kredisi ile Ödeme Seçeneklerinde İade Prosedürü
                                İade, TÜKETİCİ'den banka hesap bilgileri istenerek,TÜKETİCİ'nin belirttiği hesaba
                                (hesabın fatura
                                adresindeki kişinin adına veya kullanıcı üyenin adına olması şarttır) havale ve EFT
                                şeklinde yapılacaktır.
                                SATICI bankaya ürün bedelinin tamamını tek seferde geri öder.
                                Kredi yoluyla alınmış mal ve hizmetin iadesi durumunda SATICI, Banka ile yapmış olduğu
                                sözleşme gereği
                                TÜKETİCİ'ye nakit para ile ödeme yapamaz. SATICI, bir iade işlemi söz konusu olduğunda
                                ilgili yazılım
                                aracılığı ile iadesini yapacak olup, SATICI ilgili tutarı Banka'ya nakden veya mahsuben
                                ödemekle yükümlü
                                olduğundan yukarıda anlatmış olduğumuz prosedür gereğince TÜKETİCİ'ye nakit olarak ödeme
                                yapılamamaktadır.
                                TÜKETİCİ, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.
                                3.5- Teslimat Şekli ve Adresi :
                                Teslimat Adresi : Esentepe mahallesi büyükdere caddesi no128 d blok hsbc genel müdürlüğü
                                dahili no 5154
                                Türkiye İstanbul / Türkiye
                                Teslim Edilecek Kişi: Recep Taşkın
                                Fatura Adresi : yunus emre mh 4012sk no:.8 AKYAZI Sakarya / Türkiye
                                Paketleme, kargo ve teslim masrafları TÜKETİCİ tarafından karşılanmaktadır. Kargo ücreti
                                0,00 -TL olup,
                                kargo fiyatı sipariş toplam tutarına eklenmektedir. Ürün bedeline dahil değildir.
                                Teslimat , anlaşmalı
                                kargo şirketi aracılığı ile, TÜKETİCİ'nin yukarıda belirtilen adresinde elden teslim
                                edilecektir. Teslim
                                anında TÜKETİCİ'nin adresinde bulunmaması durumunda dahi Firmamız edimini tam ve
                                eksiksiz olarak yerine
                                getirmiş olarak kabul edilecektir. Bu nedenle, TÜKETİCİ'nin ürünü geç teslim almasından
                                ve/veya hiç teslim
                                almamasından kaynaklanan zararlardan ve giderlerden SATICI sorumlu değildir. SATICI,
                                sözleşme konusu
                                ürünün sağlam, eksiksiz, siparişte belirtilen niteliklere uygun ve varsa garanti
                                belgeleri ve kullanım
                                kılavuzları ile teslim edilmesinden sorumludur.
                                3.6. Hızlı ve Kolay Alışveriş: Siparişin onaylanması sonrasında, "TÜKETİCİ" sipariş
                                onaylanma ekranında
                                hızlı ve kolay alışveriş bölümünde TÜKETİCİ "ONAY" sekmesini tıklaması ve müşterinin
                                sistemde kayıtlı cep
                                telefonuna gelen SMS doğrulama aktivasyon kodunu, 180 saniye içerisinde sitede yer alan
                                ilgili bölüme
                                girmesi halinde kargo firması, teslimat adresi, ödeme seçim ve bilgilerinin kendi
                                onayıyla "müşteri profil
                                bilgileri" altında kaydedilerek saklanmasını kabul eder. "TÜKETİCİ'NİN" rızası ile
                                kaydedilen ilgili
                                bilgiler "müşterinin profil bilgileri" altında saklanacak olup "TÜKETİCİ'NİN" talebi
                                durumunda bu bilgiler
                                istenildiğinde "müşteri profilinden" çıkartılır.
                                MADDE 4- CAYMA HAKKI
                                TÜKETİCİ , SATICI ile imzaladığı işbu Mesafeli Satış Sözleşmesi'nden 14 (ondört) gün
                                içinde herhangi bir
                                gerekçe göstermeksizin ve cezai şart ödemeksizin cayma hakkına sahiptir. Cayma hakkı
                                süresi, hizmet
                                ifasına ilişkin sözleşmelerde sözleşmenin kurulduğu gün; mal teslimine ilişkin
                                sözleşmelerde ise
                                TÜKETİCİ'nin veya TÜKETİCİ tarafından belirlenen üçüncü kişinin malı teslim aldığı gün
                                başlar. Ancak
                                TÜKETİCİ, sözleşmenin kurulmasından malın teslimine kadar olan süre içinde de cayma
                                hakkını kullanabilir.
                                Cayma hakkı süresinin belirlenmesinde;
                                a) Tek sipariş konusu olup ayrı ayrı teslim edilen mallarda, TÜKETİCİ'nin veya TÜKETİCİ
                                tarafından
                                belirlenen üçüncü kişinin son malı teslim aldığı gün,
                                b) Birden fazla parçadan oluşan mallarda, TÜKETİCİ'nin veya TÜKETİCİ tarafından
                                belirlenen üçüncü kişinin
                                son parçayı teslim aldığı gün,
                                c) Belirli bir süre boyunca malın düzenli tesliminin yapıldığı sözleşmelerde,
                                TÜKETİCİ'nin veya TÜKETİCİ
                                tarafından belirlenen üçüncü kişinin ilk malı teslim aldığı gün esas alınır. Cayma
                                bildiriminizi cayma
                                hakkı süresi dolmadan www.hepsiburada.com 'da yer alan kişisel üyelik sayfanızdaki kolay
                                iade seçeneği
                                üzerinden gerçekleştirebilirsiniz. Cayma hakkınız kapsamında öngörülen taşıyıcı sipariş
                                edilen ürünün
                                tarafınıza teslim edildiği kargo firması olup, www.hepsiburada.com 'da yer alan kişisel
                                üyelik
                                sayfanızdaki kolay iade seçeneğinde geri gönderime ilişkin detaylar açıklanmıştır.
                                Tüketici aşağıdaki sözleşmelerde cayma hakkını kullanamaz:
                                a) Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve SATICI veya
                                sağlayıcının
                                kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler.
                                b) Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara
                                ilişkin sözleşmeler.
                                c) Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine ilişkin
                                sözleşmeler.
                                ç) Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan
                                mallardan; iadesi
                                sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin sözleşmeler.
                                d) Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün
                                olmayan mallara
                                ilişkin sözleşmeler.
                                e) Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış
                                olması halinde
                                maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf malzemelerine ilişkin
                                sözleşmeler.
                                f) Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli
                                yayınların teslimine
                                ilişkin sözleşmeler.
                                g) Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba
                                kiralama,
                                yiyecek-içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş zamanın
                                değerlendirilmesine ilişkin
                                sözleşmeler.
                                ğ) Elektronik ortamda anında ifa edilen hizmetler veya TÜKETİCİ'ye anında teslim edilen
                                gayrimaddi mallara
                                ilişkin sözleşmeler.
                                h) Cayma hakkı süresi sona ermeden önce, TÜKETİCİ'nin onayı ile ifasına başlanan
                                hizmetlere ilişkin
                                sözleşmeler.
                                TÜKETİCİ'nin "Alışveriş Kredisi" ile ödeme seçeneğini seçmesi halinde, TÜKETİCİ,
                                Anında/Mesafeli Alışveriş
                                Kredisi Sözleşmesi'nden cayma hakkının, Banka ve TÜKETİCİ arasındaki Anında/Mesafeli
                                Alışveriş Kredisi
                                sözleşmesi kapsamında uygulanacağını kabul, beyan ve taahhüt eder. TÜKETİCİ'nin, SATICI
                                ile imzaladığı
                                işbu Mesafeli Satış Sözleşmesi'nden cayması, Banka ile arasındaki Anında/Mesafeli
                                Alışveriş Kredisi
                                Sözleşmesi'ni otomatikman SONA ERDİRMEYECEKTİR. TÜKETİCİ'nin, Anında/Mesafeli Alışveriş
                                Kredisi
                                Sözleşmesi'nden cayması için cayma talebini Anında/Mesafeli Alışveriş Kredisi
                                Sözleşmesi'nde belirtilen
                                süreler içerisinde, yine Anında/Mesafeli Alışveriş Kredisi Sözleşmesi'nde öngörülen
                                usule uygun olarak
                                kredi veren Banka'ya yöneltmesi gerekmektedir. Bu kapsamda, TÜKETİCİ tarafından Banka'ya
                                yapılması gereken
                                bildirimin hiç yapılmaması veya geç yapılması durumunda ya da Banka ile TÜKETİCİ
                                arasındaki kredi ilişkisi
                                ile ilgili Üye İşyeri'nin yani SATICI'nın hiçbir sorumluluğu doğmayacaktır.
                                MADDE 5- GENEL HÜKÜMLER
                                5.1- TÜKETİCİ, www.hepsiburada.com internet sitesinde sözleşme konusu ürüne ilişkin ön
                                bilgileri okuyup
                                bilgi sahibi olduğunu ve elektronik ortamda gerekli teyidi verdiğini beyan eder.
                                5.2- Ürün sözleşme tarihinden itibaren en geç 30 gün içerisinde teslim edilecektir.
                                Ürününün teslim
                                edilmesi anına kadar tüm sorumluluk SATICI'ya aittir.
                                5.3- Sözleşme konusu ürün, TÜKETİCİ'dan başka bir kişi/kuruluşa teslim edilecek ise,
                                teslim edilecek
                                kişi/kuruluşun teslimatı kabul etmemesinden SATICI sorumlu tutulamaz.
                                5.4- SATICI, sözleşme konusu ürünün sağlam, eksiksiz, siparişte belirtilen niteliklere
                                uygun ve varsa
                                garanti belgeleri ve kullanım kılavuzları ile teslim edilmesinden sorumludur.
                                5.5- Sözleşme konusu ürünün teslimatı için işbu sözleşmenin bedelinin TÜKETİCİ'nin
                                tercih ettiği ödeme
                                şekli ile ödenmiş olması şarttır. Herhangi bir nedenle ürün bedeli ödenmez veya banka
                                kayıtlarında iptal
                                edilir ise, SATICI ürünün teslimi yükümlülüğünden kurtulmuş kabul edilir.
                                5.6- Ürünün tesliminden sonra TÜKETİCİ'ya ait kredi kartının TÜKETİCİ'nin kusurundan
                                kaynaklanmayan bir
                                şekilde yetkisiz kişilerce haksız veya hukuka aykırı olarak kullanılması nedeni ile
                                ilgili banka veya
                                finans kuruluşun ürün bedelini SATICI'ya ödememesi halinde, TÜKETİCİ'nin kendisine
                                teslim edilmiş olması
                                kaydıyla ürünün SATICI'ya gönderilmesi zorunludur.
                                5.7- Garanti belgesi ile satılan ürünlerden olan veya olmayan ürünlerin ayıplı (arızalı,
                                bozuk vb.)
                                halinde veya garanti kapsamında ve şartları dahilinde arızalanması veya bozulması
                                halinde gerekli onarımın
                                yetkili servise yaptırılması için sözkonusu ürünler SATICI'ya gönderilebilir, bu
                                takdirde kargo giderleri
                                SATICI tarafından karşılanacaktır.
                                5.8- 385 sayılı vergi usul kanunu genel tebliği uyarınca iade işlemlerinin yapılabilmesi
                                için tarafınıza
                                göndermiş olduğumuz iade bölümü bulunan faturada ilgili bölümlerin eksiksiz olarak
                                doldurulması ve
                                imzalandıktan sonra tarafımıza ürün ile birlikte geri gönderilmesi gerekmektedir.
                                5.9- Satışı ilgili mevzuatlar gereği resmi merciler nezdinde gerçekleştirilecek resmi
                                işlemler ile
                                tamamlanması öngörülen ürünler için Ön Bilgilendirme Formu ve Mesafeli Satış Sözleşmesi
                                bir ön protokol
                                niteliğindedir. Bu ürünlerin toplam bedeli, ödeme şekli ilgili Kampanya Şartlarında
                                ve/veya Ürün
                                Açıklamalarında belirtilecek olup, bu bedele satışa ilişkin resmi işlemlerin
                                tamamlanması sırasında ortaya
                                çıkacak masraflar dahil değildir. Söz konusu masraflar TÜKETİCİ tarafından resmi
                                işlemlerin yerine
                                getirilmesi esnasında ödenecektir. Bu satışlar, toplam bedelin TÜKETİCİ tarafından
                                SATICI’ya ödenmesi ve
                                resmi merciler nezdinde resmi işlemlerin yerine getirilmesi ile tamamlanmış
                                sayılacaktır. Bu kapsamda
                                cayma hakkı, kargo / teslimat ve benzeri nitelikteki uygulama alanı bulunmayan hükümler
                                bu ürünler için
                                geçerli olmayacaktır.
                                MADDE 6- UYUŞMAZLIK VE YETKİLİ MAHKEME
                                İşbu sözleşme ile ilgili çıkacak ihtilaflarda; Türk Mahkemeleri yetkili olup;
                                uygulanacak hukuk Türk
                                Hukuku'dur.
                                Türkiye Cumhuriyeti sınırları içerisinde geçerli olmak üzere her yıl Gümrük ve ticaret
                                Bakanlığı
                                tarafından ilan edilen değere kadar olan ihtilaflar için TÜKETİCİ işleminin yapıldığı
                                veya TÜKETİCİ
                                ikametgahının bulunduğu yerdeki İl veya İlçe Tüketici Hakem Heyetleri,söz konusu değerin
                                üzerindeki
                                ihtilaflarda ise TÜKETİCİ işleminin yapıldığı veya TÜKETİCİ ikametgahının bulunduğu
                                yerdeki Tüketici
                                Mahkemeleri Yetkili olacaktır.
                                Siparişin gerçekleşmesi durumunda TÜKETİCİ işbu sözleşmenin tüm koşullarını kabul etmiş
                                sayılır.
                                SATICI : D-Market Elektronik Hizmetler ve Ticaret A.Ş.
                                ALICI("TÜKETİCİ") : Mücahit Taşkın
                                Tarih : 17.09.2019
                                MESAFELİ SATIŞ SÖZLEŞMESİ
                                MADDE 1- TARAFLAR
                                1.1. SATICI:
                                Ünvanı: AZTEK TEKNOLOJİ ÜRN. TİC .A.Ş.
                                Adresi: 2. Söltaş Evleri Hare Sk. G14 Akatlar/Levent 34
                                Telefon: 02122798889
                                Fax: 02122798890
                                Müşteri Hizmetleri Telefon: 0850 252 40 00
                                Mersis Numarası: 1270358214000014
                                1.2. ALICI("TÜKETİCİ"):
                                Adı/Soyadı/Ünvanı: Mücahit Taşkın
                                Adresi : yunus emre mh 4012sk no:.8 AKYAZI Sakarya / Türkiye
                                Telefon: 905455982392
                                Email: mucahitttaskin@gmail.com
                                MADDE 2- KONU
                                İşbu sözleşmenin konusu, TÜKETİCİ'nin www.hepsiburada.com internet sitesinden elektronik
                                ortamda
                                siparişini yaptığı aşağıda nitelikleri ve satış fiyatı belirtilen ürünün satışı ve
                                teslimi ile ilgili
                                olarak 6502 sayılı Tüketicinin Korunması Hakkındaki Kanun hükümleri gereğince tarafların
                                hak ve
                                yükümlülüklerinin saptanmasıdır.
                                MADDE 3- SÖZLEŞME KONUSU ÜRÜN, ÖDEME VE TESLİMATA İLİŞKİN BİLGİLER
                                3.1- Sözleşme konusu mal veya hizmetin adı, adeti, KDV dahil satış fiyatı, ödeme şekli
                                ve temel
                                nitelikleri
                                Ürün Adı ve Temel Nitelikleri Adet Satış Bedeli
                                (KDV dahil toplam Türk Lirası) Vadeli Satış Bedeli
                                (KDV dahil toplam)
                                JBL Flip 4 Taşınabilir Ipx7 Su Geçirmez Bluetooth Hoparlör 1 699,00 Vadesiz
                                3.2- Ödeme Şekli : Kredi Kartı ile İşlem
                                Sipariş özeti sayfasında sipariş toplamının kaç taksitle ödeneceği bilgisi
                                bulunmaktadır.
                                Bankanız kampanyalar düzenleyerek sizin seçtiğiniz taksit adedinin daha üstünde bir
                                taksit adedi
                                uygulayabilir, taksit öteleme gibi hizmetler sunulabilir. Bu tür kampanyalar bankanızın
                                inisiyatifindedir
                                ve şirketimizin bilgisi dâhilinde olması durumunda sayfalarımızda kampanyalar hakkında
                                bilgi
                                verilmektedir.
                                Kredi kartınızın hesap kesim tarihinden itibaren sipariş toplamı taksit adedine
                                bölünerek kredi kartı
                                özetinize bankanız tarafından yansıtılacaktır. Banka taksit tutarlarını küsurat
                                farklarını dikkate alarak
                                aylara eşit olarak dağıtmayabilir. Detaylı ödeme planınızın oluşturulması bankanız
                                inisiyatifindedir.
                                3.3- Diğer yandan vadeli satışların sadece Bankalara ait kredi kartları ile yapılması
                                nedeniyle, TÜKETİCİ,
                                ilgili faiz oranlarını ve temerrüt faizi ile ilgili bilgileri bankasından ayrıca teyit
                                edeceğini,
                                yürürlükte bulunan mevzuat hükümleri gereğince faiz ve temerrüt faizi ile ilgili
                                hükümlerin Banka ve
                                TÜKETİCİ arasındaki kredi kartı sözleşmesi kapsamında uygulanacağını kabul, beyan ve
                                taahhüt eder.
                                Ayrıca, Kredili satış imkanının Bankalar tarafından sadece Banka Müşterisi olan
                                TÜKETİCİ'ye sağlanması
                                nedeniyle, TÜKETİCİ, ilgili faiz oranlarını ve temerrüt faizi ile ilgili bilgileri
                                bankasından ayrıca
                                teyit edeceğini, yürürlükte bulunan mevzuat hükümleri gereğince faiz ve temerrüt faizi
                                ile ilgili
                                hükümlerin Banka ve TÜKETİCİ arasındaki Anında/Mesafeli Alışveriş Kredisi sözleşmesi
                                kapsamında
                                uygulanacağını kabul, beyan ve taahhüt eder. Kredi verme ve detaylı ödeme planınızın
                                oluşturulması
                                Bankanız inisiyatifindedir.
                                3.4 - İade Prosedürü:
                                TÜKETİCİ'nin cayma hakkını kullandığı durumlarda ya da siparişe konu olan ürünün çeşitli
                                sebeplerle
                                tedarik edilememesi veya hakem heyeti kararları ile TÜKETİCİ'ye bedel iadesine karar
                                verilen durumlarda,
                                ödeme seçeneklerine ilişkin iade prosedürü aşağıda belirtilmiştir:
                                a) Kredi Kartı ile Ödeme Seçeneklerinde İade Prosedürü
                                Alışveriş kredi kartı ile ve taksitli olarak yapılmışsa, TÜKETİCİ ürünü kaç taksit ile
                                aldıysa Banka
                                TÜKETİCİ'ye geri ödemesini taksitle yapmaktadır. SATICI bankaya ürün bedelinin tamamını
                                tek seferde
                                ödedikten sonra, Banka poslarından yapılan taksitli harcamaların TÜKETİCİ'nin kredi
                                kartına iadesi
                                durumunda, konuya müdahil tarafların mağdur duruma düşmemesi için talep edilen iade
                                tutarları, yine
                                taksitli olarak hamil taraf hesaplarına Banka tarafından aktarılır. TÜKETİCİ'nin satış
                                iptaline kadar
                                ödemiş olduğu taksit tutarları, eğer iade tarihi ile kartın hesap kesim tarihleri
                                çakışmazsa her ay karta
                                1 (bir) iade yansıyacak ve TÜKETİCİ iade öncesinde ödemiş olduğu taksitleri satışın
                                taksitleri bittikten
                                sonra, iade öncesinde ödemiş olduğu taksitleri sayısı kadar ay daha alacak ve mevcut
                                borçlarından düşmüş
                                olacaktır.
                                Kart ile alınmış mal ve hizmetin iadesi durumunda SATICI, Banka ile yapmış olduğu
                                sözleşme gereği
                                TÜKETİCİ'ye nakit para ile ödeme yapamaz. SATICI, bir iade işlemi söz konusu olduğunda
                                ilgili yazılım
                                aracılığı ile iadesini yapacak olup, SATICI ilgili tutarı Banka'ya nakden veya mahsuben
                                ödemekle yükümlü
                                olduğundan yukarıda anlatmış olduğumuz prosedür gereğince TÜKETİCİ'ye nakit olarak ödeme
                                yapılamamaktadır.
                                Kredi kartına iade, SATICI'nın Banka'ya bedeli tek seferde ödemesinden sonra, Banka
                                tarafından yukarıdaki
                                prosedür gereğince yapılacaktır.
                                TÜKETİCİ, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.
                                b) Havale/EFT Ödeme Seçeneklerinde İade Prosedürü
                                İade, TÜKETİCİ'den banka hesap bilgileri istenerek, TÜKETİCİ'nin belirttiği hesaba
                                (hesabın fatura
                                adresindeki kişinin adına veya kullanıcı üyenin adına olması şarttır) havale ve EFT
                                şeklinde yapılacaktır.
                                SATICI bankaya ürün bedelinin tamamını tek seferde geri öder.
                                Havale/EFT yoluyla alınmış mal ve hizmetin iadesi durumunda SATICI, Banka ile yapmış
                                olduğu sözleşme
                                gereği TÜKETİCİ'ye nakit para ile ödeme yapamaz. SATICI, bir iade işlemi söz konusu
                                olduğunda ilgili
                                yazılım aracılığı ile iadesini yapacak olup, SATICI ilgili tutarı Banka'ya nakden veya
                                mahsuben ödemekle
                                yükümlü olduğundan yukarıda anlatmış olduğumuz prosedür gereğince TÜKETİCİ'ye nakit
                                olarak ödeme
                                yapılamamaktadır.
                                TÜKETİCİ, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.
                                c) Alışveriş Kredisi ile Ödeme Seçeneklerinde İade Prosedürü
                                İade, TÜKETİCİ'den banka hesap bilgileri istenerek,TÜKETİCİ'nin belirttiği hesaba
                                (hesabın fatura
                                adresindeki kişinin adına veya kullanıcı üyenin adına olması şarttır) havale ve EFT
                                şeklinde yapılacaktır.
                                SATICI bankaya ürün bedelinin tamamını tek seferde geri öder.
                                Kredi yoluyla alınmış mal ve hizmetin iadesi durumunda SATICI, Banka ile yapmış olduğu
                                sözleşme gereği
                                TÜKETİCİ'ye nakit para ile ödeme yapamaz. SATICI, bir iade işlemi söz konusu olduğunda
                                ilgili yazılım
                                aracılığı ile iadesini yapacak olup, SATICI ilgili tutarı Banka'ya nakden veya mahsuben
                                ödemekle yükümlü
                                olduğundan yukarıda anlatmış olduğumuz prosedür gereğince TÜKETİCİ'ye nakit olarak ödeme
                                yapılamamaktadır.
                                TÜKETİCİ, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.
                                3.5- Teslimat Şekli ve Adresi :
                                Teslimat Adresi : Esentepe mahallesi büyükdere caddesi no128 d blok hsbc genel müdürlüğü
                                dahili no 5154
                                Türkiye İstanbul / Türkiye
                                Teslim Edilecek Kişi: Recep Taşkın
                                Fatura Adresi : yunus emre mh 4012sk no:.8 AKYAZI Sakarya / Türkiye
                                Paketleme, kargo ve teslim masrafları TÜKETİCİ tarafından karşılanmaktadır. Kargo ücreti
                                0,00 -TL olup,
                                kargo fiyatı sipariş toplam tutarına eklenmektedir. Ürün bedeline dahil değildir.
                                Teslimat , anlaşmalı
                                kargo şirketi aracılığı ile, TÜKETİCİ'nin yukarıda belirtilen adresinde elden teslim
                                edilecektir. Teslim
                                anında TÜKETİCİ'nin adresinde bulunmaması durumunda dahi Firmamız edimini tam ve
                                eksiksiz olarak yerine
                                getirmiş olarak kabul edilecektir. Bu nedenle, TÜKETİCİ'nin ürünü geç teslim almasından
                                ve/veya hiç teslim
                                almamasından kaynaklanan zararlardan ve giderlerden SATICI sorumlu değildir. SATICI,
                                sözleşme konusu
                                ürünün sağlam, eksiksiz, siparişte belirtilen niteliklere uygun ve varsa garanti
                                belgeleri ve kullanım
                                kılavuzları ile teslim edilmesinden sorumludur.
                                3.6. Hızlı ve Kolay Alışveriş: Siparişin onaylanması sonrasında, "TÜKETİCİ" sipariş
                                onaylanma ekranında
                                hızlı ve kolay alışveriş bölümünde TÜKETİCİ "ONAY" sekmesini tıklaması ve müşterinin
                                sistemde kayıtlı cep
                                telefonuna gelen SMS doğrulama aktivasyon kodunu, 180 saniye içerisinde sitede yer alan
                                ilgili bölüme
                                girmesi halinde kargo firması, teslimat adresi, ödeme seçim ve bilgilerinin kendi
                                onayıyla "müşteri profil
                                bilgileri" altında kaydedilerek saklanmasını kabul eder. "TÜKETİCİ'NİN" rızası ile
                                kaydedilen ilgili
                                bilgiler "müşterinin profil bilgileri" altında saklanacak olup "TÜKETİCİ'NİN" talebi
                                durumunda bu bilgiler
                                istenildiğinde "müşteri profilinden" çıkartılır.
                                MADDE 4- CAYMA HAKKI
                                TÜKETİCİ , SATICI ile imzaladığı işbu Mesafeli Satış Sözleşmesi'nden 14 (ondört) gün
                                içinde herhangi bir
                                gerekçe göstermeksizin ve cezai şart ödemeksizin cayma hakkına sahiptir. Cayma hakkı
                                süresi, hizmet
                                ifasına ilişkin sözleşmelerde sözleşmenin kurulduğu gün; mal teslimine ilişkin
                                sözleşmelerde ise
                                TÜKETİCİ'nin veya TÜKETİCİ tarafından belirlenen üçüncü kişinin malı teslim aldığı gün
                                başlar. Ancak
                                TÜKETİCİ, sözleşmenin kurulmasından malın teslimine kadar olan süre içinde de cayma
                                hakkını kullanabilir.
                                Cayma hakkı süresinin belirlenmesinde;
                                a) Tek sipariş konusu olup ayrı ayrı teslim edilen mallarda, TÜKETİCİ'nin veya TÜKETİCİ
                                tarafından
                                belirlenen üçüncü kişinin son malı teslim aldığı gün,
                                b) Birden fazla parçadan oluşan mallarda, TÜKETİCİ'nin veya TÜKETİCİ tarafından
                                belirlenen üçüncü kişinin
                                son parçayı teslim aldığı gün,
                                c) Belirli bir süre boyunca malın düzenli tesliminin yapıldığı sözleşmelerde,
                                TÜKETİCİ'nin veya TÜKETİCİ
                                tarafından belirlenen üçüncü kişinin ilk malı teslim aldığı gün esas alınır. Cayma
                                bildiriminizi cayma
                                hakkı süresi dolmadan www.hepsiburada.com 'da yer alan kişisel üyelik sayfanızdaki kolay
                                iade seçeneği
                                üzerinden gerçekleştirebilirsiniz. Cayma hakkınız kapsamında öngörülen taşıyıcı sipariş
                                edilen ürünün
                                tarafınıza teslim edildiği kargo firması olup, www.hepsiburada.com 'da yer alan kişisel
                                üyelik
                                sayfanızdaki kolay iade seçeneğinde geri gönderime ilişkin detaylar açıklanmıştır.
                                Tüketici aşağıdaki sözleşmelerde cayma hakkını kullanamaz:
                                a) Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve SATICI veya
                                sağlayıcının
                                kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler.
                                b) Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara
                                ilişkin sözleşmeler.
                                c) Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine ilişkin
                                sözleşmeler.
                                ç) Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan
                                mallardan; iadesi
                                sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin sözleşmeler.
                                d) Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün
                                olmayan mallara
                                ilişkin sözleşmeler.
                                e) Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış
                                olması halinde
                                maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf malzemelerine ilişkin
                                sözleşmeler.
                                f) Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli
                                yayınların teslimine
                                ilişkin sözleşmeler.
                                g) Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba
                                kiralama,
                                yiyecek-içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş zamanın
                                değerlendirilmesine ilişkin
                                sözleşmeler.
                                ğ) Elektronik ortamda anında ifa edilen hizmetler veya TÜKETİCİ'ye anında teslim edilen
                                gayrimaddi mallara
                                ilişkin sözleşmeler.
                                h) Cayma hakkı süresi sona ermeden önce, TÜKETİCİ'nin onayı ile ifasına başlanan
                                hizmetlere ilişkin
                                sözleşmeler.
                                TÜKETİCİ'nin "Alışveriş Kredisi" ile ödeme seçeneğini seçmesi halinde, TÜKETİCİ,
                                Anında/Mesafeli Alışveriş
                                Kredisi Sözleşmesi'nden cayma hakkının, Banka ve TÜKETİCİ arasındaki Anında/Mesafeli
                                Alışveriş Kredisi
                                sözleşmesi kapsamında uygulanacağını kabul, beyan ve taahhüt eder. TÜKETİCİ'nin, SATICI
                                ile imzaladığı
                                işbu Mesafeli Satış Sözleşmesi'nden cayması, Banka ile arasındaki Anında/Mesafeli
                                Alışveriş Kredisi
                                Sözleşmesi'ni otomatikman SONA ERDİRMEYECEKTİR. TÜKETİCİ'nin, Anında/Mesafeli Alışveriş
                                Kredisi
                                Sözleşmesi'nden cayması için cayma talebini Anında/Mesafeli Alışveriş Kredisi
                                Sözleşmesi'nde belirtilen
                                süreler içerisinde, yine Anında/Mesafeli Alışveriş Kredisi Sözleşmesi'nde öngörülen
                                usule uygun olarak
                                kredi veren Banka'ya yöneltmesi gerekmektedir. Bu kapsamda, TÜKETİCİ tarafından Banka'ya
                                yapılması gereken
                                bildirimin hiç yapılmaması veya geç yapılması durumunda ya da Banka ile TÜKETİCİ
                                arasındaki kredi ilişkisi
                                ile ilgili Üye İşyeri'nin yani SATICI'nın hiçbir sorumluluğu doğmayacaktır.
                                MADDE 5- GENEL HÜKÜMLER
                                5.1- TÜKETİCİ, www.hepsiburada.com internet sitesinde sözleşme konusu ürüne ilişkin ön
                                bilgileri okuyup
                                bilgi sahibi olduğunu ve elektronik ortamda gerekli teyidi verdiğini beyan eder.
                                5.2- Ürün sözleşme tarihinden itibaren en geç 30 gün içerisinde teslim edilecektir.
                                Ürününün teslim
                                edilmesi anına kadar tüm sorumluluk SATICI'ya aittir.
                                5.3- Sözleşme konusu ürün, TÜKETİCİ'dan başka bir kişi/kuruluşa teslim edilecek ise,
                                teslim edilecek
                                kişi/kuruluşun teslimatı kabul etmemesinden SATICI sorumlu tutulamaz.
                                5.4- SATICI, sözleşme konusu ürünün sağlam, eksiksiz, siparişte belirtilen niteliklere
                                uygun ve varsa
                                garanti belgeleri ve kullanım kılavuzları ile teslim edilmesinden sorumludur.
                                5.5- Sözleşme konusu ürünün teslimatı için işbu sözleşmenin bedelinin TÜKETİCİ'nin
                                tercih ettiği ödeme
                                şekli ile ödenmiş olması şarttır. Herhangi bir nedenle ürün bedeli ödenmez veya banka
                                kayıtlarında iptal
                                edilir ise, SATICI ürünün teslimi yükümlülüğünden kurtulmuş kabul edilir.
                                5.6- Ürünün tesliminden sonra TÜKETİCİ'ya ait kredi kartının TÜKETİCİ'nin kusurundan
                                kaynaklanmayan bir
                                şekilde yetkisiz kişilerce haksız veya hukuka aykırı olarak kullanılması nedeni ile
                                ilgili banka veya
                                finans kuruluşun ürün bedelini SATICI'ya ödememesi halinde, TÜKETİCİ'nin kendisine
                                teslim edilmiş olması
                                kaydıyla ürünün SATICI'ya gönderilmesi zorunludur.
                                5.7- Garanti belgesi ile satılan ürünlerden olan veya olmayan ürünlerin ayıplı (arızalı,
                                bozuk vb.)
                                halinde veya garanti kapsamında ve şartları dahilinde arızalanması veya bozulması
                                halinde gerekli onarımın
                                yetkili servise yaptırılması için sözkonusu ürünler SATICI'ya gönderilebilir, bu
                                takdirde kargo giderleri
                                SATICI tarafından karşılanacaktır.
                                5.8- 385 sayılı vergi usul kanunu genel tebliği uyarınca iade işlemlerinin yapılabilmesi
                                için tarafınıza
                                göndermiş olduğumuz iade bölümü bulunan faturada ilgili bölümlerin eksiksiz olarak
                                doldurulması ve
                                imzalandıktan sonra tarafımıza ürün ile birlikte geri gönderilmesi gerekmektedir.
                                5.9- Satışı ilgili mevzuatlar gereği resmi merciler nezdinde gerçekleştirilecek resmi
                                işlemler ile
                                tamamlanması öngörülen ürünler için Ön Bilgilendirme Formu ve Mesafeli Satış Sözleşmesi
                                bir ön protokol
                                niteliğindedir. Bu ürünlerin toplam bedeli, ödeme şekli ilgili Kampanya Şartlarında
                                ve/veya Ürün
                                Açıklamalarında belirtilecek olup, bu bedele satışa ilişkin resmi işlemlerin
                                tamamlanması sırasında ortaya
                                çıkacak masraflar dahil değildir. Söz konusu masraflar TÜKETİCİ tarafından resmi
                                işlemlerin yerine
                                getirilmesi esnasında ödenecektir. Bu satışlar, toplam bedelin TÜKETİCİ tarafından
                                SATICI’ya ödenmesi ve
                                resmi merciler nezdinde resmi işlemlerin yerine getirilmesi ile tamamlanmış
                                sayılacaktır. Bu kapsamda
                                cayma hakkı, kargo / teslimat ve benzeri nitelikteki uygulama alanı bulunmayan hükümler
                                bu ürünler için
                                geçerli olmayacaktır.
                                MADDE 6- UYUŞMAZLIK VE YETKİLİ MAHKEME
                                İşbu sözleşme ile ilgili çıkacak ihtilaflarda; Türk Mahkemeleri yetkili olup;
                                uygulanacak hukuk Türk
                                Hukuku'dur.
                                Türkiye Cumhuriyeti sınırları içerisinde geçerli olmak üzere her yıl Gümrük ve ticaret
                                Bakanlığı
                                tarafından ilan edilen değere kadar olan ihtilaflar için TÜKETİCİ işleminin yapıldığı
                                veya TÜKETİCİ
                                ikametgahının bulunduğu yerdeki İl veya İlçe Tüketici Hakem Heyetleri,söz konusu değerin
                                üzerindeki
                                ihtilaflarda ise TÜKETİCİ işleminin yapıldığı veya TÜKETİCİ ikametgahının bulunduğu
                                yerdeki Tüketici
                                Mahkemeleri Yetkili olac</p>
                        </div>
                    </div>
                    <x-payment.cart-wrapper :basket="$basket"  :buttonText="'Tamamla'"/>
                </div>
            @if(!$iyzico_form)
            </form>
            @endif
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ url('assets/js/tulpar-card.js') }}?_v={{ env('ASSETS_VER') }}{{ time() }}"></script>
    <script>
    const radio1 = document.getElementById("creditCardRadio");
    const radio2 = document.getElementById("transfer");
console.log(radio1)
    radio1.addEventListener("click", () => {
        console.log("asd")
        radio2.checked = false;
        radio1.checked=true;
        console.log(radio1.checked)
    });

    radio2.addEventListener("click", () => {
        radio1.checked = false;
        radio2.checked = true;
    });

    TulparCard.init('.card-input.cardnumber','.card-input.expirationdate','.card-input.securitycode')
</script>
@endsection
