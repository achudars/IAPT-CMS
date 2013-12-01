<?php

class ArticlesController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function addArticle(){

        //echo "TE#ST";

        $article_title = $_POST['article_title'];
        $article_content = $_POST['article_content'];
        $article_image = $_POST['article_image'];
        $article_status = $_POST['article_status'];
        $article_type = $_POST['article_type'];

        //echo $article_title ." | ". $article_content ." | ". $article_image ." | ". $article_status ." | ". $article_type;

        $this->model->addArticle( $article_title, $article_content, $article_image, $article_status, $article_type );
    }

    public function updateArticle(){
        $article_id = $_POST['article_id'];
        echo $article_id;
    }
}


 ?>