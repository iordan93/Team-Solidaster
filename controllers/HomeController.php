<?php
namespace Controllers;

use Lib\Auth;

class HomeController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "question", $auxModels = array("category", "answer"))
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        $questions = $this->model->getConciseDisplay();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "index.php";
        $pageTitle = "Home";
        require_once $this->layout;
    }
}