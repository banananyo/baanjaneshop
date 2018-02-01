<div class="topnav d-flex flex-row justify-content-between align-items-stretch">
    <div class="d-flex flex-row contact-top">
        <span>
            <a href="#" class="icon-link ">
                <span><i class="fa fa-facebook-square icon facebook-icon" aria-hidden="true"></i></span>
            </a>
        </span>
        <span class="gap"></span>
        <span>
            <a href="tel: 0811111111" class="icon-link ">
                <span><i class="fa fa-phone-square icon phone-icon" aria-hidden="true"></i></span>
                <span>&nbsp;</span><span class="underline-hover">0811111111</span>
            </a>
        </span>
        <span class="gap"></span>
        <span>
            <a href="#" class="icon-link text-secondary">
                <span><img src="images/icon/line.png" class="icon line-icon"/></span>
                <span>&nbsp;@</span><span class="underline-hover">baanjane.com</span>
            </a>
        </span>
    </div>
    <div class="d-flex flex-row">
        <span class="dropdown">
            <a href="#" class="icon-link "
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="payment-dropdown">
                <div class="d-flex flex-row align-items-center">
                    <span>&nbsp;</span><span class="underline-hover">วิธีการชำระสินค้า</span><span>&nbsp;</span>
                    <span ><i class="fa fa-chevron-down icon down-icon" aria-hidden="true"></i></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-wrapper" aria-labelledby="payment-dropdown">
                <a class="dropdown-item text-secondary" href="howtopay.php">วิธีการชำระสินค้า</a>
                <a class="dropdown-item text-secondary" href="transfer_report.php">แจ้งชำระเงิน</a>
            </div>
        </span>
        <span >
            <span class="line-sep text-secondary"></span>
        </span>
        <span class="dropdown">
            <a href="#" class="icon-link "
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="help-dropdown">
                <div class="d-flex flex-row align-items-center">
                    <span class="underline-hover">ช่วยเหลือ</span><span>&nbsp;</span>
                    <span ><i class="fa fa-chevron-down icon down-icon" aria-hidden="true"></i></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-wrapper" aria-labelledby="help-dropdown">
                <a class="dropdown-item text-secondary" href="order.php">วิธีสั่งซื้อ</a>
                <a class="dropdown-item text-secondary" href="send.php">การจัดส่ง</a>
            </div>
        </span>
        <span >
            <span class="line-sep text-secondary"></span>
        </span>
        <?php if (!isset($_SESSION['bj_user'])) {?>
            <span>
                <a href="auth.php" class="icon-link">
                    <span class="underline-hover">ลงทะเบียน / เข้าสู่ระบบ</span>
                </a>
            </span>
        <?php } else { ?>
            <span>
                <a href="common/logout.php" class="icon-link">
                    <span class="underline-hover">ออกจากระบบ</span>
                </a>
            </span>
        <?php } ?>
    </div>
</div>