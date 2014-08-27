<?php
mb_internal_encoding("utf-8");
date_default_timezone_set("Europe/Sofia");
define("DEFAULT_COOKIE_LIFETIME", 36000);
session_set_cookie_params(DEFAULT_COOKIE_LIFETIME, "/");
session_start();

include_once "config/constants.php";
include_once "config/db.php";
include_once "lib/bootstrap.php";
include_once "lib/auth.php";

define("ROOT_DIR", dirname(__FILE__) . "\\");
define("ROOT_PATH", basename(dirname(__FILE__)) . DS);
define("REQUEST_HOME", DS . ROOT_PATH);
define("ROOT_URL", "http://" . $_SERVER['HTTP_HOST']);
define("ABS_ROOT_URL", ROOT_URL . DS .ROOT_PATH);
define("ABS_ADMIN_ROOT_URL", ABS_ROOT_URL . "admin/");

$request = $_SERVER["REQUEST_URI"];
if (strpos($request, REQUEST_HOME) === 0) {
    $request = substr($request, strlen(REQUEST_HOME));
    $adminRouting = false;
    if(startsWith($request, "admin/")) {
        $adminRouting = true;
        include_once "controllers/BaseController.php";
        include_once "controllers/admin/BaseAdminController.php";
        $request = substr($request, strlen("admin/"));
    }

    $parts = explode("/", $request, 3);

    $controller = "home";
    $action = "index";
    $parameters = array();

    if (isset($parts[0]) && !empty($parts[0])) {
        $controller = strtolower($parts[0]);
    }

    if (isset($parts[1])) {
        $action = strtolower($parts[1]);
    }

    if (isset($parts[2])) {
        $parameters = $parts[2];
        $parameters = preg_split('/\//', $parameters, 0, PREG_SPLIT_NO_EMPTY);
    }

    include_once "controllers/BaseController.php";
    include_once "controllers/admin/BaseAdminController.php";
    include_once "controllers/admin/AdminHomeController.php";
    include_once "models/BaseModel.php";

    $controllerFileName = "controllers/" . ucfirst($controller) . "Controller.php";
    if (file_exists($controllerFileName)) {
        include_once $controllerFileName;
        $adminNamespace = $adminRouting ? "\\Admin" : "";
        $adminPrefix = $adminRouting ? "Admin" : "";
        if($adminRouting) {
            $controllerFileName = "controllers/admin/Admin" . ucfirst($controller) . "Controller.php";
        }

        include_once $controllerFileName;
        $controllerClass = $adminNamespace . "\\Controllers\\" . $adminPrefix .ucfirst($controller) . "Controller";
        $controllerInstance = new $controllerClass();

        if (method_exists($controllerInstance, $action)) {
            call_user_func_array(array($controllerInstance, $action), $parameters);
        } else {
            call_user_func_array(array($controllerInstance, "index"), array());
        }
    } else {
        include_once "controllers/HomeController.php";
        $controllerInstance = new \Controllers\HomeController();
        $controllerInstance->index();
    }
}