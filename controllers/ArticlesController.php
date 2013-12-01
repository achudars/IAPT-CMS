<?php

class ArticlesController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function addArticle(){

    }

    public function updateArticle(){
        $article_id = $_POST['user_id'];
        echo $article_id;
    }
}


 ?>