<?php
include_once 'User.php';

class LoginModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }

    public function login( $user_name, $user_password ) {
        global $pdo;

        //echo "FROM login(): UN: " . $user_name . " , UP: " . $user_password;

        $query = $pdo->prepare("SELECT * FROM user WHERE user_name = ? AND user_password = ?");

        $query->bindValue(1, $user_name);
        $query->bindValue(2, $user_password);

        $query->execute();

        //$this->getLoggedUserId( $user_name, $user_password );
        //$this->getLoggedUserRole( $user_name, $user_password );

        //redirection
        //header("Location: index.php?page=home");

    }

    public function logout() {
        // unset/destroy the session
        session_destroy();
        // clear values
        $_SESSION = array();
    }


}

?>