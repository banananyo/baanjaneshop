<?php 
if($last_page > 0) {?>
    หน้าที่ <?php echo $current_page; ?> จาก <?php echo $last_page; ?> 
    หน้า  <?php 
    if($isOverMaxButton){
        $last_page_to_show = ($current_page + $min_max_out);
        $first_page_to_show = ($current_page - $min_max_out);
        if($first_page_to_show < 1){
            $last_page_to_show += (1-$first_page_to_show);
            $first_page_to_show = 1;
        }
        else if($last_page_to_show > $last_page) {
            $first_page_to_show -= ($last_page_to_show - $last_page);
            $last_page_to_show = $last_page;
        }
    }
} else {
    echo 'ไม่พบรายการที่ค้นหา';
}
?>