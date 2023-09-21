<?php
$user=session('userInfo');
?>
<div class="left">
    <div class="user-info">
        <div class="shortened"><?php echo session('userNameIcon'); ?></div>
        <div class="fullname"><?php echo $user['data']['firstName'] ?></div>
    </div>
    <div>
        <a href="{{ route('profile.orders') }}" class="left-section ">
            <div class="left-section-title">
                <img src="../assets/images/icons/order.svg" alt="">
                Siparişlerim
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
            </svg>
        </a>
        <a href="{{ route('profile.coupons') }}" class="left-section" active>
            <div class="left-section-title">
                <img src="../assets/images/icons/coupon.svg" alt="">
                Kuponlarım
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
            </svg>
        </a>
        <a href="{{ route('profile.favorites') }}" class="left-section">
            <div class="left-section-title">
                <img src="../assets/images/icons/favorite.svg" alt="">
                Favorilerim / Listelerim
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
            </svg>
        </a>
        <a href="{{ route('profile.comments') }}" class="left-section ">
            <div class="left-section-title">
                <img src="../assets/images/icons/comment.svg" alt="">
                Yorumlarım
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
            </svg>
        </a>
        <a href="{{ route('profile.informations') }}" class="left-section">
            <div class="left-section-title">
                <img src="../assets/images/icons/info.svg" alt="">
                Üyelik Bilgilerim
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
            </svg>
        </a>
        <a href="{{ route('profile.address') }}" class="left-section">
            <div class="left-section-title">
                <img src="../assets/images/icons/address.svg" alt="">
                Adres Bilgilerim
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="5.214" height="8.847" viewBox="0 0 5.214 8.847">
                <path id="Path_12527" data-name="Path 12527" d="M11.054,2.891l-.8-.791L5.84,6.523l4.423,4.423.791-.791L7.422,6.523Z" transform="translate(11.054 10.947) rotate(180)" opacity="0.492"/>
            </svg>
        </a>
        <a href="{{ route('profile.payments') }}"  class="left-section">
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
