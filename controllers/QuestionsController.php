<?php
namespace Controllers;

class QuestionsController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "question", $auxModels = array("category"))
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        header("Location: " . ABS_ROOT_URL);
    }

    public function details($id)
    {
        $question = $this->model->getDetailsDisplay($id);
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "details.php";
        $pageTitle = "Question Details";
        require_once $this->layout;
    }

    public function add()
    {
        if ($_POST) {
            if ($this->model->insert(array(
                "title" => $_POST["title"],
                "text" => $_POST["text"],
                "vote_result" => 0,
                "times_viewed" => 0,
                "category_id" => $_POST["categoryId"]
            ))
            ) {
                $_SESSION["messages"][] = array(1, "success", "Answer successfully added");
            }
        }

        $categories = $this->auxModels[0]->getAll();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
        $pageTitle = "Add new question";
        require_once $this->layout;
    }

    public function count() {
        $count = $this->model->getAll(array(
            "columns"=>"count(*)"
        ));

        return intval($count[0]["count(*)"]);
    }
} 