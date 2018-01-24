<html>
<head>
<title>find agent - baanjane.com</title>
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
                        <div class="header-title th">ค้นหาตัวแทน</div>
                    </div>
                </div>
                <form class="row row-eq-height justify-content-center">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-10">
						<div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">ชื่อ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="agent_name" placeholder="ใส่ชื่อ หรือใส่บางส่วนของชื่อ">
							</div>
						</div>
						<div class="form-group row">
							<label for="agent_address" class="col-sm-2 col-form-label">ที่อยู่</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="agent_address" placeholder="ใส่ที่อยู่ หรือบางส่วนของที่อยู่">
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex flex-row">
						<button class="btn btn-bj btn-full">ค้นหาเลย</button>
					</div>
				</form>
            </div>
        </div>
    
        <?php include('common/footer.php'); ?>
    </div>
    <?php include('common/bottom_script.php'); ?>
    <?php include('common/swiper_script.php'); ?>
</body>
</html>