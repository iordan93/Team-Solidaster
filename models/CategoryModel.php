<?php
namespace Models;

class CategoryModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "categories"
        ));
    }

    public function getCounts() {
        $query = "SELECT categories.id, categories.name, COUNT(questions.id) AS questions_count FROM questions	LEFT JOIN categories ON questions.category_id = categories.id GROUP BY categories.id";
        $resultSet = $this->dbConnection->query($query);
        return self::processResults($resultSet);
    }
}