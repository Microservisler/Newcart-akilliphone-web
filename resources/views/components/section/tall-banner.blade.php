

<?php
$index = isset($index)?(int)$index:0;
if($items){

foreach($items as $item){
    if($item['orderNumber']!=$index) continue; ?>
<section class="banner-area section-padding" id="banner-area">
    <div class="container">
        <a href="{{$item['slug']}}">
            <img class="lazyload fluid-img" data-src="{{ $item['desktopImage'] }}"
                 data-srcset="{{ $item['desktopImage'] }} 800w, {{ $item['mobileImage'] }} 320w"
                 sizes="(min-width: 768px) 400px,160px" width="1110" height="120" alt="Banner">
        </a>
    </div>
</section>
<?php }
}?>
