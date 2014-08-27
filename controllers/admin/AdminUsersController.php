<?php
namespace Admin\Controllers;

class AdminUsersController extends BaseAdminController {
    public function __construct($viewsDirectory = "", $layout = "", $model = "user", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }


    public function index()
    {
        header("Location: " . ABS_ADMIN_ROOT_URL);
    }

    public function edit()
    {
        if ($_POST) {
            $userId = $_POST["userId"];
            header("Location: " . ABS_ADMIN_ROOT_URL . "users/update/{$userId}");
        }

        $users = $this->model->getAll();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "edit.php";
        $pageTitle = "Edit user";
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