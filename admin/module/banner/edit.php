


<?php
    if(!isset($_GET['id'])) {
        exit("Access Denied");
    }
    $id = $_GET['id'];
    $row = Connect::conn()->get("slider","*",['id' => $_GET['id']]);

?>
<script src="module/banner/core.js"></script>
<div class="content-wrapper" ng-controller="edit as controller">

<section class="content">
<form action="" method="post"  enctype="multipart/form-data">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">แก้ไขแบนเนอร์</h3>
    </div>
    <div class="box-body">
     <?php 
        if(isset($_POST['button'])  && $_POST['button'] == "confirm") {
            $target_dir = "uploads/";
                            $newfilename= date('dmYHis').".jpg";                    
                            $target_file = $target_dir . basename($newfilename);
                            $uploadOk = 1;
                            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                            // Check if image file is a actual image or fake image
                            $alt = $_POST['alt'];
                            $image =  basename($newfilename);

                            if($_FILES['image']["name"] != "") {
                                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                                $image =  basename($newfilename);
                                Connect::conn()->update("slider", [
                                    'alt' => $alt,
                                    'src' => $image,
                                ],['id' => $_GET['id']]);
                                if(Connect::conn()->has("slider", [
                                    'alt' => $alt,
                                    'src' => $image,
                                    ])) {
                                    $resultTxt = "สำเร็จ";
                                }else {
                                    $resultTxt = "ไม่สำเร็จ";
                                };
                            }else {
                                Connect::conn()->update("slider", [
                                    'alt' => $alt
                                ],['id' => $_GET['id']]);
                                if(Connect::conn()->has("slider", [
                                    'alt' => $alt
                                    ])) {
                                    $resultTxt = "สำเร็จ";
                                }else {
                                    $resultTxt = "ไม่สำเร็จ";
                                };
                            }
                            
                        ?>
    
                        <div class="is-center">
                            <h4>แก้ไขแบนเนอร์<?php echo $resultTxt; ?> </h4>
                              <a href="index.php?module=banner&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
                        </div>
            
            <?php

        }else {
    ?>
     <div ng-init="
                    controller.field.alt = '<?php echo $row['alt'] ?>';
                    controller.field.image = '<?php echo $row['src'] ?>';
                    "></div>
                   
                
                <div class="form-group  col-sm-12">
                    <label for="username" class="col-sm-2 control-label">รายละเอียด</label>
                    <div class="col-sm-4">
                        <input type="text" name="alt" class="form-control" id="alt" placeholder="รายละเอียด" ng-model="controller.field.alt" >
                    </div>
                </div>


                <div class="form-group  col-sm-12">
                        <label for="username" class="col-sm-2 control-label">รูป</label>
                        <div class="col-sm-4">
                            <img ng-src="uploads/{{controller.field.image}}" style="max-width: 150px;" class="img-responsive" alt=""><br />
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