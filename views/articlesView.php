<?php

class ArticlesView {
	private $model;
	private $controller;

	public function __construct($controller, $model){
		$this->controller = $controller;
		$this->model 	  = $model;
	}

	public function output(){
		include 'html/header.html.php';

		$basic_articles = $this->model->getBasicArticles();
		$column_articles = $this->model->getAllArticles();
		$review_articles = $this->model->getReviewArticles();

		include 'html/articles.html.php';
		include 'html/footer.html.php';

	}

	public function single_output(){
		echo $article_id;
		include 'html/header.html.php';
		$article = $this->model->getArticle( $article_id );
		include 'html/article.html.php';
		include 'html/footer.html.php';

	}
}

 ?>