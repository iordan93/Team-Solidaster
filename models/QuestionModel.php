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
        $query = "select q.id as id, q.title as title, q.time_created as time_created, q.times_viewed,
        q.vote_result as vote_result, u.username as author, u.id as user_id, (select count(1) as A1 from answers as a where q.id = a.questions_id) as answers_count,
        c.name as category, c.id as category_id from questions as q inner join categories as c on q.category_id = c.id inner join users as u on q.user_id = u.id order by q.time_created desc";
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