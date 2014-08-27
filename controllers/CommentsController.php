<?php
namespace Controllers;

use Lib\Auth;

class CommentsController extends BaseController {
    public function __construct($viewsDirectory = "", $layout = "", $model = "comment", $auxModels = array("answer"))
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels); 
    }

    public function index() {
        header("Location: " . ABS_ROOT_URL);
    }

    public function add($id)
    {
        $auth = Auth::getInstance();
        if ($auth->isAuthenticated()) {
            $answer = $this->auxModels[0]->getById($id);
            if (!empty($answer)) {
                if ($_POST) {
                    $comment = $_POST["commentText"];
                    if (mb_strlen($comment) < 5) {
                        $_SESSION["messages"][] = array(1, "danger", "The comment text is too short.");
                    } else {
                        if ($this->model->insert(array(
                            "text" => $comment,
                            "user_id" => $_SESSION[KEY_USER_ID],
                            "answer_id" => $answer["id"]
                        ))
                        ) {
                            $_SESSION["messages"][] = array(1, "success", "Comment added successfully.");
                        } else {
                            $_SESSION["messages"][] = array(1, "danger", "The comment could not be added. Please try again later.");
                        }

                        header("Location: " . ABS_ROOT_URL . "questions/details/{$answer["questions_id"]}");
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