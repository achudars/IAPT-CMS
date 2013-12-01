<?php

class LoginController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function login(){
        session_start();
        $user_name = $_SESSION["user_name"] = $_POST['user_name'];
        $user_password = $_SESSION["user_password"] = $_POST['user_password'];

        echo "$user_name: " . $user_name;
        echo "$_SESSION: " . $_SESSION['user_name'];
        echo "$_POST: " . $_POST['user_name'];
        echo "$_GET: " . $_GET['user_name'];


        echo "logged in as: " . $user_name . " [ " . $user_password . " ] ";

        //$this->model->registerUser( $user_name, $user_password, $repeated_user_password );
    }
}


 ?>