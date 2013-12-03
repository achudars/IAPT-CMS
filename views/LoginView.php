<?php

class LoginView {
    private $model;
    private $controller;

    public function __construct($controller, $model){
        $this->controller = $controller;
        $this->model      = $model;
    }

    public function output(){
        // $user_role = $this->model->getLoggedUserRole( $_SESSION["user_name"], $_SESSION["user_password"] );
        include 'html/header.html.php';
        include 'html/login.html.php';
        include 'html/footer.html.php';
    }
}

 ?>