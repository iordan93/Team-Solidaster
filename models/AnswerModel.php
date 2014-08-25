<?php
namespace Models;


class AnswerModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "answers"
        ));
    }
}