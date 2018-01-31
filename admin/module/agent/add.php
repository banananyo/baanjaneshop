
<script src="module/agent/core.js"></script>
<div class="content-wrapper" ng-controller="add as controller">

<section class="content">
<form action="" method="post"  enctype="multipart/form-data">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">เพิ่มตัวแทน</h3>
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
                $code = $_POST['code'];
                $fb = $_POST['fb'];
                $image =  basename($newfilename);
                $tel = $_POST['tel'];
                $line = $_POST['line'];
                $lvl_id = $_POST['lvl_id'];
                $district = $_POST['district'];
                $province = $_POST['province'];
                    
                Connect::conn()->insert("agent", [
                    'name'=> $name,
                    'code' => $code,
                    'fb' => $fb,
                    'src' => $image,
                    'tel' => $tel,
                    'line' => $line,
                    'lvl_id' => $lvl_id,
                    'district' => $district,
                    'province' => $province,
                ]);
                if(Connect::conn()->has("agent", ['name' => $name])) {
                    $resultTxt = "สำเร็จ";
                }else {
                    $resultTxt = "ไม่สำเร็จ";
                }
            } else {
                $resultTxt = "ไม่สำเร็จ";
            }
                        
                    ?>

                    <div class="is-center">
                        <h4>เพิ่มตัวแทน<?php echo $resultTxt; ?> </h4>
                          <a href="index.php?module=agent&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
                    </div>
            
            <?php

        }else {
    ?>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">รหัสตัวแทน</label>
            <div class="col-sm-4">
                <input type="text" name="code" class="form-control" id="code" placeholder="รหัสตัวแทน" ng-model="controller.field.code" >
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">ชื่อ</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control" ng-model="controller.field.name"   id="name" placeholder="ชื่อ">
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">กลุ่มตัวแทน</label>
            <div class="col-sm-4">
                <select name="lvl_id" class="form-control" id="lvl_id" ng-model="controller.field.lvl_id">
                <option value=""> -- เลือก --</option>
                <?php
                    $category = Connect::conn()->select("lvl","*");
                    foreach($category as $key => $value) {
                        echo '<option value="'.$value['id'].'"> '.$value['name'].' </option>';
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="username" class="col-sm-2 control-label">Facebook</label>
            <div class="col-sm-4">
                <input type="text" name="fb" class="form-control" ng-model="controller.field.fb"   id="fb" placeholder="Facebook">
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">Line</label>
            <div class="col-sm-4">
                <input type="text" name="line" class="form-control" id="line" placeholder="Line" ng-model="controller.field.line" >
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">เบอร์โทร</label>
            <div class="col-sm-4">
                <input type="text" name="tel" class="form-control" id="tel" ng-model="controller.field.tel"  placeholder="เบอร์โทร">
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">อำเภอ</label>
            <div class="col-sm-4">
            <input type="text" name="district" class="form-control" id="district" ng-model="controller.field.district"  placeholder="อำเภอ">
            </div>
        </div>

        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">จังหวัด</label>
            <div class="col-sm-4">
            <input type="text" name="province" class="form-control" id="province" ng-model="controller.field.province"  placeholder="จังหวัด">
            </div>
        </div>

        <div class="form-group">
                <label for="username" class="col-sm-2 control-label">รูปประจำตัว</label>
                <img ng-src="{{controller.field.image}}" style="max-width: 150px;" class="img-responsive" alt=""><br />
                <input type="file" accept="image/*" app-filereader name="image" id="image" ng-model="controller.field.image">
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