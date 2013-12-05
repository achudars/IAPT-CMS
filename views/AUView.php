<?php

class AUView {
    private $articlesModel;
    private $usersModel;
    private $controller;

    public function __construct( $controller, $articlesModel, $usersModel ){
        $this->controller       = $controller;
        $this->articlesModel    = $articlesModel;
        $this->usersModel       = $usersModel;
    }

    public function output(){

        include 'html/header.html.php';
        $articles = $this->articlesModel->getAllArticles();
        include 'html/articles.html.php';
        include 'html/footer.html.php';

        $article_ratings =  $this->articlesModel->getArticleRating( $article_id );

    }

}

 ?>