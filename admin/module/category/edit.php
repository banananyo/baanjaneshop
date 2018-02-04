


<?php
    if(!isset($_GET['id'])) {
        exit("Access Denied");
    }
    $id = $_GET['id'];
    $row = Connect::conn()->get("category","*",['id' => $_GET['id']]);
?>
<script src="module/member/core.js"></script>
<div class="content-wrapper" ng-controller="edit as controller">

<section class="content">
<form action="" method="post"  enctype="multipart/form-data">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">แก้ไขกลุ่ม</h3>
    </div>
    <div class="box-body">
     <?php 
        if(isset($_POST['button'])  && $_POST['button'] == "confirm") {
            $name = $_POST['name'];
            Connect::conn()->update("category", [
                'name' => $name
            ],['id' => $_GET['id']]);
            if(Connect::conn()->has("category", [
                'name' => $name,
                ])) {
                $resultTxt = "สำเร็จ";
            }else {
                $resultTxt = "ไม่สำเร็จ";
            };
            ?>

            <div class="is-center">
                <h4>แก้ไขกลุ่ม<?php echo $resultTxt; ?> </h4>
                    <a href="index.php?module=category&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
            </div>

            <?php

        }else {
    ?>
     <div ng-init="controller.field.name = '<?php echo $row['name'] ?>';"></div>

    <div class="form-group  col-sm-12">
        <label for="username" class="col-sm-2 control-label">ชื่อกลุ่ม</label>
        <div class="col-sm-4">
            <input type="text" name="name" class="form-control" id="name" placeholder="ชื่อกลุ่ม" ng-model="controller.field.name" >
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" name="button" value="confirm" ng-disabled="controller.check() == false" class="btn btn-default btn-info">ตกลง</button> 
        <div class="alert alert-danger is-hidden" id="LOGIN_ERR" style="margin-top: 2rem;" role="alert">
            กรอกข้อมูลให้ครบถ้วน
        </div>
    </div>
        <? } ?>

  </div>
  </form>

</section>

</div>