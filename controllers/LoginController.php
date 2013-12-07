<?php

class LoginController {
	private $model;
	
	/**
	 * Constructs login model
	 * @param loginModel $model
	 * @access public
	 */
	public function __construct($model) {
		$this->model = $model;
	}
	
	/**
	 * calls the login fucntion with the 'user_name' and 'user_password' fields
	 * @access public
	 */
    public function login() {
        $this->model->login( $_POST['user_name'], $_POST['user_password'] );
    }
	
	/**
	 * Ends session / logs out the user
	 * @access public
	 */
    public function logout() {
        $this->model->logout();
    }
}


 ?>