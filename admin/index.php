<?php
    session_start();

    define("TOOLS_KIT",1);

require "class/connect.php";
require "class/tools.php";

    if(isset($_GET['mode'])) {
        $mode = $_GET['mode'];
    }else {
        $mode = false;
    }
    if(isset($_GET['module'])) {
        $module = $_GET['module'];
    }else {
        $module = false;
    }
    
    if(check() && !$mode) {
        require_once "manage.php";
    }elseif(check() && $mode == "password") {
        require_once "password.php";
    }elseif(check() && $mode == "logout") {
        require_once "logout.php";
    }elseif(check() && isset($mode) && isset($module)) {
        require_once "header.php";
        require_once "module/".$module."/".$mode.".php";
        require_once "footer.php";
    }else {
        require_once "login.php";
    }
    
function check() {
    if(isset($_SESSION['BAABJANE_ADMIN_LOGIN']) && isset($_SESSION['BAABJANE_ADMIN_USERNAME']) && isset($_SESSION['BAABJANE_ADMIN_TIME'])) {
        return true;
    }else {
        return false;
    }
}