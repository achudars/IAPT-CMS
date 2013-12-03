<?php
include_once 'User.php';

class LoginModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }

    public function login( $user_name, $user_password ) {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

        $query->bindValue(1, $user_name);
        $query->bindValue(2, $user_password);

        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if(!$row) {
            die("User with user name " . $user_name ." does not exist.");
        } else {
            $_SESSION["user_name"] = $user_name;
            $_SESSION["user_password"] = $user_password;
        }

        //$this->getLoggedUserId( $user_name, $user_password );
        //$this->getLoggedUserRole( $user_name, $user_password );

        //redirection
        header("Location: index.php?page=home");
        echo $_SESSION["user_name"];
        echo $_SESSION["user_password"];
    }

    public function logout() {
        // unset/destroy the session
        session_destroy();
        // clear values
        $_SESSION = array();
    }


}

?>