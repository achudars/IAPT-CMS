<?php
include_once 'User.php';

class LoginModel {

	/**
	 * Constrcutor for login model
	 * @access public
	 */
    public function __construct(){

    }
	
	/**
	 * Validates user name and password to start a session
	 * and redirects to home page
	 * and logs in
	 * @param string $user_name
	 * @param string $user_password
	 * @access public
	 */
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
		
		// Throw a formatted error on failed login
        if(!$row) {
            echo "<div id='error'>Please check your login details for the user name <strong>" . $user_name ."</strong>.</div>";

        } else {
            $_SESSION["user_name"] = $user_name;
            $_SESSION["user_password"] = $user_password;
            $_SESSION['user_role'] = $this->getLoggedUserRole( $user_name, $user_password );
            // redirection after successful login
			header("Location: index.php?page=home");
        }
    }
	
	/**
	 * Stops the session
	 * and logs out
	 * @access public
	 */
    public function logout() {
        // unset/destroy the session
        session_destroy();
        // clear values
        $_SESSION = array();
        // redirection after successful logout
		header("Location: index.php?page=home");
    }
	
	/**
	 * Gets the user role of the logged in user in order to know what to display
	 * @param string $user_name
	 * @param string $user_password
	 * @return string $user_role
	 * @access public
	 */
    public function getLoggedUserRole( $user_name, $user_password ){
        global $pdo;

        $query = $pdo->prepare("SELECT user_role FROM users WHERE user_name = ? AND user_password = ?");
        $query->bindValue(1, $user_name);
        $query->bindValue(2, $user_password);
        $query->execute();
        $user_role = $query->fetchColumn();

        return $user_role;
    }


}

?>