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


} 