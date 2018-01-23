<div class="row row-eq-height">
    <div class="col-12">
        <div class="header-title">Promotion</div>
    </div>
</div>
<div class="row row-eq-height">
<?php $feature_class = "col-12 col-sm-6 col-md-3 col-lg-3 col-marginbot"; 
    $features = array("01.jpg", "02.jpg", "03.jpg", "04.jpg", "05.jpg", "06.jpg", "07.jpg", "08.jpg");
    $i=0;
    while($i < count($features)) {?>
        <div class="<?php echo $feature_class; ?>">
            <a class="feature-card">
                <img class="feature-image" src="images/feature/<?php echo $features[$i]?>" alt="<?php echo $features[$i]?>">
            </a>
        </div>
        <?php 
        $i++;
    } ?>
</div>