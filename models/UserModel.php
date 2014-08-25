<?php
namespace Models;

class UserModel extends BaseModel {
    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "users"
        ));
    }
} 