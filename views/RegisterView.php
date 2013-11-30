<?php

class RegisterView {
    private $model;
    private $controller;

    public function __construct($controller, $model){
        $this->controller = $controller;
        $this->model      = $model;
    }

    public function output(){
        include 'html/header.html.php';
        include 'html/register.html.php';
        include 'html/footer.html.php';
    }

}

 ?>