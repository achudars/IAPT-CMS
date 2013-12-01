<?php
include_once 'User.php';

class RegisterModel {
    public $string;



    public function checkRegistration( $user_name, $user_password, $repeated_user_password ) {
        global $pdo;

        if( $user_password != $repeated_user_password ) {
            echo "Passwords fields are inconsistent.";
        } else {
            $query = $pdo->prepare("INSERT INTO users (user_name, user_password, user_role) VALUES (?,?,?)");

            $query->bindValue(1, $user_name);
            $query->bindValue(2, $user_password);
            $query->bindValue(3, "subscriber");

            $query->execute();

            //redirection
            header("Location: index.php?page=login");
        }

    }

    public function registerUser( $user_name, $user_password, $repeated_user_password ){
        global $pdo;
        $this->checkRegistration( $user_name, $user_password, $repeated_user_password );
    }
}

    ?>