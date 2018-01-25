<script src="thirdparty/popper/popper.min.js"></script> 
<!-- <script src="thirdparty/spinjs/spin.js"></script>  -->
<script src="thirdparty/bootstrap/js/bootstrap.min.js"></script>
<script src="thirdparty/swiper/js/swiper.min.js"></script>
<script>
    var checkScroll = function() {
        if ($(window).scrollTop() > 160) {
            if(!$('.main-menu').hasClass( "fixed-scroll" )){
                $('.main-menu').addClass('fixed-scroll').hide().promise().done(function() {$('.main-menu').fadeIn(500);});
            }
            $('.show-on-scroll-offset').show();
        } else {
            $('.main-menu').removeClass('fixed-scroll');
            $('.show-on-scroll-offset').hide();
        }
    }
    console.log('bottomscript');
    $('.show-on-scroll-offset').hide();
    // spinner
    $(function () {
        checkScroll();
        // spinner
        $('#spinner').fadeOut(500);
        // tooltip
        $('[data-toggle="tooltip"]').tooltip({
            template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });

        // nav sticky
        $(window).bind('scroll', function () {
            // console.log($(window).scrollTop());
            checkScroll();
        });

        
    });
    
</script>