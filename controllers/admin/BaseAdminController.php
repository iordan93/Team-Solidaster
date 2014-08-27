<?php
namespace Admin\Controllers;

use Controllers\BaseController;

abstract class BaseAdminController extends BaseController
{
    public $layout;
    public $viewsDirectory;
    public $model;
    public $auxModels;

    public function __construct($viewsDirectory = "", $layout = "", $model = "", $auxModels = array())
    {
        if (empty($layout)) {
            $layout = ROOT_DIR . "views/shared/adminLayout.php";
        }

        $classParts = explode("\\", get_called_class());
        $className = $classParts[count($classParts) - 1];
        $className = mb_strtolower(substr($className, 0, strpos($className, CONTROLLER_SUFFIX)));
        $className = substr($className, strlen("admin"));
        if (empty($viewsDirectory)) {
            $viewsDirectory = "views/admin/{$className}/";
        }

        require_once "models/BaseModel.php";

        if (empty($model)) {
            $this->model = $this->loadModelFile($className);
        } else {
            $this->model = $this->loadModelFile($model);
        }

        if (is_array($auxModels)) {
            foreach ($auxModels as $model) {
                $this->auxModels[] = $this->loadModelFile($model);
            }
        }

        $this->layout = $layout;
        $this->viewsDirectory = $viewsDirectory;
    }

    protected function loadModelFile($className)
    {
        $canonicalModelName = ucfirst($className) . "Model";
        $modelFileName = ROOT_DIR . "models/{$canonicalModelName}.php";

        if (file_exists($modelFileName)) {
            require_once $modelFileName;
        }

        $instance = "\\Models\\$canonicalModelName";
        return new $instance();
    }
} 