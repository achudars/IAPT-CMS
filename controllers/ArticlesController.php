<?php

class ArticlesController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

/*    public function getFoundArticles() {
        $article_title = $_GET['article_title'];

        echo "FROM CONTROLLER: " . $article_title . " | ";

        $this->model->getFoundArticles( $article_title );
    }*/

}


 ?>