<nav class="main-menu">
  <div class="main-menu-inner d-flex ">
    <a class="main-menu-link hoverable show-on-scroll-offset hide-mobile-xs" href="index.php" >
      <img src="images/logo-small.png" alt="Baanjane.com logo" />
    </a>
    <a class="main-menu-link hoverable show-mobile-xs" style="padding-right: 20px;" href="index.php" >
      <img src="images/logo-small.png" alt="Baanjane.com logo" />
    </a>
    <span class="dropdown main-menu-link hoverable hide-mobile-xs">
      <a class="text-white"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="cat-dropdown">
        <div class="d-flex flex-row align-items-center">
            <span class="">หมวดหมู่สินค้า</span><span>&nbsp;</span>
            <span ><i class="fa fa-chevron-down icon down-icon" aria-hidden="true"></i></span>
        </div>
        <div class="dropdown-menu dropdown-wrapper" aria-labelledby="cat-dropdown">
            <?php require_once('connect.php');
              $q_cat = $conn->query("SELECT * FROM category ORDER BY id DESC LIMIT 10");
              while ($row_cat = $q_cat->fetch_assoc()) {
            ?>
              <a class="dropdown-item text-secondary" onclick="goSearch('find_product.php', '<?php echo $row_cat['name']; ?>')" ><?php echo $row_cat['name']; ?></a>
            <?php } ?>
        </div>
      </a>
    </span>
    <span class=" hide-mobile-xs" >
        <span class="line-sep"></span>
    </span>
    
    <a class="main-menu-link hoverable hide-mobile-xs" href="index.php" >หน้าแรก</a>
    <a class="main-menu-link hoverable hide-mobile-xs" href="find_product.php" >สินค้าทั้งหมด</a>
    <a class="main-menu-link hoverable hide-mobile-xs" href="find_agent.php" >ค้นหาตัวแทน</a>
    <a class="main-menu-link hoverable hide-mobile-xs" href="about.php" >เกี่ยวกับเรา</a>
    <a class="main-menu-link hoverable hide-mobile-xs" href="contact.php" >ติดต่อเรา</a>
    <span class="dropdown main-menu-link hoverable show-mobile-xs" style="display: flex; justify-content: flex-end; width: calc(100% - 58px);">
      <a class="text-white" 
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mobile-menu-dropdown">
        <div class="d-flex flex-row align-items-center">
            <span class=""><i class="fa fa-bars"></i></span>
        </div>
        <div class="dropdown-menu dropdown-wrapper" aria-labelledby="mobile-menu-dropdown">
            <a class="dropdown-item text-secondary" href="find_product.php">สินค้าทั้งหมด</a>
            <a class="dropdown-item text-secondary" href="find_agent.php">ค้นหาตัวแทน</a>
            <a class="dropdown-item text-secondary" href="about.php">เกี่ยวกับเรา</a>
            <a class="dropdown-item text-secondary" href="contact.php">ติดต่อเรา</a>
        </div>
      </a>
    </span>
  </div>
</nav>