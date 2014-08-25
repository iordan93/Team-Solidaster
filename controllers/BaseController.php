<?php
namespace Controllers;

abstract class BaseController {
    public $layout;
    public $viewsDirectory;
    public $model;
    public $auxModels;

    public function __construct($viewsDirectory = "", $layout = "", $model = "", $auxModels = array())
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

        require_once "models/BaseModel.php";
        if(empty($model)){
            $this->loadModelFile($model, $className);
        }

        if(is_array($auxModels)){
            foreach ($auxModels as $model) {
                $this->loadModelFile($model, $className);
            }
        }

        $this->layout = $layout;
        $this->viewsDirectory = $viewsDirectory;
    }

    private function loadModelFile($model, $className) {
        $modelFileName = ROOT_DIR . "models/".ucfirst($className)."Model.php";
        if(file_exists($modelFileName)){
            require_once $modelFileName;
        }
    }
} 