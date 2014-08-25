<?php
namespace Models;


class QuestionModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "questions"
        ));
    }
}