<?php
namespace Controllers;

class HomeController
{
    public $layout;
    public $viewsDirectory;

    public function __construct(
        $viewsDirectory = "",
        $layout = "")
    {
        $this->viewsDirectory = $viewsDirectory;
        if (empty($layout)) {
            $layout = ROOT_DIR . "views/shared/layout.php";
        }

        $classParts = explode("\\", get_called_class());
        $className = $classParts[count($classParts) - 1];
        $className = mb_strtolower(substr($className, 0, strpos($className, CONTROLLER_SUFFIX)));
        if (empty($viewsDirectory)) {
            $viewsDirectory = "views/{$className}/";
        }

        $this->viewsDirectory = $viewsDirectory;
        $this->layout = $layout;
    }

    public function index()
    {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "index.php";
        $pageTitle = "Home";
        require_once $this->layout;
    }

    public function func()
    {
        $templateFileName = ROOT_DIR . $this->viewsDirectory . "func.php";
        $pageTitle = "Func";
        require_once $this->layout;
    }
}