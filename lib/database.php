<?php
namespace Lib;

class Database
{
    private static $db = null;

    private function __construct()
    {
        $host = DB_HOST;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;
        $database = DB_DATABASE;
        $db = new \mysqli($host, $username, $password, $database);
        self::$db = $db;
    }

    private static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new static();
        }

        return $instance;
    }

    // TODO: Check if self::getInstance() is doing any problems
    public static function getDatabase()
    {
        self::getInstance();
        return self::$db;
    }
}