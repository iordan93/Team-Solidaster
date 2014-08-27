<?php
namespace Models;

class CategoryModel extends BaseModel {

    public function __construct($arguments = array()) {
        parent::__construct(array(
            "table" => "categories"
        ));
    }

    public function getCounts() {
        $query = "select categories.id, categories.name, count(questions.id) as questions_count from questions	left join categories on questions.category_id = categories.id group by categories.id";
        $resultSet = $this->dbConnection->query($query);
        return self::processResults($resultSet);
    }
}