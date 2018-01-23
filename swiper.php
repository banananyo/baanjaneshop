<?php $sliders = array("03.jpg", "01.jpg", "02.jpg");?>
<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php $i=0; while($i < count($sliders)) { ?>
            <div class="swiper-slide"><img src="images/slider/<?php echo $sliders[$i]; ?>" alt="<?php echo $sliders[$i]; ?>" class="slider-image"></div>
        <?php $i++; } ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
 
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev">
        <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i> -->
    </div>
    <div class="swiper-button-next">
        <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
    </div>
 
    <!-- If we need scrollbar -->
    <!-- <div class="swiper-scrollbar"></div> -->
</div>