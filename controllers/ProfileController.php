<?php
namespace Controllers;

use Lib\Auth;

class ProfileController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "user", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        header("Location: " . ABS_ROOT_URL);
    }

    public function register()
    {
        $auth = Auth::getInstance();
        $messages = array();
        if ($_POST) {
            $oldUser = $this->model->getAll(array(
                "where" => "username = '{$_POST["username"]}'"
            ));
            if (!empty($oldUser)) {
                $messages[] = array(1, "danger", "A user with this username already exists.");
            } else {
                $user = array(
                    "username" => $_POST["username"],
                    "password" => $_POST["password"],
                    "email" => isset($_POST["email"]) ? $_POST["email"] : ""
                );

                $auth->register($user["username"], $user["password"], $user["email"], "user");
                $auth->login($user["username"], $user["password"]);
                $messages[] = array(1, "success", "User registered successfully.");
                header("Location: " . ABS_ROOT_URL);
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "register.php";
        $pageTitle = "Register";
        $_SESSION["messages"] = $messages;
        require_once $this->layout;
    }
} 