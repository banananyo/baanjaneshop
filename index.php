<html>
<head>
<title>baanjane.com</title>
<?php include('common/headmeta.php'); ?>
</head>
<body>
    <?php include('common/spinner.php'); ?>
    <div id="content">
        <?php include('common/top-section.php'); ?>
    
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
    
        <?php include('common/footer.php'); ?>
    </div>
    <?php include('common/bottom_script.php'); ?>
    <?php include('common/swiper_script.php'); ?>
</body>
</html>