<?php
namespace Models;


class CategoryModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "categories"
        ));
    }
}