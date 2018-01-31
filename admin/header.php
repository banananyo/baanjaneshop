<?php

$avatar = Connect::conn()->get("member","image",['username'=> $_SESSION['BAABJANE_ADMIN_USERNAME']]);
?>
<!DOCTYPE html>
<html ng-app="app">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Baanjane Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <script src="js/jquery.min.js"></script>
  <script src="js/angular.min.js"></script>
  <script src="js/app.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>SH</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BAANJANE</b>SHOP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="uploads/<?=$avatar?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['BAABJANE_ADMIN_USERNAME']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="uploads/<?=$avatar?>" class="img-circle" alt="User Image">

                <p>
                  <?=$_SESSION['BAABJANE_ADMIN_USERNAME']?> 
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../index.php" class="btn btn-default btn-flat">กลับไปยังเว็บไซต์</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">ออกจากระบบ</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="uploads/<?=$avatar?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['BAABJANE_ADMIN_USERNAME']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview <?=($_GET['module'] == "page" ? 'active':'' )?>">
          <a href="index.php" target="_parent">
            <i class="fa fa-dashboard"></i> <span>หน้าหลัก</span>
            <span class="pull-right-container">
            </span>
          </a>
          
        </li>
        <li class="header">MEMBER SYSTEM</li>
        <li class="treeview <?=($_GET['module'] == "member" ? 'active':'' )?>">
          <a href="#">
            <i class="fa fa-user"></i> <span>ระบบสมาชิก</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=member&mode=add"><i class="fa fa-user-plus"></i> เพิ่มสมาชิก</a></li>
            <li><a href="index.php?module=member&mode=manage"><i class="fa fa-users"></i> จัดการสมาชิก</a></li>
          </ul>
        </li>
        <li class="treeview <?=($_GET['module'] == "agent" ? 'active':'' )?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>ตัวแทน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=agent&mode=add"><i class="fa fa-user-plus"></i> เพิ่มตัวแทน</a></li>
            <li><a href="index.php?module=agent&mode=manage"><i class="fa fa-users"></i> จัดการตัวแทน</a></li>
          </ul>
        </li>
        <li class="treeview <?=($_GET['module'] == "lvl" ? 'active':'' )?>">
          <a href="#">
            <i class="fa fa-server"></i> <span>ระดับตัวแทน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=lvl&mode=add"><i class="fa fa-user-plus"></i> เพิ่มระดับตัวแทน</a></li>
            <li><a href="index.php?module=lvl&mode=manage"><i class="fa fa-users"></i> จัดการระดับตัวแทน</a></li>
          </ul>
        </li>
        <li class="header">PRODUCT SYSTEM</li>
        <li class="treeview  <?=($_GET['module'] == "category" ? 'active':'' )?>">
          <a href="#">
            <i class="fa fa-th-list"></i> <span>หมวดหมู่</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=category&mode=add"><i class="fa fa-plus"></i> เพิ่มหมวดหมู่</a></li>
            <li><a href="index.php?module=category&mode=manage"><i class="fa fa-th-list"></i> จัดการหมวดหมู่</a></li>
          </ul>
        </li>
        <li class="treeview  <?=($_GET['module'] == "product" ? 'active':'' )?>">
          <a href="#">
            <i class="fa fa-image"></i> <span>สินค้า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=product&mode=add"><i class="fa fa-plus"></i> เพิ่มสินค้า</a></li>
            <li><a href="index.php?module=product&mode=manage"><i class="fa fa-th-list"></i> จัดการสินค้า</a></li>
          </ul>
        </li>
        <li class="header">PAGE SYSTEM</li>
        <li class="treeview <?=($_GET['module'] == "banner" ? 'active':'' )?>">
          <a href="#">
            <i class="fa fa-file-image-o"></i> <span>แบนเนอร์</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=banner&mode=add"><i class="fa fa-plus"></i> เพิ่มแบนเนอร์</a></li>
            <li><a href="index.php?module=banner&mode=manage"><i class="fa fa-th-list"></i> จัดการแบนเนอร์</a></li>
          </ul>
        </li>
        <li class="treeview <?=($_GET['module'] == "promotion" ? 'active':'' )?>">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>โปรโมชัน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=promotion&mode=add"><i class="fa fa-plus"></i> เพิ่มโปรโมชัน</a></li>
            <li><a href="index.php?module=promotion&mode=manage"><i class="fa fa-th-list"></i> จัดการโปรโมชัน</a></li>
          </ul>
        </li>
        <li class="treeview <?=($_GET['module'] == "page" ? 'active':'' )?>">
        <a href="#">
            <i class="fa fa-file-o"></i> <span>หน้าเสริม</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?module=page&mode=add"><i class="fa fa-plus"></i> เพิ่มหน้า</a></li>
            <li><a href="index.php?module=page&mode=manage"><i class="fa fa-th-list"></i> จัดการหน้า</a></li>
          </ul>
        </li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
