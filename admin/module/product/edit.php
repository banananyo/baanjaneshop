


<?php
    if(!isset($_GET['id'])) {
        exit("Access Denied");
    }
    $id = $_GET['id'];
    $row = Connect::conn()->get("product","*",['id' => $_GET['id']]);
?>
<script src="module/product/core.js"></script>
<div class="content-wrapper" ng-controller="edit as controller">

<section class="content">
<form action="" method="post"  enctype="multipart/form-data">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">แก้ไขสินค้า</h3>
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
                            $name = $_POST['name'];
                            $description = $_POST['description'];
                            $alt = $_POST['alt'];
                            $category_id = $_POST['category_id'];
                            $image =  basename($newfilename);
                            $price = (int)$_POST['price'];
                            $sale_price = (int)$_POST['sale_price'];
                            $in_stock = (int)$_POST['in_stock'];

                            if($_FILES['image']["name"] != "") {
                                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                                $image =  basename($newfilename);
                                Connect::conn()->update("product", [
                                    'name' => $name,
                                    'description' => $description,
                                    'alt' => $alt,
                                    'src' => $image,
                                    'category_id' => $category_id,
                                    'price' => $price,
                                    'sale_price' => $sale_price,
                                    'in_stock' => $in_stock,
                                ],['id' => $_GET['id']]);
                                if(Connect::conn()->has("product", [
                                    'name' => $name,
                                    'description' => $description,
                                    'alt' => $alt,
                                    'src' => $image,
                                    'price' => $price,
                                    'sale_price' => $sale_price,
                                    'in_stock' => $in_stock,
                                    ])) {
                                    $resultTxt = "สำเร็จ";
                                }else {
                                    $resultTxt = "ไม่สำเร็จ";
                                };
                            }else {
                                Connect::conn()->update("product", [
                                    'name' => $name,
                                    'description' => $description,
                                    'alt' => $alt,
                                    'category_id' => $category_id,
                                    'price' => $price,
                                    'sale_price' => $sale_price,
                                    'in_stock' => $in_stock,
                                ],['id' => $_GET['id']]);
                                if(Connect::conn()->has("product", [
                                    'name' => $name,
                                    'description' => $description,
                                    'alt' => $alt,
                                    'price' => $price,
                                    'sale_price' => $sale_price,
                                    'in_stock' => $in_stock,
                                    ])) {
                                    $resultTxt = "สำเร็จ";
                                }else {
                                    $resultTxt = "ไม่สำเร็จ";
                                };
                            }
                            
                        ?>
    
                        <div class="is-center">
                            <h4>แก้ไขสินค้า<?php echo $resultTxt; ?> </h4>
                              <a href="index.php?module=product&mode=manage">คลิกเพื่อกลับไปยังหน้าจัดการ</a>
                        </div>
            
            <?php

        }else {
    ?>
     <div ng-init="controller.field.name = '<?php echo $row['name'] ?>';
                    controller.field.description = '<?php echo $row['description'] ?>';
                    controller.field.price = '<?php echo $row['price'] ?>';
                    controller.field.category_id = '<?php echo $row['category_id'] ?>';
                    controller.field.address = '<?php echo $row['address'] ?>';
                    controller.field.image = '<?php echo $row['src'] ?>';
                    controller.field.alt = '<?php echo $row['alt'] ?>';
                    controller.field.sale_price = '<?php echo $row['sale_price'] ?>';
                    controller.field.in_stock = '<?php echo $row['in_stock'] ?>';
                    "></div>
                    <div class="form-group  col-sm-12">
                    <label for="username" class="col-sm-2 control-label">ชื่อสินค้า</label>
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" id="name" placeholder="ชื่อสินค้า" ng-model="controller.field.name" >
                    </div>
                </div>
                <div class="form-group  col-sm-12">
                    <label for="username" class="col-sm-2 control-label">กลุ่มสินค้า</label>
                    <div class="col-sm-4">
                        <select name="category_id" class="form-control" id="category_id" ng-model="controller.field.category_id">
                        <option value=""> -- เลือก --</option>
                        <?php
                            $category = Connect::conn()->select("category","*");
                            foreach($category as $key => $value) {
                                echo '<option value="'.$value['id'].'"> '.$value['name'].' </option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="username" class="col-sm-2 control-label">ราคา</label>
                    <div class="col-sm-4">
                        <input type="text" name="price" class="form-control" ng-model="controller.field.price"   id="price" placeholder="ราคา">
                    </div>
                </div>
                <div class="form-group  col-sm-12">
                    <label for="username" class="col-sm-2 control-label">ราคาพิเศษ</label>
                    <div class="col-sm-4">
                        <input type="text" name="sale_price" class="form-control" id="sale_price" ng-model="controller.field.sale_price"  placeholder="ราคาพิเศษ">
                    </div>
                </div>
                <div class="form-group  col-sm-12">
                    <label for="username" class="col-sm-2 control-label">จำนวนที่มี</label>
                    <div class="col-sm-4">
                        <input type="text" name="in_stock" class="form-control" id="in_stock" ng-model="controller.field.in_stock"  placeholder="จำนวนที่มี">
                    </div>
                </div>
                <div class="form-group  col-sm-12">
                    <label for="username" class="col-sm-2 control-label">คำอธิบายแบบย่อ</label>
                    <div class="col-sm-4">
                        <textarea type="text" name="alt" class="form-control" id="alt" ng-model="controller.field.alt" placeholder="คำอธิบายแบบย่อ"></textarea>
                    </div>
                </div>
                <div class="form-group  col-sm-12">
                    <label for="username" class="col-sm-2 control-label">รายละเอียด</label>
                    <div class="col-sm-4">
                        <textarea type="text" name="description" class="form-control" id="description" ng-model="controller.field.description" placeholder="รายละเอียด"></textarea>
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