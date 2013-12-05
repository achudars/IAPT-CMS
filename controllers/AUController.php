<?php

class AUController {
    private $articlesModel;
    private $usersModel;

    public function __construct($articlesModel, $usersModel){
        $this->articlesModel = $articlesModel;
        $this->usersModel = $usersModel;
    }

    public function addArticle(){
        $article_title = $_POST['article_title'];
        $article_content = nl2br($_POST['article_content']);
        $article_image = $_POST['article_image'];

        $article_status = $_POST['article_status'];
        $article_type = $_POST['article_type'];
        $article_rating = 0;
        $column_name = 0;

        if ( $article_type == "review_article") {
            $article_rating = $_POST['article_rating'];
        }

        if ( $article_type == "column_article") {
            $column_name = $_POST['column_name'];
            //echo "ARTICLE COLUMN[".$column_name."]";
        }

        $article_authors = $_POST['article_authors'];
        $article_editors = $_POST['article_editors'];
        $article_staff_pick = ( $_POST["article_staff_pick"] == 0 ) ? 0 : 1;

        $this->articlesModel->addArticle( $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick, $column_name, $article_editors );
    }

    public function editArticle() {
        $article_id = $_POST['article_id'];
        $article_title = $_POST['article_title'];
        $article_content = nl2br($_POST['article_content']);
        $article_image = $_POST['article_image'];

        $article_status = $_POST['article_status'];
        $article_type = $_POST['article_type'];
        $article_rating = 0;
        $column_name = 0;

        if ( $article_type == "review_article") {
            $article_rating = $_POST['article_rating'];
        }

        if ( $article_type == "column_article") {
            $column_name = $_POST['column_name'];
            echo "ARTICLE COLUMN[".$column_name."]";
        }

        $article_authors = $_POST['article_authors'];
        $article_editors = $_POST['article_editors'];

/*        echo "ARTICLE EDITORS: ". $article_editors . " size: ". sizeof($article_editors);*/

        $article_staff_pick = ( $_POST["article_staff_pick"] == 0 ) ? 0 : 1;

        $this->articlesModel->editArticle( $article_id, $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick, $column_name, $article_editors );
    }

    public function deleteArticle() {
        $article_id = $_POST['article_id'];
        echo "I will delete article with iD: " . $article_id;
        $this->articlesModel->deleteArticle( $article_id );
    }

    public function changeArticleStatus() {
        $article_id = $_POST['article_id'];
        $article_status = $_POST['article_status'];
        $this->articlesModel->changeArticleStatus( $article_id, $article_status );
    }

    public function likeArticle() {
        $article_id = $_POST['article_id'];
        $this->articlesModel->addLike( $article_id );
    }

    public function dislikeArticle() {
        $article_id = $_POST['article_id'];
        $this->articlesModel->addDislike( $article_id );
    }

    public function getLoggedUserId() {
        echo "username: ". $_SESSION['user_name'];
        echo "userpassword: ". $_SESSION['user_password'];
        $this->usersModel->getLoggedUserId( $_SESSION['user_name'], $_SESSION['user_password'] );
    }

    public function  getArticleColumn( $article_id ) {
        $article_id = $_GET['article_id'];
        //echo "1. ARTICLE COLUMN: " . $article_id;
        $this->articlesModel->getArticleColumn( $article_id );
    }

}


?>