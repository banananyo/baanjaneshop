<div class="row row-eq-height">
    <div class="col-12">
        <div class="header-title">Hotest Product</div>
    </div>
</div>
<?php $feature_class = "col-12 col-sm-6 col-md-3 col-lg-3"; ?>
<div class="row row-eq-height">
    <?php 
    $products = array("Pleaseme-lip-mattedee-no-01",
    "Pleaseme-lip-mattedee-no-02",
    "Pleaseme-lip-mattedee-no-03",
    "Pleaseme-lip-mattedee-no-04",
    "Pleaseme-lip-mattedee-no-05",
    "Pleaseme-lip-mattedee-no-06",
    "Pleaseme-lip-mattedee-no-07",
    "Pleaseme-lip-mattedee-no-08");
    $i=0; while($i < count($products)) {?>
        <div class="<?php echo $feature_class; ?>">
            <div class="product-card-wrapper">
                <div class="product-card">
                    <a class="product-pre-image-wrapper" href="#">
                        <img src="images/product/<?php echo $products[$i]; ?>.jpg" alt="<?php echo $products[$i]; ?>" class="product-pre-image" />
                    </a>
                    <div class="product-pre-title"><a href="#"><?php echo $products[$i]; ?></a></div>
                    <div class="product-pre-price">฿599</div>
                </div>
                <div class="product-pre-add-to-cart"><div class="product-pre-add-to-cart-text">หยิบใส่ตะกร้า</div></div>
            </div>
        </div>
    <?php
        $i++; 
    } ?>
</div>
</div>