<?php

class RegisterController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function registerUser() {
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $repeated_user_password = $_POST['repeated_user_password'];
        $this->model->registerUser( $user_name, $user_password, $repeated_user_password );
    }


}


 ?>