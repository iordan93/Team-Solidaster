<?php
include_once "config/constants.php";
include_once "config/bootstrap.php";
include_once "lib/bootstrap.php";

define("ROOT_DIR", dirname(__FILE__) . DS);
define("ROOT_PATH", basename(dirname(__FILE__)) . DS);
define("REQUEST_HOME", DS . ROOT_PATH);
define("ROOT_URL", "http://" . $_SERVER['HTTP_HOST']);

$request = $_SERVER["REQUEST_URI"];
if (strpos($request, REQUEST_HOME) === 0) {
    $request = substr($request, strlen(REQUEST_HOME));
    $parts = explode("/", $request, 3);

    $controller = "home";
    $action = "index";
    $parameters = array();

    if (isset($parts[0])) {
        $controller = $parts[0];
    }

    if (isset($parts[1])) {
        $action = $parts[1];
    }

    if (isset($parts[2])) {
        $parameters = $parts[2];
        $parameters = preg_split('/\//', $parameters, 0, PREG_SPLIT_NO_EMPTY);
    }

    $controllerFileName = "controllers/" . ucfirst($controller) . "Controller.php";
    if (file_exists($controllerFileName)) {
        include_once $controllerFileName;
        $controllerClass = "\\Controllers\\" . ucfirst($controller) . "Controller";
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