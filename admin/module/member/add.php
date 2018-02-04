
<script src="module/member/core.js"></script>
<div class="content-wrapper" ng-controller="add as controller">

<section class="content">
<form action="" method="post"  enctype="multipart/form-data">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">เพิ่มสมาชิก</h3>
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
                $username = $_POST['username'];
                $name = $_POST['names'];
                $password = md5($_POST['password']);
                $address = $_POST['address'];
                $image =  basename($newfilename);
                $tel = $_POST['tel'];
                $email = $_POST['email'];
                $level = (int)$_POST['level'];
                $status = (int)$_POST['status'];
                    
                Connect::conn()->insert("member", [
                    'username' => $username,
                    'name'=> $name,
                    'password' => $password,
                    'address' => $address,
                    'image' => $image,
                    'tel' => $tel,
                    'email' => $email,
                    'level' => $level,
                    'status' => $status,
                ]);
                if(Connect::conn()->has("member", ['username' => $username])) {
                    $resultTxt = "สำเร็จ";
                }else {
                    $resultTxt = "ไม่สำเร็จ";
                }
            } else {
                $resultTxt = "ไม่สำเร็จ";
            }
                        
                    ?>

                    <div class="is-center">
                        <h4>เพิ่มสมาชิก<?php echo $resultTxt; ?> </h4>
                          <a href="index.php?module=member&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
                    </div>
            
            <?php

        }else {
    ?>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
            <div class="col-sm-4">
                <input type="text" name="username" class="form-control" id="username" placeholder="ชื่อผู้ใช้" ng-model="controller.field.username" >
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">รหัสผ่าน</label>
            <div class="col-sm-4">
                <input type="password" name="password" class="form-control" ng-model="controller.field.password"   id="password" placeholder="รหัสผ่าน">
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="username" class="col-sm-2 control-label">อีเมล์</label>
            <div class="col-sm-4">
                <input type="text" name="email" class="form-control" ng-model="controller.field.email"   id="email" placeholder="อีเมล์">
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">ชื่อ - สกุล</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control" id="name" placeholder="ชื่อ - สกุล" ng-model="controller.field.name" >
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">ตำแหน่ง</label>
            <div class="col-sm-4">
                <select name="level" class="form-control" id="level" ng-model="controller.field.level">
                    <option value=""> -- เลือก --</option>
                    <option value="1"> แอดมิน </option>
                    <option value="2"> สมาชิก </option>
                </select>
            </div>
        </div>
        <div class="form-group  col-sm-12">
        <label for="username" class="col-sm-2 control-label">สถานะ</label>
            <div class="col-sm-4">
                <select name="status" class="form-control" id="status" ng-model="controller.field.status">
                    <option value=""> -- เลือก --</option>
                    <option value="0"> ยังไม่ยืนยัน </option>
                    <option value="1"> ยินยันแล้ว </option>
                </select>
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">เบอร์โทร</label>
            <div class="col-sm-4">
                <input type="text" name="tel" class="form-control" id="tel" ng-model="controller.field.tel"  placeholder="เบอร์โทร">
            </div>
        </div>
        <div class="form-group  col-sm-12">
            <label for="username" class="col-sm-2 control-label">ที่อยู่</label>
            <div class="col-sm-4">
                <textarea type="text" name="address" class="form-control" id="address" ng-model="controller.field.address" placeholder="ที่อยู่"></textarea>
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