
<script src="module/lvl/core.js"></script>
<div class="content-wrapper" ng-controller="manage as controller">

<section class="content">
<div class="box">
<form action="" method="get">
            <div class="box-header">
              <h3 class="box-title">จัดการระดับตัวแทน</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="hidden" name="module" value="agent">
                    <input type="hidden" name="mode" value="lvl">
                  <input type="text" name="filter" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
              <?php
                        $start = 0;
                        $page = !isset($_GET['page']) ? 1:$_GET['page'];
                        $limit = !isset($_GET['limit']) ? 10:$_GET['limit'];
                        $start = ($page*$limit) - $limit;
                        
                        $filter = [];
                        if(isset($_GET['filter'])) {
                            $filter = ["alt[~]" => $_GET['filter']];
                        }

                        $count = Connect::conn()->count("lvl",$filter);

                       $row = Connect::conn()->select("lvl","*",array_merge(["LIMIT" => [$start,$limit]],$filter));
                        ?>
                    
                <tbody>
                <tr>
                  <th class="col-xs-1">ID</th>
                  <th class="col-xs-4">รูป</th>
                  <th class="col-xs-3">รายละเอียด</th>
                  <th class="col-xs-2">จัดการ</th>
                </tr>
                <?php foreach($row as $key => $value) {
                    ?>
                            <tr>
                                <td>
                                    <?php echo $limit * $page - ($limit - 1) + $key; ?>
                                </td>
                                <td>
                                    <?php echo "<img class='img-responsive' style='max-height: 150px;' src='uploads/".$value['src']."' />"; ?>
                                </td>
                                <td>
                                    <?php echo $value['name']; ?>
                                </td>
                                <td>
                                    <a href="index.php?module=lvl&mode=edit&id=<?php echo $value['id'] ?>" class="btn btn-default">แก้ไข</a>
                                    <a href="javascript:;" ng-click="controller.remove('<?php echo addslashes($value['alt']); ?>',<?php echo $value['id'] ?>)" class="btn btn-danger">ลบ</a> 
                                </td>
                            </tr>

                            <?php } ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="modal fade" id="remove" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4> ยืนยันการลบ  {{ controller.tmp.name }}</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" ng-click="controller.cancelRemove();"  class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" ng-click="controller.goRemove();" class="btn btn-danger">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>

          <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                            <a class="<?php echo 1 == $page ? 'is-hidden':"" ?>" href="index.php?module=lvl&mode=manage&page=<?php echo isset($_GET['page']) ? $_GET['page']-1:2; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            <?php 
                            $maxLoop = ($page == 1) ? ($count/$limit)+1:($count/$limit);
                            for($i=1;$i<=ceil($count / $limit);$i++) {
                                 $textLimit = "";
                                if(isset($_GET['limit'])) {
                                    $textLimit = "&limit=$limit";
                                }
                                echo " <li class='".($page == $i ? 'active':'')."'><a href=\"index.php?module=lvl&mode=manage&page=$i$textLimit\">$i</a></li>";
                            } ?>
                           
                            <li>
                            <a class="<?php echo ceil($count / $limit) == $page ? 'is-hidden':"" ?>" href="index.php?module=lvl&mode=manage&page=<?php echo isset($_GET['page']) ? $_GET['page']+1:2; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            </li>
                        </ul>
                    </nav>

</section>

</div>