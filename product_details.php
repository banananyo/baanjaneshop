<?php require_once('common/sessionCheck.php'); ?>
<html>
<head>
<?php
require_once('db/connect.php');
$p = isset($_GET['p']) ? $_GET['p']:null;
$p_res = $conn->query("SELECT * FROM product WHERE id=$p");
if ($row = $p_res->fetch_assoc()) {
    $p = $row;
} else {
    $p = null;
}
?>
<title><?php echo $p['name']; ?> - baanjane.com</title>
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
                        <div class="product-title th"><?php echo $p['name']; ?></div>
                    </div>
                </div>
                <div class="row row-eq-height justify-content-center">
                    
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <img src="<?php echo $p['src']; ?>" alt="<?php echo $p['name']; ?>" class="product-image" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="prod-desc">
                                    <?php echo $p['description']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                        <table class="table table-stripped">
                            <tbody>
                                <tr>
                                    <td>ราคา</td>
                                    <td><?php echo $p['price']?> THB</td>
                                </tr>
                                <tr>
                                    <td>ราคาลด</td>
                                    <td><?php echo $p['sale_price']?> THB</td>
                                </tr>
                                <tr>
                                    <td>สินค้าในสต็อก</td>
                                    <td><?php echo $p['in_stock']?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn-bj clickable" 
                                            onclick="
                                            <?php if (isset($_SESSION['bj_user'])) {?>
                                                    addToCart('<?php echo $prod_row['pid']?>')<?php 
                                                } else {?>
                                                    alert('กรุณาทำการเข้าสู่ระบบก่อนที่จำดำเนินการ')<?php 
                                                } ?>"
                                        >เพิ่มลงในตะกร้า</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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