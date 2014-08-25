<?php
namespace Models;
class HomeModel extends BaseModel {
    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "questions"
        ));
    }

} 