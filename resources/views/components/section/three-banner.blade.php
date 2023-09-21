<?php
if($items){?>
<div class="three-category-block">
    <?php foreach($items as $item){?>

        <img class="lazyload fluid-img" data-srcset="{{ $item['desktopImage'] }} 1x, {{ $item['desktopImage'] }} 2x" data-src="{{ $item['mobileImage'] }}" >

    <?php }?>
</div>
<?php } ?>
