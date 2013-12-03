<?php

class ArticlesController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function addArticle(){
        $article_title = $_POST['article_title'];
        $article_content = nl2br($_POST['article_content']);
        $article_image = $_POST['article_image'];

        $article_status = $_POST['article_status'];
        $article_type = $_POST['article_type'];

        if ( $article_type == "column_article") {
            $article_column = $_POST['article_column'];
        }
        if ( $article_type == "review_article") {
            $article_rating = $_POST['article_rating'];
        }

        $article_tags = $_POST['article_tags'];
        $article_authors = $_POST['article_authors'];

        $article_staff_picked = $_POST['article_staff_picked'];

        $this->model->addArticle( $article_title, $article_content, $article_image, $article_status, $article_type );
    }

    public function editArticle() {
        $article_id = $_POST['article_id'];
        $article_title = $_POST['article_title'];
        $article_content = $_POST['article_content'];
        $article_image = $_POST['article_image'];
        $article_status = $_POST['article_status'];
        $article_type = $_POST['article_type'];
        $this->model->editArticle( $article_title, $article_content, $article_image, $article_status, $article_type, $article_id );
    }

    public function deleteArticle() {
        $article_id = $_POST['article_id'];
        $this->model->deleteArticle( $article_title, $article_content, $article_image, $article_status, $article_type, $article_id );
    }

    public function changeArticleStatus() {
        $article_id = $_POST['article_id'];
        $article_status = $_POST['article_status'];
        $this->model->changeArticleStatus( $article_id, $article_status );
    }

    public function likeArticle() {
        $article_id = $_POST['article_id'];
        $this->model->addLike( $article_id );
    }

    public function dislikeArticle() {
        $article_id = $_POST['article_id'];
        $this->model->addDislike( $article_id );
    }

}


 ?>