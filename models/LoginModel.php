<?php
include_once 'User.php';

class LoginModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }

    public function login( $user_name, $user_password ) {
        global $pdo;

        try {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

            $query->bindValue(1, $user_name);
            $query->bindValue(2, $user_password);

            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            echo $error = "Could not add user to the database:<br />" . $e;
        }


        if(!$row) {
            echo "<div id='error'>Please check your login details for the user name <strong>" . $user_name ."</strong>.</div>";

        } else {
            $_SESSION["user_name"] = $user_name;
            $_SESSION["user_password"] = $user_password;
            $_SESSION['user_role'] = $this->getLoggedUserRole( $user_name, $user_password );
            header("Location: index.php?page=home");
        }

        //$this->getLoggedUserId( $user_name, $user_password );
        //$this->getLoggedUserRole( $user_name, $user_password );

        //redirection

        //echo $_SESSION["user_name"];
        //echo $_SESSION["user_password"];
    }

    public function logout() {
        // unset/destroy the session
        session_destroy();
        // clear values
        $_SESSION = array();
    }

    public function getLoggedUserRole( $user_name, $user_password ){
        global $pdo;

        //echo "1. FROM getLoggedUserRoleFromId: UN: " . $user_name . " , UP: " . $user_password;

        $query = $pdo->prepare("SELECT user_role FROM users WHERE user_name =? AND user_password = ?");
        $query->bindValue(1, $user_name);
        $query->bindValue(2, $user_password);
        $query->execute();
        $user_role = $query->fetchColumn();

        //echo "| 2. FROM getLoggedUserRoleFromId: USER ROLE: " . $user_role;
        echo $user_role;
        return $user_role;
    }


}

?>