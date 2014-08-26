<?php
namespace Models;


class QuestionModel extends BaseModel
{

    public function __construct($arguments = array())
    {
        parent::__construct(array(
            "table" => "questions"
        ));
    }

    public function getConciseDisplay()
    {
        $query = "SELECT q.id AS id, q.title AS title, q.time_created AS time_created, q.times_viewed,
        q.vote_result AS vote_result, u.username AS author, u.id AS user_id, (SELECT COUNT(1) AS A1 FROM answers AS a WHERE q.id = a.questions_id)AS answers_count,
        c.name AS category, c.id as category_id FROM questions AS q INNER JOIN categories AS c ON q.category_id = c.id INNER JOIN users AS u on q.user_id = u.id";
        $resultSet = $this->dbConnection->query($query);
        return self::processResults($resultSet);
    }

    public function getDetailsDisplay($id)
    {
        $query = "select q.title, q.text, q.time_created,q.vote_result, c.id as category_id, c.name as category, u.username as author
from questions as q
join categories as c
on q.category_id = c.id
join users as u
on q.user_id = u.id
where q.id = {$id}";
        $question = self::processResults($this->dbConnection->query($query));
        $query = "select tags.name from (select q.id, t.name
from questions as q
left outer join questions_tags as qt
on qt.question_id = q.id
join tags as t
on qt.tag_id = t.id
where q.id = {$id}
order by q.id) as tags";
        $tags = self::processResults($this->dbConnection->query($query));

        $query = "select a.text, a.time_created, u.username
from answers as a
join users as u
on a.users_id = u.id
where a.questions_id = {$id}";
        $answers = self::processResults($this->dbConnection->query($query));

        $this->update(array("id" => $id, "times_viewed" => "times_viewed + 1"), false);

        return array("question" => $question, "tags" => $tags, "answers" => $answers);
    }

    public function getWithUsers($id) {
        $query = "select q.id, q.title, q.text, q.time_created, q.vote_result, q.times_viewed, u.username from questions as q join users as u on q.user_id = u.id where category_id = {$id}";
        return self::processResults($this->dbConnection->query($query));
    }
}