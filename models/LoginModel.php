<?php
include_once 'User.php';

class LoginModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }

    public function login() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM user WHERE user_name = ? and user_password = ?");

        $query->bindValue(1, $user_name);
        $query->bindValue(2, $user_password);

        $query->execute();

        //redirection
        header("Location: index.php?page=home");

    }

    public function logout() {
        // unset/destroy the session
        session_destroy();
        // clear values
        $_SESSION = array();
    }
}

?>