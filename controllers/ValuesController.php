<?php
namespace Controllers;

class ValuesController extends HomeController
{
    public $layout;
    public $viewsDirectory;


    public function __construct(
            $viewsDirectory = "",
            $layout = "") {
        parent::__construct($viewsDirectory, $layout);
    }

   public function index() {
       $templateFileName = ROOT_DIR . $this->viewsDirectory . "index.php";
       $pageTitle = "Values index";
       require_once $this->layout;
   }

    public function func() {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "func.php";
        $pageTitle = "Values func";
        require_once $this->layout;
    }
}