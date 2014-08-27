<?php
namespace Admin\Controllers;

class AdminUsersController extends BaseAdminController {
    public function __construct($viewsDirectory = "", $layout = "", $model = "user", $auxModels = array())
    {
        parent::__construct($viewsDirectory, $layout, $model, $auxModels);
    }


    public function index()
    {
        header("Location: " . ABS_ADMIN_ROOT_URL);
    }

    public function edit() {

    }
} 