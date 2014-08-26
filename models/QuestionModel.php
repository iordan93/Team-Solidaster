<?php
namespace Models;


class QuestionModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "questions"
        ));
    }

    public function getConciseDisplay() {
        $query = "SELECT q.id AS id, q.title AS title, q.time_created AS time_created, q.times_viewed, q.vote_result AS vote_result, u.username AS author, (SELECT COUNT(1) AS A1 FROM answers AS a WHERE q.id = a.questions_id)AS answers_count, c.name AS category FROM questions AS q INNER JOIN categories AS c ON q.category_id = c.id INNER JOIN users AS u on q.user_id = u.id";
        $resultSet = $this->dbConnection->query($query);
        return self::processResults($resultSet);
    }
}