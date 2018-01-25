<html>
<head>
<title>ค้นหาตัวแทน - baanjane.com</title>
<?php include('common/headmeta.php'); ?>
<link rel="stylesheet" type="text/css" href="css/agent.css?<?php echo time();?>" />
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
							<label for="agent_province" class="col-sm-2 col-form-label">จังหวัด</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="agent_province" placeholder="ใส่จังหวัด หรือบางส่วนของชื่อจังหวัด">
							</div>
						</div>
                        <div class="form-group row">
							<label for="agent_district" class="col-sm-2 col-form-label">อำเภอ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="agent_district" placeholder="ใส่อำเภอ หรือบางส่วนของชื่ออำเภอ">
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex flex-row">
						<button class="btn btn-bj btn-full">
                            <i class="fa fa-search big-search-icon"></i><br/>ค้นหาเลย
                        </button>
					</div>
				</form>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12">
                <?php $i=0; while($i < 2){?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <img src="images/agent/1.jpg" alt="1.jpg" class="agent_profile_image">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            รหัส
                                        </td>
                                        <td>xxx</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ชื่อ
                                        </td>
                                        <td>xxx</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            facebook
                                        </td>
                                        <td>xxx</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            line
                                        </td>
                                        <td>xxx</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            เบอร์โทรศัพท์
                                        </td>
                                        <td>xxx</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ระดับ
                                        </td>
                                        <td>xxx</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ที่อยู่
                                        </td>
                                        <td>xxx</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div> <!-- col -->
                        <div class="divider-large"></div>
                    </div> <!-- row -->
                    <?php $i++; }?>
                </div>
            </div>
        </div>
    
        <?php include('common/footer.php'); ?>
    </div>
    <?php include('common/bottom_script.php'); ?>
    <?php include('common/swiper_script.php'); ?>
</body>
</html>