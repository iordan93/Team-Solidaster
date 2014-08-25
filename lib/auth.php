<?php
namespace Lib;

class Auth {
    private static $DEFAULT_COOKIE_LIFETIME = 36000;

    private static $session;

    private function __construct(){

        session_set_cookie_params(self::$DEFAULT_COOKIE_LIFETIME, "/");
        session_start();
    }

    public static function getInstance(){
        static $instance = null;
        if($instance == null) {
            $instance = new static();
        }
    }

    public static function isAuthenticated(){
        return isset ($_SESSION[KEY_USERNAME]);
    }

    public static function login($username, $password) {
        $database = Database::getDatabase();
        $statement = $database->prepare("SELECT id, username FROM users WHERE username = ? AND password = MD5(?) LIMIT 1");
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        $resultSet = $statement->get_result();

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