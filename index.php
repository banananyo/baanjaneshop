<html>
<head>
<title>baanjane.com</title>
<script src="thirdparty/jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="thirdparty/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="thirdparty/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="thirdparty/swiper/css/swiper.min.css">
<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
    <div class="i-bar-wrapper">
        <div class="i-bar">
            
        </div>
    </div>
    <div class="top-nav" >
        <div class="container">
            <div class="row" >
                <div class="col-sm-12">
                    <?php include('topnav.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="header-section" >
        <div class="container">
            <div class="row" >
                <div class="col-sm-12">
                    <?php include('header.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-wrapper" >
        <div class="container" >
            <div class="row" >
                <div class="col-sm-12">
                    <?php include('main-menu.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-banner-wrapper" >
        <?php include('swiper.php'); ?>
    </div>
    <hr />
    <div class="product-feature" >
        <div class="container" >
            <div class="row" >
                <div class="col-sm-12">
                    <?php include('feature.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="product-promotion" >
        <div class="container" >
            <div class="row" >
                <div class="col-sm-12">
                    <?php include('promotion.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="product-wrapper" >
        <div class="container" >
            <div class="row" >
                <div class="col-sm-12">
                    <?php include('product.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-menu" >
            <div class="container " >
                <div class="row " >
                    <div class="col-sm-12 ">
                        footer-menu
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-credit" >
            <div class="container ">
                <div class="row " >
                    <div class="col-sm-12 ">
                        <?php include('footer-credit.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="thirdparty/popper/popper.min.js"></script> 
    <script src="thirdparty/bootstrap/js/bootstrap.min.js"></script>
    <script src="thirdparty/swiper/js/swiper.min.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                    },
            },

            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },

            effect: 'slide',
        });
    </script>
</body>
</html>