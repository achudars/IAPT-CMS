<?php
include_once 'User.php';

class RegisterModel {
	
	/**
	 * Constrcutor for register model
	 * @access public
	 */
    public function __construct(){

    }
	
	/**
	 * Validates registration
	 * @param $user_name
	 * @param $user_password
	 * @param $repeated_user_password
	 * @access public
	 */
    public function checkRegistration( $user_name, $user_password, $repeated_user_password ) {
        global $pdo;

        if( $user_password != $repeated_user_password ) {
            echo "<div id='error'>Passwords fields are inconsistent.</div>";
        } else {
            $query = $pdo->prepare("INSERT INTO users (user_name, user_password, user_role) VALUES (?,?,?)");

            $query->bindValue(1, $user_name);
            $query->bindValue(2, $user_password);
            $query->bindValue(3, "subscriber");

            $query->execute();

            //redirection to log in on successful registration
            header("Location: index.php?page=login");
        }

    }
	/**
	 * Registers the user
	 * @param $user_name
	 * @param $user_password
	 * @param $repeated_user_password
	 * @access public
	 */
    public function registerUser( $user_name, $user_password, $repeated_user_password ){
        global $pdo;
		
        $this->checkRegistration( $user_name, $user_password, $repeated_user_password );
    }
}

?>