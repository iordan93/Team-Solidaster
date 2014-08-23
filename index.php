<?php
include_once "config/constants.php";
include_once "config/bootstrap.php";
include_once "lib/bootstrap.php";

define("ROOT_DIR", dirname(__FILE__) . DS);
define("ROOT_PATH", basename(dirname( __FILE__)) . DS);
define("REQUEST_HOME", DS . ROOT_PATH);
define("ROOT_URL", "http://" . $_SERVER['HTTP_HOST']);

$request = $_SERVER["REQUEST_URI"];
if(strpos($request, REQUEST_HOME) === 0) {
    $request = substr($request, strlen(REQUEST_HOME));
    $parts = explode("/", $request, 3);

    $controller = "master";
    $action = "index";
    $parameters = "";

    if (isset($parts[0])) {
        $controller = $parts[0];
    }

    if (isset($parts[1])) {
        $action = $parts[1];
    }

    if (isset($parts[2])) {
        $parameters = $parts[2];
        if(endsWith($parameters, DS)) {
            $parameters = substr($parameters, 0, -1);
        }

        $parameters = explode("/", $parameters);
    }


}