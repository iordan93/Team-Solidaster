<?php
namespace Admin\Controllers;

class AdminHomeController extends BaseAdminController {
    public function __construct($viewsDirectory = "", $layout = "", $model = "user", $auxModels = array()){
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index() {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "index.php";
        $pageTitle = "Administration";
        require_once $this->layout;
    }
} 