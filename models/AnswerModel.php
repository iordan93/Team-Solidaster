<?php
namespace Models;


class AnswerModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "answers"
        ));
    }

    public function getWithCategoriesByUser($userId) {
        $query = "SELECT * FROM dbe955951016744b458a8ba39000ee2d62.questions;select a.text, a.questions_id, q.title from answers as a join questions as q on a.questions_id = q.id where a.users_id = {$userId}";
        return self::processResults($this->dbConnection->query($query));
    }
}