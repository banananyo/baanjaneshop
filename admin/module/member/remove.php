
<?php
    if(!isset($_GET['id'])) {
        exit("Access Denied");
    }
    $id = $_GET['id'];
    Connect::conn()->delete('member',['id' => $id]);
    if(!Connect::conn()->has('member',['id' => $id])) {
        $resultTxt = "สำเร็จ";
    }else {
        $resultTxt = "ไม่สำเร็จ";
    }
?>
<script src="module/member/core.js"></script>
<div class="content-wrapper" ng-controller="edit as controller">

<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">ลบสมาชิก</h3>
    </div>
    <div class="box-body">
    <?php 
    
?>

<div class="is-center">
    <h4>ลบสมาชิก<?php echo $resultTxt; ?> </h4>
      <a href="index.php?module=member&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
</div>

  </div>

</section>

</div>