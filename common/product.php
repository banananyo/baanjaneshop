<div class="row row-eq-height">
    <div class="col-12">
        <div class="header-title">Hotest Product</div>
    </div>
</div>
<?php $feature_class = "col-12 col-sm-6 col-md-3 col-lg-3"; ?>
<div class="row row-eq-height">
    <?php 
    $p_res = $conn->query("SELECT p.id AS pid, p.name AS pname, p.description AS pdes, p.alt AS alt, p.src AS src, p.price AS price,
    p.sale_price AS sale_price, p.in_stock AS stock FROM product AS p ORDER BY id DESC LIMIT 8");
    while($prod_row = $p_res->fetch_assoc()) {?>
        <div class="<?php echo $feature_class; ?>">
            <?php 
            include('common/product_card.php');
            ?>
        </div>
    <?php
    } ?>
</div>
</div>