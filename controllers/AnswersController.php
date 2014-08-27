<?php

namespace Controllers;

use Lib\Auth;

class AnswersController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "answer", $auxModels = array("question"))
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        header("Location: " . ABS_ROOT_URL);
    }

    public function add($id)
    {
        $auth = Auth::getInstance();
        if ($auth->isAuthenticated()) {
            $question = $this->auxModels[0]->getById($id);
            if (!empty($question)) {
                if ($_POST) {
                    $answer = $_POST["answerText"];
                    if (mb_strlen($answer) < 5) {
                        $_SESSION["messages"][] = array(1, "danger", "The answer text is too short.");
                    } else {
                        if ($this->model->insert(array(
                            "text" => $answer,
                            "users_id" => $_SESSION[KEY_USER_ID],
                            "questions_id" => $question["id"]
                        ))
                        ) {
                            $_SESSION["messages"][] = array(1, "success", "Answer added successfully.");
                        } else {
                            $_SESSION["messages"][] = array(1, "danger", "The answer could not be added. Please try again later.");
                        }

                        header("Location: " . ABS_ROOT_URL . "questions/details/{$id}");
                    }
                }

                $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
                $pageTitle = "Add answer";
                require_once $this->layout;
            } else {
                $_SESSION["messages"][] = array(1, "danger", "No question specified to answer.");
                header("Location: " . ABS_ROOT_URL);
            }
        } else {
            header("Location: " . ABS_ROOT_URL);
        }
    }
}