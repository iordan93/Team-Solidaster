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

    public function all()
    {
        $categories = $this->model->getCounts();
        $title = "Categories";
        return array("title" => $title, "categories" => $categories);
    }

    public function view($id)
    {
        $category = $this->model->getById($id);
        $questions = $this->auxModels[0]->getWithUsers($id);

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "view.php";
        $pageTitle = "Category \"{$category["name"]}\"";
        require_once $this->layout;
    }
} 