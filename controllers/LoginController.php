<?php

class LoginController {
	private $model;

	public function __construct($model) {
		$this->model = $model;
	}

    public function login() {
        //$user_name = $_SESSION["user_name"] = $_POST['user_name'];
        //$user_password = $_SESSION["user_password"] = $_POST['user_password'];
        $this->model->login( $_POST['user_name'], $_POST['user_password'] );
        //$this->model->getLoggedUserRole( $user_name, $user_password );
    }

    public function logout() {
        $this->model->logout();
    }
}


 ?>