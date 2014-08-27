<?php

namespace Admin\Controllers;

class AdminTagsController extends BaseAdminController {
    public function __construct($viewsDirectory = "", $layout = "", $model = "tag", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }

    public function index()
    {
        header("Location: " . ABS_ADMIN_ROOT_URL);
    }

    public function add() {
        if ($_POST) {
            if ($this->model->insert(array(
                "name" => $_POST["tagName"],
            ))
            ) {
                $_SESSION["messages"][] = array(2, "success", "New tag successfully added.");
                header("Location: " . ABS_ADMIN_ROOT_URL);
            } else {
                $_SESSION["messages"][] = array(1, "danger", "Error creating new tag.");
            }
        }

        $templateFileName = ROOT_DIR . $this->viewsDirectory . "add.php";
        $pageTitle = "Add category";
        require_once $this->layout;
    }

    public function edit()
    {
        if ($_POST) {
            $tagId = $_POST["tagId"];
            header("Location: " . ABS_ADMIN_ROOT_URL . "tags/update/{$tagId}");
        }

        $tags = $this->model->getAll();
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "edit.php";
        $pageTitle = "Edit tag";
        require_once $this->layout;
    }

    public function update($id) {
        if($_POST) {
            $name = $_POST["tagName"];

            if($this->model->update(array(
                "id" => $id,
                "name" => $name
            ), true)) {
                $_SESSION["messages"][] = array(1, "success", "Tag updated successfully.");
            } else {
                $_SESSION["messages"][] = array(1, "danger", "Tag was not updated. Please try again.");
            }
        }

        $tag = $this->model->getById($id);
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "update.php";
        $pageTitle = "Edit tag";
        require_once $this->layout;
    }
} 