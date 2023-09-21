@extends('layouts.default')
@section('head')
    <title>Adres Bilgilerim - AkıllıPhone</title>
    <link rel="stylesheet" href="{{ url('assets/css/profile/address/main.css') }}">
@endsection
@section('content')

    <section class="profile section-padding mx-24">
        <div class="container">
            <div class="section-title">Hesabım</div>
            <div class="profile-layout">
                <div class="left">
                    <div class="user-info">
                        <div class="shortened"><?php echo session('userNameIcon'); ?></div>
                        <div class="fullname"><?php echo session('userName'); ?></div>
                    </div>
                    <div>
                        <a href="order" class="left-section ">
                            <div class="left-section-title">
                                <img src="../assets/images/icons/order.svg" alt="">
                                Siparişlerim
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
                            </svg>
                        </a>
                        <a href="coupons" class="left-section" >
                            <div class="left-section-title">
                                <img src="../assets/images/icons/coupon.svg" alt="">
                                Kuponlarım
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
                            </svg>
                        </a>
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
                        <a href="payment"  class="left-section">
                            <div class="left-section-title">
                                <img src="../assets/images/icons/card.svg" alt="">
                                Harici Ödeme
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847"
                                 viewBox="0 0 5.214 8.847">
                                <path id="Path_12527" data-name="Path 12527"
                                      d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z"
                                      transform="translate(11.054 10.947) rotate(180)" opacity="0.492" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="right">
                    <div class="profile-infos">
                        <div class="top">
                            <div class="title">Adreslerim</div>
                        </div>
                        <a href="{{route('profile.address.add')}}" class="new-address-btn">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zm0 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 3.5a.5.5 0 0 1 .5.5v2.5H11a.5.5 0 0 1 .492.41L11.5 8a.5.5 0 0 1-.5.5H8.5V11a.5.5 0 0 1-.41.492L8 11.5a.5.5 0 0 1-.5-.5V8.5H5a.5.5 0 0 1-.492-.41L4.5 8a.5.5 0 0 1 .5-.5h2.5V5a.5.5 0 0 1 .41-.492z" fill="#1A9AFC" fill-rule="evenodd"></path></svg>
                            Yeni adres ekle
                        </a>
                        <div class="address-list">
                            <div class="address">
                                <div class="address-header">
                                    Ofis
                                </div>
                                <div class="address-body">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam suscipit dolorem assumenda itaque! Voluptatum repellendus a neque, nihil delectus vitae!
                                </div>
                                <div class="address-footer">
                                    <a class="edit-address" href="./editaddress">Düzenle</a>
                                    <a class="delete-address" href="#">Sil</a>
                                </div>
                            </div>
                        </div>
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

@endsection
