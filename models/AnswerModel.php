<?php
namespace Models;


class AnswerModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "answers"
        ));
    }

    public function getWithCategoriesByUser($userId) {
        $query = "select a.text, a.question_id, q.title from answers as a join questions as q on a.questions_id = q.id where a.users_id = {$userId}";
        return self::processResults($this->dbConnection->query($query));
    }
}