<?php
namespace Controllers;

class CategoriesController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "category", $auxModels = array("question"))
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        header("Location: " . ABS_ROOT_URL);
    }

    public function add()
    {
        if ($_POST) {
            if ($this->model->insert(array(
                "name" => $_POST["catName"],
                "description" => $_POST["catDescription"]
            ))
            ) {
                $_SESSION["messages"][] = array(1, "success", "New category successfully added.");
                header("Location: " . ABS_ROOT_URL);
            } else {
                $_SESSION["messages"][] = array(1, "danger", "Error creating new category.");
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
        $pageTitle = "Add category";
        require_once $this->layout;
    }

    public function all()
    {
        $categories = $this->model->getCounts();
        $title = "Categories";
        return array("title" => $title, "categories" => $categories);
    }

    public function view($id)
    {
        $category = $this->model->getById($id);
        $questions = $this->auxModels[0]->getAll(array(
            "where" => "category_id = {$id}"
        ));

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "view.php";
        $pageTitle = "Category \"{$category["name"]}\"";
        require_once $this->layout;
    }
} 