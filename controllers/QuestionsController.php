<?php
namespace Controllers;

use Lib\Auth;
use Lib\Database;

class QuestionsController extends BaseController
{
    public function __construct($viewsDirectory = "", $layout = "", $model = "question", $auxModels = array("category", "tag"))
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        header("Location: " . ABS_ROOT_URL);
    }

    public function details($id)
    {
        $question = $this->model->getDetailsDisplay($id);
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "details.php";
        $pageTitle = "Question Details";
        require_once $this->layout;
    }

    public function add()
    {
        $auth = Auth::getInstance();
        if (!$auth->isAuthenticated()) {
            $_SESSION["messages"][] = array(1, "danger", "You are not allowed to post in this forum.");
            header("Location: " . ABS_ROOT_URL);
        } else {
            if ($_POST) {
                $error = false;
                $title = $_POST["title"];
                $text = $_POST["content"];
                $tags = preg_split('/[ ,;]/', $_POST["tags"], 0, PREG_SPLIT_NO_EMPTY);
                if (mb_strlen($title) < 5 || mb_strlen($title) > 300) {
                    $_SESSION["messages"][] = array(1, "danger", "The title must be between 5 and 300 symbols.");
                    $error = true;
                }

                if (mb_strlen($text) < 5) {
                    $_SESSION["messages"][] = array(1, "danger", "The text must be at least 5 symbols.");
                    $error = true;
                }

                if (empty($tags)) {
                    $_SESSION["messages"][] = array(1, "danger", "There are no tags for this question.");
                    $error = true;
                }

                if (!$error && ($questionId = $this->model->insert(array(
                        "title" => $title,
                        "text" => $text,
                        "vote_result" => 0,
                        "times_viewed" => 0,
                        "category_id" => $_POST["categoryId"],
                        "user_id" => $_SESSION[KEY_USER_ID]
                    )))
                ) {
                    foreach ($tags as $tag) {
                        $existingTag = $this->auxModels[1]->getAll(array(
                            "where" => "name = '{$tag}'"
                        ));

                        if (!empty($existingTag)) {
                            $tagId = $existingTag[0]["id"];

                        } else {
                            $tagId = $this->auxModels[1]->insert(array(
                                "name" => $tag
                            ));
                        }

                        $db = Database::getDatabase();
                        $result = $db->query("insert into questions_tags (question_id, tag_id) values ({$questionId}, {$tagId})");
                    }

                    $_SESSION["messages"][] = array(1, "success", "Question added successfully.");
                    header("Location: " . ABS_ROOT_URL);
                }
            }

            $categories = $this->auxModels[0]->getAll();
            $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
            $pageTitle = "Add new question";
            require_once $this->layout;
        }
    }
} 