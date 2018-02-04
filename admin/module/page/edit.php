


<?php
    if(!isset($_GET['id'])) {
        exit("Access Denied");
    }
    $id = $_GET['id'];
    $row = Connect::conn()->get("page_content","*",['id' => $_GET['id']]);
?>
<script src="module/member/core.js"></script>
<script src="ckeditor/ckeditor.js"></script>

<div class="content-wrapper" ng-controller="edit as controller">

<section class="content">
<form action="" method="post"  enctype="multipart/form-data">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">แก้ไขหน้าเสริม</h3>
    </div>
    <div class="box-body">
     <?php 
        if(isset($_POST['button'])  && $_POST['button'] == "confirm") {
            $name = $_POST['name'];
            $data = $_POST['data'];
            Connect::conn()->update("page_content", [
                'name' => $name,
                'content' => $data
            ],['id' => $_GET['id']]);
            if(Connect::conn()->has("page_content", [
                'name' => $name,
                'content' => $data
                ])) {
                $resultTxt = "สำเร็จ";
            }else {
                $resultTxt = "ไม่สำเร็จ";
            };
            ?>

            <div class="is-center">
                <h4>แก้ไขหน้าเสริม<?php echo $resultTxt; ?> </h4>
                    <a href="index.php?module=page&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
            </div>

            <?php

        }else {
    ?>
     <div ng-init="controller.field.name = '<?php echo $row['name'] ?>';
     "></div>

     <div class="form-group  col-sm-12">
     <label for="username" class="col-sm-2 control-label">หัวข้อ</label>
     <div class="col-sm-6">
         <input type="text" name="name" class="form-control" id="name" placeholder="หัวข้อ" ng-model="controller.field.name" >
     </div>
 </div>

 <div class="form-group  col-sm-12">
     <label for="username" class="col-sm-2 control-label">รายละเอียด</label>
     <div class="col-sm-10">
         <textarea type="text" name="data" class="form-control" id="data" placeholder="รายละเอียด" >
            <?=$row['content']?>
         </textarea>
     </div>
     <script>
         let editor = CKEDITOR.replace('data', {
             language: 'th',
             filebrowserImageBrowseUrl:'kcfinder/browse.php?opener=ckeditor&type=images',
             filebrowserImageUploadUrl:'kcfinder/upload.php?opener=ckeditor&type=images'

         } );

     </script>
     
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
<script src="ckeditor/ckeditor.js"></script>