<?php
namespace Controllers;

use Models\BaseModel;

class HomeController extends BaseController
{
    public function index()
    {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "index.php";
        $pageTitle = "Home";

//        $db = new BaseModel(array(
//            "table" => "users"));
//        $users = $db->getAll();
        require_once $this->layout;
    }

    public function func()
    {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "func.php";
        $pageTitle = "Func";
        require_once $this->layout;
    }
}