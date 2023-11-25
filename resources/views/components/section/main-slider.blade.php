<section class="section-padding mx-24" style="overflow:hidden;">
    <div class="home-slider owl-carousel owl-theme">
            @foreach ($items as $i=>$item)
                <?php
                $bgColor = $item['bgColor']?$item['bgColor']:'#FFFFFF';
?>
                <div class="slider-wrapper slider-back-{{ $i }}" style="background-color: {{ $bgColor }}"  data-dot="<img src='{{ $item['thumb'] }}'/>">
                    <div class="container">
                        <div class="content">
                            <div class="product-name">{{ $item['title'] }}</div>
                            <a class="product-link" href="{{ $item['slug'] }}">Acele et kaçırma</a>
{{--                            <span class="share-btn">--}}
{{--                            <img width="17" height="22" src="assets/images/svg/share-btn.svg" alt="">--}}
{{--                            <ul class="share-links">--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="share-link">--}}
{{--                                        <div class="icon"></div>--}}
{{--                                        <div class="name">Whatsapp'dan paylaş</div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="share-link">--}}
{{--                                        <div class="icon"></div>--}}
{{--                                        <div class="name">Facebook'ta paylaş</div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#" class="share-link">--}}
{{--                                        <div class="icon"></div>--}}
{{--                                        <div class="name">Twitter'da paylaş</div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </span>--}}
                        </div>
                        <div class="product-img">
                            <img class="fluid-img" width="1110" height="390" src="{{ $item['desktopImage'] }}"
                                 srcset="{{ $item['desktopImage'] }} 800w, {{ $item['mobileImage'] }} 320w"
                                 sizes="(min-width: 768px) 400px,160px" alt="">
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</section>
