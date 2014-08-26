<?php


namespace Controllers;


class CommentController extends BaseController {
    public function __construct($viewsDirectory = "", $layout = "", $model = "comment", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels); 
    }

    public function index() {
        header("Location: " . ABS_ROOT_URL);
    }

    public function add() {
        if($_POST) {
            if($this->model->insert(array(
                "comment" => $_POST["commentName"],
            ))) {
                $_SESSION["messages"][] = array(1, "success", "New comment successfully added.");
                header("Location: " . ABS_ROOT_URL);
            } else {
                $_SESSION["messages"][] = array(1, "danger", "Error creating new comment.");
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
        $pageTitle = "Add comment";
        require_once $this->layout;
    }

    public function view() {
        $comments = $this->model->getAll();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "view.php";
        $pageTitle = "Add comment";
        require_once $this->layout;
    }
} 