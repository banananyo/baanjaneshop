
<script src="module/lvl/core.js"></script>
<div class="content-wrapper" ng-controller="add as controller">

<section class="content">
<form action="" method="post"  enctype="multipart/form-data">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">เพิ่มระดับตัวแทน</h3>
    </div>
    <div class="box-body">
     <?php 
        if(isset($_POST['button'])  && $_POST['button'] == "confirm") {
            $target_dir = "uploads/";
            $newfilename= date('dmYHis').".jpg";                    
            $target_file = $target_dir . basename($newfilename);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { 
                $name = $_POST['name'];
                $description = $_POST['description'];
                $image =  basename($newfilename);
                    
                Connect::conn()->insert("lvl", [
                    'name' => $name,
                    'description'=> $description,
                    'src' => $image
                ]);
                if(Connect::conn()->has("lvl", ['name' => $name])) {
                    $resultTxt = "สำเร็จ";
                }else {
                    $resultTxt = "ไม่สำเร็จ";
                }
            } else {
                $resultTxt = "ไม่สำเร็จ";
            }
                        
                    ?>

                    <div class="is-center">
                        <h4>เพิ่มระดับตัวแทน<?php echo $resultTxt; ?> </h4>
                          <a href="index.php?module=lvl&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
                    </div>
            
            <?php

        }else {
    ?>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">ชื่อระดับตัวแทน</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control" id="name" placeholder="ชื่อระดับตัวแทน" ng-model="controller.field.name" >
            </div>
        </div>

        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">รายละเอียด</label>
            <div class="col-sm-4">
                <textarea type="text" name="description" class="form-control" id="description" placeholder="รายละเอียด" ng-model="controller.field.description" ></textarea>
            </div>
        </div>
        
        <div class="form-group  col-sm-12">
                <label for="username" class="col-sm-2 control-label">รูป</label>
                <div class="col-sm-4">
                    <img ng-src="{{controller.field.image}}" style="max-width: 150px;" class="img-responsive" alt=""><br />
                    <input type="file" accept="image/*" app-filereader name="image" id="image" ng-model="controller.field.image">
                </div>
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