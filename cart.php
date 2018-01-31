<?php require_once('common/sessionCheck.php'); ?>
<html>
<head>
<title>ตะกร้าสินค้า - baanjane.com</title>
<?php include('common/headmeta.php'); ?>
</head>
<body>
    <?php include('common/spinner.php'); ?>
    <div id="content">
        <?php include('common/top-section.php'); ?>
        <div class="agent-search-wrapper" >
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-12">
                        <div class="header-title th">ตะกร้าสินค้า</div>
                    </div>
                </div>
                <div class="row row-eq-height justify-content-center">
                    <?php if (!isset($_SESSION['bj_user'])) { echo '<span class="text-danger">ทำการเข้าสู่ระบบหรือสมัครสมาชิกเพื่อใช้งานระบบตะกร้า</span>' ;}?>
				</div>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12">
                    <div class="content-box"></div>
                </div>
            </div>
        </div>
    
        <?php include('common/footer.php'); ?>
    </div>
    <?php include('common/bottom_script.php'); ?>
    <?php include('common/swiper_script.php'); ?>
</body>
</html>