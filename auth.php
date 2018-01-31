<?php require_once('common/sessionCheck.php'); ?>
<html>
<head>
<title>เข้าสู่ระบบ / ลงทะเบียน - baanjane.com</title>
<?php include('common/headmeta.php'); ?>
</head>
<body>
    <?php include('common/spinner.php'); ?>
    <div id="content">
        <?php include('common/top-section.php'); ?>
        <?php
        if(isset($_POST['email']) && isset($_POST['password'])) {
            require_once('connect.php');
            $query_user = "SELECT id, fullname, address, email, tel FROM customer WHERE email=? AND password=?";
            $stmt = $conn->prepare($query_user);
            $stmt->bind_param('ss', $_POST['email'],  md5($_POST['password']));
            $stmt->execute();
            $stmt->store_result();
            $numrows = $stmt->num_rows;
            $stmt->bind_result($id, $fullname, $address, $email, $tel);
            $stmt->fetch();

            if ($numrows > 0 && $id != null) {
                //echo 'found';
                $_SESSION['bj_user']['id'] = $id;
                $_SESSION['bj_user']['fullname'] = $fullname;
                $_SESSION['bj_user']['email'] = $email;
                $_SESSION['bj_user']['address'] = $address;
                $_SESSION['bj_user']['tel'] = $tel;

                echo "<script type='text/javascript'>window.location.href='index.php';</script>";
            }
            else {
                //echo 'null';
                echo "<script type='text/javascript'>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');window.location.href='auth.php';</script>";
            }
            
            $stmt->close();
            $conn->close();
        }
        ?>
        <div class="agent-search-wrapper" >
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-12">
                        <div class="header-title th">เข้าสู่ระบบ<br/>
                            <span class="prompt-register">ยังไม่มีแอคเคาท์? <a href="register.php">สมัครเลย</a></span>
                        </div>
                    </div>
                </div>
                <form class="row row-eq-height justify-content-center" method="POST" action="auth.php">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-10">
						<div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">อีเมล</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="email" name="email" placeholder="อีเมล" >
							</div>
						</div>
						<div class="form-group row">
							<label for="agent_province" class="col-sm-2 col-form-label">รหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" >
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex flex-row">
						<button class="btn btn-bj btn-full" type="submit">
                            <i class="fa fa-unlock big-search-icon"></i><br/>เข้าสู่ระบบ
                        </button>
					</div>
				</form>
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
</body>
</html>