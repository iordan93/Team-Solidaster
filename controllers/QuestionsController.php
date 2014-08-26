<?php
namespace Controllers;

class QuestionsController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "question", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        header("Location: " . ABS_ROOT_URL);
    }

    public function details($id) {
        $question = $this->model->getDetailsDisplay($id);
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "details.php";
        $pageTitle = "Question Details";
        require_once $this->layout;
    }

    public function add() {
        if($_POST) {

        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
        $pageTitle = "Add new question";
        require_once $this->layout;
    }
} 