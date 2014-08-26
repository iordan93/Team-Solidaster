<?php
namespace Models;

use \Lib\Database;

abstract class BaseModel
{
    // <editor-fold name="Properties" defaultstate="collapsed">
    public $dbConnection;

    public $table;
    public $columns;
    public $where;
    public $limit;

    //</editor-fold>

    public function __construct($arguments = array())
    {
        $arguments = self::mergeArgumentsWithDefault($arguments);
        if (!isset($arguments["table"])) {
            die("No table selected.");
        }

        $this->table = $arguments["table"];
        $this->columns = $arguments["columns"];
        $this->where = $arguments["where"];
        $this->limit = $arguments["limit"];

        $this->dbConnection = Database::getDatabase();
    }

    public function getAll($arguments = array())
    {
        $arguments = self::mergeArgumentsWithDefault($arguments);
        $query = $this->buildQuery($arguments);
        $resultSet = $this->dbConnection->query($query);
        $results = self::processResults($resultSet);
        return $results;
    }

    public function getById($id, $arguments = array())
    {
        $arguments = array_merge($arguments, array("where" => "id = {$id}"));
        return $this->getAll($arguments)[0];
    }

    public function insert($arguments)
    {
        $keys = implode(", ", array_keys($arguments));
        $values = implode(", ", array_map(function ($element) {
            return "'" . $this->dbConnection->real_escape_string($element) . "'";
        }, array_values($arguments)));

        $query = "insert into {$this->table} ({$keys}) values ({$values})";
        $this->dbConnection->query($query);
        return $this->dbConnection->affected_rows;
    }

    public function update($arguments, $escape = false)
    {
        if (!isset($arguments["id"])) {
            die("No id specified to update.");
        }

        $query = "update {$this->table} set ";
        foreach ($arguments as $key => $value) {
            if ($key == "id") {
                continue;
            }

            if ($escape) {
                $query .= "{$key} = '" . $this->dbConnection->real_escape_string($value) . "',  ";
            } else {
                $query .= "{$key} = " . $this->dbConnection->real_escape_string($value) . ",  ";
            }
        }

        $query = rtrim($query, ", ");
        $query .= " where id = " . $arguments["id"];
        $this->dbConnection->query($query);
        return $this->dbConnection->affected_rows;
    }

    public function delete($id)
    {
        if (!is_int($id)) {
            die("Incorrect id specified to delete.");
        }

        $query = "delete from {$this->table} where id = {$id}";
        $this->dbConnection->query($query);
        return $this->dbConnection->affected_rows;
    }

    // <editor-fold name="Private members" defaultstate="collapsed">
    private function buildQuery($arguments)
    {
        if (is_array($arguments["columns"])) {
            $arguments["columns"] = array_map(function ($element) {
                return $this->dbConnection->real_escape_string($element);
            }, $arguments["columns"]);
            $arguments["columns"] = implode(", ", $arguments["columns"]);
        } else {
            $arguments["columns"] = $this->dbConnection->real_escape_string($arguments["columns"]);
        }

        $query = "select {$arguments["columns"]} from {$this->table}";

        if (!empty($arguments["where"])) {
            if (is_array($arguments["where"])) {
                $arguments["where"] = array_map(function ($element) {
                    return $this->dbConnection->real_escape_string($element);
                }, $arguments["where"]);

                $whereAsString = "";
                $isFirstElement = true;
                foreach ($arguments["where"] as $key => $value) {
                    if ($isFirstElement) {
                        $whereAsString = $value;
                        $isFirstElement = false;
                    } else {
                        $whereAsString .= " {$key} {$value}";
                    }
                }

                $arguments["where"] = $whereAsString;
            } else {
                // $arguments["where"] = $this->dbConnection->real_escape_string($arguments["where"]);
            }

            $query .= " where {$arguments["where"]}";
        }

        if (isset($arguments["orderBy"])) {
            $orderByClause = mergeKeysAndValues($arguments["orderBy"]);
            $arguments["orderBy"] = implode(", ", $orderByClause);
            $query .= " order by {$arguments["orderBy"]}";
        }

        if (isset($arguments["limit"]) && is_int($arguments["limit"]) && $arguments["limit"] != 0) {
            $query .= " limit {$arguments["limit"]}";
        }

        return $query;
    }

    private static function mergeArgumentsWithDefault($arguments)
    {
        $defaultArguments = array(
            "columns" => "*",
            "where" => "",
            "limit" => 0
        );

        return array_merge($defaultArguments, $arguments);
    }

    protected static function processResults($resultSet)
    {
        $results = array();
        if (!empty($resultSet) && $resultSet->num_rows > 0) {
            while ($row = $resultSet->fetch_assoc()) {
                $results[] = $row;
            }
        }

        return $results;
    }
// </editor-fold>
}