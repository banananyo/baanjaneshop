<?php require_once('common/sessionCheck.php'); ?>
<html>
<head>
<title>ค้นหาตัวแทน - baanjane.com</title>
<?php include('common/headmeta.php'); ?>
<link rel="stylesheet" type="text/css" href="css/agent.css?<?php echo time();?>" />
</head>
<body>
    <?php include('common/spinner.php'); ?>
    <?php
        
        require_once('connect.php');
        $max_per_page = 10;
        $max_buttons = 5;
        $min_max_out = 2;
        $annouceMessage = '';
        $q_name = isset($_GET['name']) ? $_GET['name']:null;
        $q_dist = isset($_GET['dist']) ? $_GET['dist']:null;
        $q_prov = isset($_GET['prov']) ? $_GET['prov']:null;
        $current_page = (isset($_GET['page']) && $_GET['page'] != '0') ? $_GET['page'] : 1; // begin at 1 but in sql is begin 0

        $sql = "SELECT ag.src AS src, ag.code AS code, ag.name AS name, ag.fb AS fb, ag.line AS lineId, ag.tel AS tel, 
                l.name AS lvl, ag.district AS district, ag.province AS province  FROM agent AS ag, lvl AS l WHERE ag.lvl_id=l.id";

        if ($q_name != null) {
            $sql .= " AND ag.name like '%$q_name%'";
            $annouceMessage .= "ชื่อ \"$q_name\" ";
        }
        if ($q_dist != null) {
            $sql .= " AND ag.district like '%$q_dist%'";
            $annouceMessage .= "อำเภอ \"$q_dist\" ";
        }
        if ($q_prov != null) {
            $sql .= " AND ag.province like '%$q_prov%'";
            $annouceMessage .= "จังหวัด \"$q_prov\" ";
        }

        $limit=" LIMIT 0, $max_per_page";
        if($current_page != null){
            $limit = " LIMIT ".abs((intval($current_page)-1) * $max_per_page).", $max_per_page";
        }

        $pre_query = $conn->query($sql);
        $count_prod_to_show = mysqli_num_rows($pre_query);

        $last_page = ceil($count_prod_to_show / $max_per_page);
        $last_page_to_show = $last_page;
        $first_page_to_show = 1;
        $isOverMaxButton = ($last_page > $max_buttons);
    ?>
    <div id="content">
        <?php include('common/top-section.php'); ?>
        <div class="agent-search-wrapper" >
            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-12">
                        <div class="header-title th">ค้นหาตัวแทน</div>
                    </div>
                </div>
                <form class="row row-eq-height justify-content-center" method="GET" action="find_agent.php">
                    <div class="col-12 col-sm-8 col-md-8 col-lg-10">
						<div class="form-group row">
							<label for="agent_name" class="col-sm-2 col-form-label">ชื่อ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="agent_name" name="name" placeholder="ใส่ชื่อ หรือใส่บางส่วนของชื่อ" value="<?php echo $q_name != null ? $q_name : '' ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="agent_province" class="col-sm-2 col-form-label">จังหวัด</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="agent_province" name="prov" placeholder="ใส่จังหวัด หรือบางส่วนของชื่อจังหวัด" value="<?php echo $q_prov != null ? $q_prov : '' ?>">
							</div>
						</div>
                        <div class="form-group row">
							<label for="agent_district" class="col-sm-2 col-form-label">อำเภอ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="agent_district" name="dist" placeholder="ใส่อำเภอ หรือบางส่วนของชื่ออำเภอ" value="<?php echo $q_dist != null ? $q_dist : '' ?>">
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-4 col-lg-2 d-flex flex-row">
						<button class="btn btn-bj btn-full" type="submit">
                            <i class="fa fa-search big-search-icon"></i><br/>ค้นหาเลย
                        </button>
					</div>
				</form>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12 d-flex justify-content-center">
                    <?php 
                        if ($annouceMessage != '') {
                            echo '<h3>ผลการค้นหาจากคำค้น '.$annouceMessage.'</h3>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12">
                <?php 

                $sql .= $limit;
                // print_r($sql);
                $agent_query = $conn->query($sql);
                 while($agent_row = $agent_query->fetch_assoc()){?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <img src="<?php echo $agent_row['src']; ?>" alt="<?php echo $agent_row['src']; ?>" class="agent_profile_image">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            รหัส
                                        </td>
                                        <td><?php echo $agent_row['code']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ชื่อ
                                        </td>
                                        <td><?php echo $agent_row['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            facebook
                                        </td>
                                        <td><?php echo $agent_row['fb']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            line
                                        </td>
                                        <td><?php echo $agent_row['lineId']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            เบอร์โทรศัพท์
                                        </td>
                                        <td><?php print_r(formatPhone($agent_row['tel'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ระดับ
                                        </td>
                                        <td><?php echo $agent_row['lvl']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            ที่อยู่
                                        </td>
                                        <td><?php echo 'อ.'.$agent_row['district'].' จ.'.$agent_row['province']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div> <!-- col -->
                        <div class="divider-large"></div>
                    </div> <!-- row -->
                    <?php } $conn->close();?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12 d-flex justify-content-center">
                    <?php require_once('common/paging.php'); ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-12 d-flex justify-content-center">
                    <?php require_once('common/pagingInfo.php'); ?>
                </div>
            </div>
        </div>
    
        <?php include('common/footer.php'); ?>
    </div>
    <?php include('common/bottom_script.php'); ?>
    <?php include('common/swiper_script.php'); ?>
</body>
</html>