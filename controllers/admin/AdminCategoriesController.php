<?php

namespace Admin\Controllers;

class AdminCategoriesController extends BaseAdminController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "category", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }


    public function index()
    {
        header("Location: " . ABS_ADMIN_ROOT_URL);
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
                header("Location: " . ABS_ADMIN_ROOT_URL);
            } else {
                $_SESSION["messages"][] = array(1, "danger", "Error creating new category.");
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
        $pageTitle = "Add category";
        require_once $this->layout;
    }

    public function edit()
    {
        if ($_POST) {
            $categoryId = $_POST["categoryId"];
            header("Location: " . ABS_ADMIN_ROOT_URL . "categories/update/{$categoryId}");
        }

        $categories = $this->model->getAll();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "edit.php";
        $pageTitle = "Edit category";
        require_once $this->layout;
    }

    public function update($id) {
        if($_POST) {
            $name = $_POST["catName"];
            $description = $_POST["catDescription"];

            if($this->model->update(array(
                "id" => $id,
                "name" => $name,
                "description" => $description
            ), true)) {
                $_SESSION["messages"][] = array(1, "success", "Category updated successfully.");
            } else {
                $_SESSION["messages"][] = array(1, "danger", "Category was not updated. Please try again.");
            }
        }

        $category = $this->model->getById($id);
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "update.php";
        $pageTitle = "Edit category";
        require_once $this->layout;
    }
}