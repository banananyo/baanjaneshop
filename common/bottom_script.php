<script src="thirdparty/popper/popper.min.js"></script> 
<!-- <script src="thirdparty/spinjs/spin.js"></script>  -->
<script src="thirdparty/bootstrap/js/bootstrap.min.js"></script>
<script src="thirdparty/swiper/js/swiper.min.js"></script>
<script>
    $('.show-on-scroll-offset').hide();
    // spinner
    $('#spinner').show();
    $('#content').hide();
    $(function () {
        // spinner
        $('#spinner').fadeOut(1500).remove();
        $('#content').fadeIn(1000);
        // tooltip
        $('[data-toggle="tooltip"]').tooltip({
            template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
        });

        // nav sticky
        $(window).bind('scroll', function () {
            console.log($(window).scrollTop());
            if ($(window).scrollTop() > 160) {
                $('.main-menu-wrapper').addClass('fixed-scroll');
                $('.show-on-scroll-offset').show();
            } else {
                $('.main-menu-wrapper').removeClass('fixed-scroll');
                $('.show-on-scroll-offset').hide();
            }
        });

        
    });
    
</script>