<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>เข้าสู่ระบบ - ระบบจัดการบ้านยา</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>


    <link rel="stylesheet" href="css/app.css" />
    <script src="js/app.js"></script>
    
    
</head>

<body class="hold-transition login-page" ng-controller="login as controller">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Baanjane</b>ADMIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">เข้าสู่ระบบจัดการหลังบ้าน</p>

      <div class="form-group has-feedback">
        <input class="form-control" placeholder="ชื่อผู้ใช้" name="username" ng-model="controller.field.username" type="text" autofocus="" ng-enter="controller.confirm();">
      </div>
      <div class="form-group has-feedback">
        <input  class="form-control" placeholder="รหัสผ่าน" name="password" ng-model="controller.field.password" type="password" value="" ng-enter="controller.confirm();">
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button class="btn btn-primary btn-block btn-flat" ng-click="controller.confirm();" >Sign In</button>
        </div>
        <!-- /.col -->


        <div class="col-xs-12">

        <div class="progress is-hidden"  style="margin-top: 2rem;" style="margin-top: 2rem;" >
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <div class="alert alert-danger is-hidden" id="LOGIN_ERR" style="margin-top: 2rem;" role="alert">
                        ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง
                    </div>
        </div>
        
      </div>

  </div>
</div>

</body>

</html>