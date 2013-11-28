<?php

class BasicArticlesView {
    private $model;
    private $controller;

    public function __construct($controller, $model){
        $this->controller = $controller;
        $this->model      = $model;
    }

    public function output(){
        include 'html/header.html.php';
        $title = "Basic Articles";
        $articles = $this->model->getBasicArticles();
        include 'html/articles.html.php';
        include 'html/footer.html.php';

    }
}

 ?>