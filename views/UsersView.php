<?php

class UsersView {
    private $model;
    private $controller;

    public function __construct($controller, $model){
        $this->controller = $controller;
        $this->model      = $model;
    }

    public function output(){
        include 'html/header.html.php';
        $users = $this->model->getAllUsers();
        //$user_role = $this->model->getLoggedUserRole( $_SESSION["user_name"], $_SESSION["user_password"] );
        $user_role = $_SESSION['user_role'];
        include 'html/users.html.php';
        include 'html/footer.html.php';

    }

}

 ?>