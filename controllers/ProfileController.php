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
                $messages[] = array("danger" => "A user with this username already exists.");
            } else {
                $user = array(
                    "username" => $_POST["username"],
                    "password" => $_POST["password"],
                    "email" => isset($_POST["email"]) ? $_POST["email"] : ""
                );

                $auth->register($user["username"], $user["password"], $user["email"], "user");
                $messages[] = array("success" => "User successfully registered.");
                $auth->login($user["username"], $user["password"]);
                header("Location: " . ABS_ROOT_URL);
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "register.php";
        $pageTitle = "Register";
        require_once $this->layout;
        $_SESSION["messages"] = $messages;
    }
} 