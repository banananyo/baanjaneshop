<?php require_once('common/sessionCheck.php'); ?>
<html>
<head>
<title>ลงทะเบียน - baanjane.com</title>
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
                        <div class="header-title th">สมัครใช้งาน Baanjane.com</div>
                    </div>
                </div>
                <form class="row row-eq-height justify-content-center" methos="POST" action="register.php">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-10">
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">ชื่อจริง</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fullname" name="fullname" placeholder="ชื่อจริง" >
							</div>
						</div>
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
                        <div class="form-group row">
							<label for="agent_province" class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน" >
							</div>
                        </div>
                        <div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">หมายเลขโทรศัพท์</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="tel" name="tel" placeholder="หมายเลขโทรศัพท์" >
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex flex-row">
						<button class="btn btn-bj btn-full" type="submit">
                            <i class="fa fa-unlock big-search-icon"></i><br/>สมัครใช้งาน
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