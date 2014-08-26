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

//    public function add()
//    {
//        if ($_POST) {
//            if ($this->model->insert(array(
//                "title" => $_POST["title"],
//                "text" => $_POST["text"],
//                "tag" => $_POST["tag"],
//                "category" => $_POST["category"],
//            ))
//            ) {
//                $_SESSION["messages"][] = array(1, "success", "Successfully added new question!");
//                header("Location: " . ABS_ROOT_URL);
//            } else {
//                $_SESSION["messages"][] = array(1, "danger", "Adding new question failed!");
//            }
//        }
//
//        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
//        $pageTitle = "Add Question";
//        require_once $this->layout;
//    }

    public function view()
    {
        $questions = $this->model->getAll();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "view.php";
        $pageTitle = "View All Questions";
        require_once $this->layout;
    }

    public function details($id) {
        $question = $this->model->getDetailsDisplay($id);
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "details.php";
        $pageTitle = "Question Details";
        require_once $this->layout;
    }
} 