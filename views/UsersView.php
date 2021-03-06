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
        $user_role = $_SESSION['user_role'];
        include 'html/users.html.php';
        include 'html/footer.html.php';
    }
}

 ?>