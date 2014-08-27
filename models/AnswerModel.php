<?php
namespace Models;


class AnswerModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "answers"
        ));
    }

    public function getWithCategoriesByUser($userId) {
        $query = "select a.text, q.title from answers as a join questions as q on a.questions_id = q.id where a.user_id = {$userId}";
        return self::processResults($this->dbConnection->query($query));
    }
}