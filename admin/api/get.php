<?php
session_start();

define("TOOLS_KIT",1);

if (!isset($_SERVER['HTTP_REFERER'])) {
    exit("Access Denied");
}

require "../class/connect.php";
require "../class/tools.php";

if(file_get_contents('php://input')) {
    $request = (array)json_decode(file_get_contents('php://input'));
    if(is_null($request)) {
        exit("Access Denied");
    }

    $mode = $request['mode'];
    if(isset($request['mode'])) {
        if($mode == "LOGIN") {
            $username = $request['data']->username;
            $password = md5($request['data']->password);
            
            if(Connect::conn()->has("member",['username'=> $username, "password" => $password])) {
                $_SESSION['BAABJANE_ADMIN_LOGIN'] = 1;
                $_SESSION['BAABJANE_ADMIN_USERNAME'] = $username;
                $_SESSION['BAABJANE_ADMIN_ID'] = Connect::conn()->get("member","id",['username'=> $username]);
                $_SESSION['BAABJANE_ADMIN_TIME'] = date("Y-m-d H:i:s");
                echo json_encode(array("status" => true));
            }else {
                echo json_encode(array("status" => false));
            }
            
        }else {
            exit("Access Denied");
        }
    }else {
        exit("Access Denied");
    }
   
    
    
}

