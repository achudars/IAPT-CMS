<?php
class User {
	
	public $user_id;
	public $user_name;
	public $user_password;
	public $user_role;

	/**
	 * Constructs the Article class
	 * @param int $user_id 
	 * @param string $user_name
	 * @param string $user_password
	 * @param string $user_role
	 * @return boolean true
	 * @access public
	 */
	public function __construct($user_id, $user_name, $user_password, $user_role) {
		$this -> id = $user_id;
		$this -> name = $user_name;
		$this -> password = $user_password;
		$this -> role = $user_role;
		return true;
	}

	/** Getter Methods */

	/**
	 * Getter Method: get the id of the User
	 * @return the id of the User
	 */
	public function getUserId() {
		return $this -> id;
	}

	/**
	 * Getter Method: get the name of the User
	 * @return the name of the User
	 */
	public function getUserName() {
		return $this -> name;
	}

	/**
	 * Getter Method: get the password of the User
	 * @return the password of the User
	 */
	public function getUserPassword() {
		return $this -> password;
	}

	/**
	 * Getter Method: get the role of the User
	 * @return the role of the User
	 */
	public function getUserRole() {
		return $this -> role;
	}
	
	/**
	 * Getter Method: get the id of the logged in User
	 * @return the id of the logged in User
	 */
	public function getLoggedUserId() {
		return $this -> id;
	}
}
?>