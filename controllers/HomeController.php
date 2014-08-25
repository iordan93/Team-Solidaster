<?php
namespace Controllers;

class HomeController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "index.php";
        $pageTitle = "Home";
        require_once $this->layout;
    }

    public function func()
    {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "func.php";
        $pageTitle = "Func";
        require_once $this->layout;
    }
}