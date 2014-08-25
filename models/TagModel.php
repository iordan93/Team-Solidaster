<?php
namespace Models;


class TagModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "tags"
        ));
    }
}