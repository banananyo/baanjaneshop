<?php
if($first_page_to_show > 1){
    ?>
        <a onclick="goPage(<?php echo 1; ?>)" ><div class="clickable paging-button-label btn-bj">หน้าแรก</div></a>
        <a onclick="goPage(<?php echo $current_page-1; ?>)" ><div class="clickable paging-button-label btn-bj">หน้าก่อน</div></a>
    <?php
}
for($i=$first_page_to_show ; $i <= $last_page_to_show ; $i++){
?>
    <a onclick="goPage(<?php echo $i; ?>)" ><div class="clickable paging-button btn-bj <?php echo ($i == $current_page) ? 'active':'' ?>"><?php echo $i; ?></div></a>
<?php
}
if($last_page_to_show<$last_page){
    ?>
        <a onclick="goPage(<?php echo $current_page+1; ?>)" ><div class="clickable paging-button-label btn-bj">หน้าถัดไป</div></a>
        <a onclick="goPage(<?php echo $last_page; ?>)" ><div class="clickable paging-button-label btn-bj">หน้าสุดท้าย</div></a>
    <?php
}
?>