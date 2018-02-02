<?php require_once('common/sessionCheck.php'); ?>
<html>
<head>
<title>ค้นหาสินค้า - baanjane.com</title>
<?php include('common/headmeta.php'); ?>
</head>
<body>
    <?php include('common/spinner.php'); ?>
    <?php
        $max_per_page = 16;
        $max_buttons = 5;
        $min_max_out = 2;
        $annouceMessage = '';
        $q = isset($_GET['q']) ? $_GET['q']:null;
        $current_page = (isset($_GET['page']) && $_GET['page'] != '0') ? $_GET['page'] : 1; // begin at 1 but in sql is begin 0

        $sql = "SELECT p.id AS pid, p.name AS pname, p.description AS pdes, p.alt AS alt, p.src AS src, p.price AS price,
                p.sale_price AS sale_price, p.in_stock AS stock, c.name AS cname FROM product AS p, category AS c WHERE c.id=p.category_id";

        if ($q != null) {
            $sql .= " AND (p.name like '%$q%' OR c.name like '%$q%')";
            $annouceMessage .= " \"$q\" ";
        }

        $limit=" LIMIT 0, $max_per_page";
        if($current_page != null){
            $limit = " LIMIT ".abs((intval($current_page)-1) * $max_per_page).", $max_per_page";
        }

        $pre_query = $conn->query($sql);
        $count_prod_to_show = mysqli_num_rows($pre_query);

        $last_page = ceil($count_prod_to_show / $max_per_page);
        $last_page_to_show = $last_page;
        $first_page_to_show = 1;
        $isOverMaxButton = ($last_page > $max_buttons);
    ?>
    <div id="content">
        <?php include('common/top-section.php'); ?>
        <div class="agent-search-wrapper" >
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-12">
                        <div class="header-title th">ค้นหาสินค้า</div>
                    </div>
                </div>
                <form class="row row-eq-height justify-content-center" method="GET" action="find_product.php">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-10">
                        <div class="form-group row ">
                            <label for="agent_name" class="col-sm-2 col-form-label">คำค้น</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="q" placeholder="คำค้นหา สินค้า หมวดหมู่..." value="<?php echo $q != null ? $q : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-2">
                        <button class="btn btn-bj btn-full" type="submit">
                            ค้นหาเลย
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12">
                    <div class="content-box"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12 d-flex justify-content-center">
                    <?php 
                        if ($annouceMessage != '') {
                            echo '<h3>ผลการค้นหาจากคำค้น '.$annouceMessage.'</h3>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                
                <?php 

                $sql .= $limit;
                // print_r($sql);
                $prod_query = $conn->query($sql);
                while($prod_row = $prod_query->fetch_assoc()){?>
                    
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <?php 
                    include('common/product_card.php');
                    ?>

                    </div> <!-- col -->
                    
                <?php } ?>
                
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12 d-flex justify-content-center">
                    <?php require_once('common/paging.php'); ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12 d-flex justify-content-center">
                    <?php require_once('common/pagingInfo.php'); ?>
                </div>
            </div>
        </div>
    
        <?php include('common/footer.php'); ?>
    </div>
    <?php include('common/bottom_script.php'); ?>
    <?php include('common/swiper_script.php'); ?>
</body>
</html>