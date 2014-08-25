<?php
namespace Models;


class CommentModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "comments"
        ));
    }
}