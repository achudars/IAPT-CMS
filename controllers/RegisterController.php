<?php

class RegisterController {
	private $model;


	/* @IAPT In this case - there is no user interaction in the interface, so our controller doesn't
	really do anything in this example. */

	public function __construct($model){
		$this->model = $model;
	}

    public function registerUser() {

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $repeated_user_password =  $_POST['repeated_user_password'];

        // echo $_POST['user_name'] . " - " . $_POST['user_password'] . " - " . $_POST['repeated_user_password'];
        // echo $user_name . " - " . $user_password . " - " . $repeated_user_password;

        $this->model->registerUser( $user_name, $user_password, $repeated_user_password );
    }


}


 ?>