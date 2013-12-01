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
        include 'html/users.html.php';
        include 'html/footer.html.php';

    }

}

 ?>