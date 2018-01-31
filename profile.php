<?php require_once('common/sessionCheck.php'); ?>
<html>
<head>
<title>ข้อมูลส่วนตัว - baanjane.com</title>
<?php include('common/headmeta.php'); ?>
</head>
<body>
    <?php include('common/spinner.php'); ?>
    <div id="content">
        <?php include('common/top-section.php'); ?>
        <div class="agent-search-wrapper" >
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-12">
                        <div class="header-title th">ข้อมูลส่วนตัว</div>
                    </div>
                </div>
                <?php 
                require_once('connect.php');
                $customer_id = $_SESSION['bj_user']['id'];
                if(isset($_POST['editGeneral'])) {
                    $query_user = "UPDATE `customer` SET `fullname`=?,`address`=?,`tel`=? WHERE id=$customer_id";
                    $stmt = $conn->prepare($query_user);
                    $stmt->bind_param('sss', $_POST['fullname'],  $_POST['address'], $_POST['tel']);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->fetch();
                    //
                    $stmt->close();
                    
                } else if (isset($_POST['editPassword'])) {
                    if ($_POST['newpassword'] == $_POST['confirmnewpassword']) {
                        $query_user = "SELECT * FROM customer WHERE id=? AND password=?";
                        $stmt = $conn->prepare($query_user);
                        $stmt->bind_param('ss', $customer_id, md5($_POST['oldpassword']));
                        $stmt->execute();
                        $stmt->store_result();
                        $numrows = $stmt->num_rows;
                        $stmt->fetch();
                        $stmt->close();
                        if ($numrows > 0) {
                            $query_user = "UPDATE `customer` SET `password`=? WHERE id=$customer_id";
                            $stmt = $conn->prepare($query_user);
                            $stmt->bind_param('s', md5($_POST['newpassword']));
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->fetch();
                            //
                            $stmt->close();
                            ?>
                                <script>alert('กำลังออกจากระบบ กรุณาทำการเข้าสู่ระบบอีกครั้ง');window.location.href='common/logout.php'</script>
                            <?php
                        } else {
                            ?>
                                <script>alert('รหัสผ่านเดิมไม่ถูกต้อง');</script>
                            <?php
                        }
                        
                    } else {
                        ?>
                            <script>alert('รหัสผ่านใหม่ และ ยืนยันรหัสผ่านใหม่ไม่ตรงกัน');</script>
                        <?php
                    }
                }
                
                if (!isset($_SESSION['bj_user'])) { ?>
                <div class="row row-eq-height justify-content-center">
                    <span class="text-danger">ทำการเข้าสู่ระบบหรือสมัครสมาชิกเพื่อใช้งานระบบข้อมูลส่วนตัว</span>
                </div>
                <?php } else {
                    $q_profile = $conn->query("SELECT * FROM customer WHERE id=$customer_id");
                    $profile = $q_profile->fetch_assoc();
                    $conn->close();
                ?>
                <form class="row row-eq-height justify-content-center" method="POST" action="profile.php">
                    <input type="hidden" name="editGeneral" value="true" />
                    <div class="col-12 col-sm-8 col-md-8 col-lg-10">
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">อีเมล</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email" name="email" placeholder="อีเมล" value="<?php echo $profile['email']; ?>" readOnly />
							</div>
                        </div>
						<div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">ชื่อจริง</label>
							<div class="col-sm-10">
								<input type="text" class="form-control editable" id="fullname" name="fullname" placeholder="ชื่อจริง" value="<?php echo $profile['fullname']; ?>" readOnly />
							</div>
                        </div>
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์</label>
							<div class="col-sm-10">
								<input type="text" class="form-control editable" id="tel" name="tel" placeholder="หมายเลขโทรศัพท์" value="<?php echo $profile['tel']; ?>" readOnly />
							</div>
                        </div>
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">ที่อยู่ในการจัดส่ง</label>
							<div class="col-sm-10">
								<input type="text" class="form-control editable" id="address" name="address" placeholder="ที่อยู่ในการจัดส่ง" value="<?php echo $profile['address']; ?>" readOnly />
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex flex-row">
                        <button class="btn btn-bj btn-full" type="submit">
                            <i class="fa fa-address-book big-search-icon"></i><br/>อัพเดทข้อมูล
                        </button>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <button class="btn btn-bj btn-full" type="button" onclick="toggleEdit()" >
                            เปิด / ปิดการแก้ไขทั่วไป
                        </button>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <button class="btn btn-bj btn-full" type="button" onclick="togglePassword()" >
                            เปิด / ปิดการแก้ไขรหัสผ่าน
                        </button>
                    </div>
                </form>
                <form class="row row-eq-height justify-content-center editPassword" method="POST" action="profile.php">
                    <input type="hidden" name="editPassword" value="true" />
                    <div class="col-12 col-sm-8 col-md-8 col-lg-10">
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">รหัสผ่านเก่า</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="รหัสผ่าน" value="" />
							</div>
                        </div>
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="รหัสผ่านใหม่" value="" />
							</div>
                        </div>
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">ยืนยันรหัสผ่านใหม่</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="ยืนยันรหัสผ่านใหม่" value="" />
							</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex flex-row">
                        <button class="btn btn-bj btn-full" type="submit">
                            <i class="fa fa-lock big-search-icon"></i><br/>อัพเดทรหัสผ่าน
                        </button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12">
                    <div class="content-box"></div>
                </div>
            </div>
        </div>
    
        <?php include('common/footer.php'); ?>
    </div>
    <?php include('common/bottom_script.php'); ?>
    <?php include('common/swiper_script.php'); ?>
    <script>
        $(document).ready(function() {
            $('.editPassword').hide();
        });
        function toggleEdit() {
            $('.editable').prop('readOnly', function(i, v) { return !v; });
        }
        function togglePassword() {
            $('.editPassword').toggle();
        }
    </script>
</body>
</html>