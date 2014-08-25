<?php
namespace Models;


class VoteModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "votes"
        ));
    }
}