<?php
namespace Controllers;

use Lib\Auth;

class ProfileController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "user", $auxModels = array("question", "answer", "comment"))
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
        if ($_POST && !Auth::isAuthenticated()) {
            $oldUser = $this->model->getAll(array(
                "where" => "username = '" . $this->model->dbConnection->real_escape_string($_POST["username"]) . "'"
            ));
            if (!empty($oldUser)) {
                $messages[] = array(1, "danger", "A user with this username already exists.");
            } else {
                if (!isset($_POST["confirmPassword"]) || $_POST["password"] != $_POST["confirmPassword"]) {
                    $messages[] = array(1, "danger", "The passwords do not match.");
                } else {
                    $user = array(
                        "username" => $_POST["username"],
                        "password" => $_POST["password"],
                        "email" => isset($_POST["email"]) ? $_POST["email"] : ""
                    );

                    $auth->register($user["username"], $user["password"], $user["email"], "user");
                    $auth->login($user["username"], $user["password"]);
                    $messages[] = array(1, "success", "You have registered successfully.");
                    header("Location: " . ABS_ROOT_URL);
                }
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "register.php";
        $pageTitle = "Register";
        $_SESSION["messages"] = $messages;
        require_once $this->layout;
    }

    public function login()
    {
        $auth = Auth::getInstance();
        $messages = array();
        if ($_POST && !Auth::isAuthenticated()) {
            $username = $this->model->dbConnection->real_escape_string($_POST["loginUsername"]);
            $password = $this->model->dbConnection->real_escape_string($_POST["loginPassword"]);
            $user = $this->model->getAll(array(
                "where" => "username = '{$username}'"
            ));

            if (empty($user)) {
                $messages[] = array(1, "danger", "The username or password is invalid.");
            } else {
                $auth->login($username, $password);
                $messages[] = array(1, "success", "You have successfully logged in.");
            }
        }

        $_SESSION["messages"] = $messages;
        header("Location: " . ABS_ROOT_URL);
    }

    public function logout()
    {
        $auth = Auth::getInstance();
        if ($auth->isAuthenticated()) {
            $auth->logout();
            header("Location: " . ABS_ROOT_URL);
        }
    }

    public function show($id)
    {
        $user = $this->model->getById($id);
        if (empty($user)) {
            $_SESSION["messages"][] = array(1, "danger", "There is no such user.");
            header("Location: " . ABS_ROOT_URL);
        } else {
            $questions = $this->auxModels[0]->getAll(array(
                "where" => "user_id = {$id}"
            ));
            $answers = $this->auxModels[1]->getAnswersWithCategories($id);
            $comments = $this->auxModels[2]->getAll(array(
                "where" => "user_id = {$id}"
            ));

            $templateFileName = ROOT_DIR . $this->viewsDirectory . "show.php";
            $pageTitle = "User {$user["username"]}";
            require_once $this->layout;
        }
    }
} 