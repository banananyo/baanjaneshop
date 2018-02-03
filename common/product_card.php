<?php 
$sale = false;
if ($prod_row['sale_price']>0) {
    $sale = true;
}
?>
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
    <div class="product-card-wrapper">
        <div class="product-card">
            <a class="product-pre-image-wrapper clickable" onclick="goProd({ p: <?php echo $prod_row['pid'];?>})">
                <img src="<?php echo $prod_row['src']; ?>" alt="<?php echo $prod_row['alt']; ?>" class="product-pre-image" />
            </a>
            <div class="product-pre-title clickable"><a onclick="goProd({ p: <?php echo $prod_row['pid'];?>})"><?php echo $prod_row['pname']; ?></a></div>
            <div class="product-pre-price <?php echo $sale ? 'sale':''; ?>"><?php echo $prod_row['price']; ?> THB</div>
            <?php echo $sale ? '<div class="product-pre-price">'.$prod_row['sale_price'].' THB</div>' : '';?>
        </div>
        <div class="product-pre-add-to-cart" 
            onclick="
                <?php 
                if (isset($_SESSION['bj_user'])) {?>
                    addToCart('<?php echo $prod_row['pid']?>')<?php 
                } else {?>
                    alert('กรุณาทำการเข้าสู่ระบบก่อนที่จำดำเนินการ')<?php 
                } 
                ?>
            ">
            <div class="product-pre-add-to-cart-text">หยิบใส่ตะกร้า</div>
        </div>
    </div>
</div>