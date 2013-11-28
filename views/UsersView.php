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

        $subscribers = $this->model->getSubscribers();
        $writers = $this->model->getWriters();
        $editors = $this->model->getEditors();
        $publishers = $this->model->getPublishers();

        include 'html/admin.html.php';
        include 'html/footer.html.php';

    }
}

 ?>