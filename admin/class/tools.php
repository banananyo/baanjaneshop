<?php

if (!defined("TOOLS_KIT")) {
    exit("Access Denied");
}

class Tools {

    public static function log($data) {
        $data = json_encode($data);
        echo "<script>console.dir($data)</script>";
    }

    public static function json($obj) {
        echo json_encode($obj);
    }

    public static function password($string, $action = 'e') {
        $secret_key = 'abdbee';
        $secret_iv = 'abdbee||abdbee';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } elseif ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    public static function getPathURL() {
        return "backend-swc";
    }

    public static function uuid() {
        $uuid = array(
            'time_low' => 0,
            'time_mid' => 0,
            'time_hi' => 0,
            'clock_seq_hi' => 0,
            'clock_seq_low' => 0,
            'node' => array()
        );

        $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
        $uuid['time_mid'] = mt_rand(0, 0xffff);
        $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
        $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
        $uuid['clock_seq_low'] = mt_rand(0, 255);

        for ($i = 0; $i < 6; $i++) {
            $uuid['node'][$i] = mt_rand(0, 255);
        }

        $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x', $uuid['time_low'], $uuid['time_mid'], $uuid['time_hi'], $uuid['clock_seq_hi'], $uuid['clock_seq_low'], $uuid['node'][0], $uuid['node'][1], $uuid['node'][2], $uuid['node'][3], $uuid['node'][4], $uuid['node'][5]
        );

