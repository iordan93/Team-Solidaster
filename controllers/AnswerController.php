<?php

namespace Controllers;


class AnswerController extends BaseController {
    public function __construct($viewsDirectory = "", $layout = "", $model = "answer", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index() {
        header("Location: " . ABS_ROOT_URL); 
    }

    public function add() {
        if($_POST) {
            if($this->model->insert(array(
                "name" => $_POST["answerName"],
            ))) {
                $_SESSION["messages"][] = array(1, "success", "New answer successfully added.");
                header("Location: " . ABS_ROOT_URL);
            } else {
                $_SESSION["messages"][] = array(1, "danger", "Error creating new answer.");
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
        $pageTitle = "Add answer";
        require_once $this->layout;
    }

    public function view() {
        $answers = $this->model->getAll();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "view.php";
        $pageTitle = "Add answer";
        require_once $this->layout;
    }
} 