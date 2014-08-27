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
            $username = $_POST["username"];
            $email = $_POST["email"];
            $role = $_POST["role"];

            if($this->model->update(array(
                "id" => $id,
                "username" => $username,
                "email" => $email,
                "role" => $role
            ), true)) {
                $_SESSION["messages"][] = array(1, "success", "User updated successfully.");
            } else {
                $_SESSION["messages"][] = array(1, "danger", "User was not updated. Please try again.");
            }
        }

        $user = $this->model->getById($id);
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "update.php";
        $pageTitle = "Edit user";
        require_once $this->layout;
    }
} 