        return str_replace("-", "", $uuid);
    }

    public static function time($type, $modify = null) {
        $now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
        if ($modify) {
            $now->modify($modify);
        }
        if (!isset($type) || $type == 'datetime') {
            return $now->format('Y-m-d H:i:s');
        }
        if (!isset($type) || $type == 'date') {
            return $now->format('Y-m-d');
        }
        if ($type == 'time') {
            return $now->format('H:i:s');
        }
        if ($type == 'timestamp') {
            return $now->getTimestamp();
        }
    }

    public static function ip() {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
                $addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    public static function getLowerPrice($id) {
        if (Connect::conn()->count("room", ['place_id' => $id]) == 0) {
            return 0;
        }
        $room = Connect::conn()->select("room", "price_half", ['place_id' => $id]);
        return min($room);
    }

    public static function checkFileImage($filename) {
        $filename = str_replace("class/../", "", $filename);
        return false;
    }

    public static function genTextUrl($name) {
        return str_replace(" ", "-", $name);
    }

    public static function checkToken($data = "", $mode = "admin") {
        if (Tools::hasSession("MASTER_TOKEN")) {
            $token = Tools::password(Tools::getSession("MASTER_TOKEN"), 'd');
            $tmp = explode("||", $token);
            if ($tmp[1] == Tools::getSession("MASTER_LOGIN_TIME")) {
                return true;
            } else {
                return false;
            }
        }
        if (Tools::hasSession("USER_LEVEL_TOKEN")) {
            $token = Tools::password(Tools::getSession("USER_LEVEL_TOKEN"), 'd');
            $tmp = explode("||", $token);
            if (sizeof($tmp) == 2) {
                $getPemission = Connect::conn()->get("level", ["id", "name", "permission"], ["token" => $tmp[0]]);
                $permission = json_decode(base64_decode($getPemission['permission']));
                if ($permission->isAdmin == 1) {
                    return true;
                } else {
                    Tools::setSession("TOKEN", Tools::password(Tools::getSession("USER_LEVEL_TOKEN") . "||" . Tools::time("timestamp")));
                    return true;
                }
            } else {
                if ($tmp[0] == Tools::getSession("INIT_TOKEN") && $tmp[1] == Tools::getSession("RANDOM_TOKEN")) {
                    return $data == Tools::password(Tools::getSession("INIT_TOKEN") . "||" . Tools::getSession("RANDOM_TOKEN")) ? true : false;
                }
            }
        } else {
            $token = Tools::password($data, 'd');
            $tmp = explode("||", $token);
            if ($tmp[0] == Tools::getSession("INIT_TOKEN") && $tmp[1] == Tools::getSession("RANDOM_TOKEN")) {
                return $data == Tools::password(Tools::getSession("INIT_TOKEN") . "||" . Tools::getSession("RANDOM_TOKEN")) ? true : false;
            }
        }
        return false;
    }

    public static function randomString() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }

    public static function getPath($path) {
        return dirname(__FILE__) . "/../" . $path;
    }

    public static function getAsset($path) {
        return "assets/" . $path;
    }

    public static function getBaseUrl() {
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['PHP_SELF']);
        $actual_link = str_replace("admin", "", $actual_link);
        return $actual_link;
    }

    public static function getModule($name, $file = false) {
        $base_url = Tools::getBaseUrl();
        if ($file) {
            return $base_url . "module/$name";
        }
        return $base_url . "module/$name/index.php";
    }

    public static function getModuleTemplate($module, $mode = "index") {
        return dirname(__FILE__) . "/../module/" . $module . "/" . $mode . ".php";
    }

    public static function getModulePage($module, $page = "") {
        if ($page == "") {
            return "";
        }
        return dirname(__FILE__) . "/../module/" . $module . "/templates/" . $page . ".php";
    }

    public static function getModuleExtend($module, $page = "") {
        if ($page == "") {
            return "";
        }
        return dirname(__FILE__) . "/../module/" . $module . "/extend/" . $page . ".php";
    }

    public static function getModuleAssets($module, $link = "") {
        if ($link == "") {
            return "";
        }
        $base_url = Tools::getBaseUrl();
        return $base_url . "/module/" . $module . "/assets/" . $link;
    }

    public static function getAssetTheme($path, $theme = "default") {
        return "templates/$theme/" . $path;
    }

    public static function getTemplate($path, $theme = "default") {
        return dirname(__FILE__) . "/../templates/$theme/" . $path . ".php";
    }

    public static function array_to_object($array) {
        return (object) $array;
    }

    public static function object_to_array($object) {
        return (array) $object;
    }

    public static function hasSession($value) {
        if (isset($_SESSION[$value]) && $_SESSION[$value] != "") {
            return true;
        } else {
            return false;
        }
    }

    public static function setSession($name, $value = null) {
        if ($value == null) {
            unset($_SESSION[$name]);
            return;
        }
        $_SESSION[$name] = $value;
    }

    public static function getSession($value) {
        if (isset($_SESSION[$value]) && $_SESSION[$value] != "") {
            return $_SESSION[$value];
        } else {
            return false;
        }
    }

    public static function getRequest($value, $mode = "GET") {
        if (strtoupper($mode) == "GET") {
            if (isset($_GET[$value]) && $_GET[$value] != "") {
                return $_GET[$value];
            } else {
                return false;
            }
        } elseif (strtoupper($mode) == "POST") {
            if (isset($_POST[$value]) && $_POST[$value] != "") {
                return $_POST[$value];
            } else {
                return false;
            }
        }
        return false;
    }

    public static function hasRequest($value, $mode = "GET") {
        if ($mode == strtoupper("GET")) {
            if (isset($_GET[$value]) && $_GET[$value] != "") {
                return true;
            } else {
                return false;
            }
        } elseif ($mode == strtoupper("POST")) {
            if (isset($_POST[$value]) && $_POST[$value] != "") {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public static function createSession($name, $value) {
        $_SESSION[$name] = $value;
    }

    public static function init() {
        if (!Tools::hasSession("TOKEN") || !Tools::hasSession("RANDOM_TOKEN") || !Tools::hasSession("INIT_TOKEN")) {
            Tools::setSession("INIT_TOKEN", Tools::password(Tools::time("timestamp")));
            Tools::setSession("RANDOM_TOKEN", Tools::password(Tools::randomString()));
            Tools::setSession("TOKEN", Tools::password(Tools::getSession("INIT_TOKEN") . "||" . Tools::getSession("RANDOM_TOKEN")));
        }
    }

    public static function hasLogin() {
        if (Tools::hasSession("TOKEN")) {
            $token = Tools::password(Tools::getSession("TOKEN"), 'd');
            $tmp = explode("||", $token);
            if (sizeof($tmp) == 2) {
                return false;
            }
            if ($tmp[0] == Tools::getSession("INIT_TOKEN") && $tmp[1] == Tools::getSession("RANDOM_TOKEN")) {
                $master_key = Connect::conn()->get("core", "value", ['name' => "MASTER_KEY"]);
                if ($tmp[2] == $master_key) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function setLang($arr) {
        if (!Tools::hasSession("LANG")) {
            Tools::setSession("LANG", 'th');
        }

        if ($arr == null) {
            return false;
        }

        $lang = array();
        foreach ($arr as $key => $value) {
            $lang[$value['name']] = $value[Tools::getSession("LANG")];
        }

        return $lang;
    }

    public static function checkUserToken($token) {
        if (!Tools::hasSession("USER_LOGIN_NAME")) {
            return false;
        }

        $de = Tools::password($token, 'd');
        $username = substr($de, 0, strpos($de, "||"));
        return ($username == Tools::getSession("USER_LOGIN_NAME")) ? true : false;
    }

    public static function checkModuleEnable($module) {
        return Connect::conn()->has("module", ['status' => 1, 'module' => $module]);
    }

    public static function convertKeyToArr($arr) {
        $tmp = array();
        if (sizeof($arr) > 0) {
            foreach ($arr as $key => $value) {
                $tmp[$value['name']] = $value['value'];
            }
        }
        return $tmp;
    }

    public static function i18n($key, $isKey = true) {
        if (!Tools::hasSession("LANG")) {
            Tools::setSession("LANG", 'th');
        }

        $lang = Connect::conn()->get("lang", "*", ["name" => $key]);
        if ($isKey) {
            return ($lang[Tools::getSession("LANG")] != "") ? $lang[Tools::getSession("LANG")] : "{" . $key . "}";
        } else {
            return ($lang[Tools::getSession("LANG")] != "" ? $lang[Tools::getSession("LANG")] : "" . $key . "");
        }
    }

    public static function i18n_arr($key) {
        $lang = Connect::conn()->get("lang", "*", ["name[=]" => $key]);
        $lang_arr = Tools::getLangArray();
        if ($lang != false) {
            foreach ($lang_arr['data'] as $id => $value) {
                $result[$value] = $lang[$value];
            }
        } else {
            foreach ($lang_arr['data'] as $id => $value) {
                $result[$value] = "{$key}";
            }
        }
        return $result;
    }

    public static function getLangName() {
        $lang = Connect::conn()->get("lang_setting", ["name"], ["lang_key" => Tools::getSession("LANG")]);
        return ($lang['name'] == null) ? "{error}" : $lang['name'];
    }

    public static function getLangSetting() {
        $lang = Connect::conn()->select("lang_setting", ["name", "lang_key"]);
        return ($lang == null) ? "{error}" : $lang;
    }

    public static function getLangArray() {
        $sql = "SHOW COLUMNS FROM `lang`";
        $tmp = [];
        $tmp2 = [];
        $i = 0;
        $arr = Connect::conn()->query($sql)->fetchAll();
        foreach ($arr as $key => $value) {
            if ($value[0] != "id" && $value[0] != "name") {
                array_push($tmp, $value[0]);
                $i++;
            }
        }
        $lang_setting = Connect::conn()->select("lang_setting", ["name"]);
        foreach ($lang_setting as $key => $value) {
            array_push($tmp2, $value['name']);
        }
        return ['data' => $tmp, 'txt' => $tmp2];
    }

}
