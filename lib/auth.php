<?php
namespace Lib;

use Models\UserModel;

class Auth {
    private function __construct(){
    }

    public static function getInstance(){
        static $instance = null;
        if($instance == null) {
            $instance = new static();
        }

        return $instance;
    }

    public static function isAuthenticated(){
        return isset ($_SESSION[KEY_USERNAME]);
    }

    public static function isAdmin() {
        if (!self::isAuthenticated()) {
            return false;
        }

        include_once "models/UserModel.php";
        $model = new UserModel();
        $user = $model->getById($_SESSION[KEY_USER_ID]);
        return $user["role"] == "admin";
    }

    public static function register($username, $password, $email = "", $role = "user") {
        $database = Database::getDatabase();
        $statement = $database->prepare("insert into users (username, password, email, role) values (?, MD5(?), ?, ?)");
        $statement->bind_param("ssss", $username, $password, $email, $role);
        $statement->execute();
        return $statement->affected_rows != 0;
    }

    public static function login($username, $password) {
        $database = Database::getDatabase();
        $statement = $database->prepare("select id, username from users where username = ? and password = MD5(?) LIMIT 1");
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        $resultSet = $statement->get_result();

        if ($row = $resultSet->fetch_assoc()) {
            $_SESSION[KEY_USERNAME] = $row["username"];
            $_SESSION[KEY_USER_ID] = $row["id"];
            return true;
        }

        return false;
    }

    public function getAuthenticatedUser(){
        $userInfo = array();
        if (isset($_SESSION[KEY_USERNAME]) && isset($_SESSION[KEY_USER_ID])) {
            $userInfo[KEY_USERNAME] = $_SESSION[KEY_USERNAME];
            $userInfo[KEY_USER_ID] = $_SESSION[KEY_USER_ID];
        }

        return $userInfo;
    }

    public function logout() {
        session_destroy();
    }
}