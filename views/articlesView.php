<?php

class ArticlesView {
	private $model;
	private $controller;

	public function __construct($controller, $model){
		$this->controller = $controller;
		$this->model 	  = $model;
	}

	public function output_articles(){
		include 'html/header.html.php';
		$articles = $this->model->getAllArticles();
		include 'html/articles.html.php';
		include 'html/footer.html.php';

	}

	public function output_home_articles(){
		include 'html/header.html.php';
		$basic_articles = $this->model->getBasicArticles();
		$column_articles = $this->model->getColumnArticles();
		$review_articles = $this->model->getReviewArticles();
		include 'html/home.html.php';
		include 'html/footer.html.php';

	}

	public function output_article_fields(){
		include 'html/header.html.php';
		include 'html/add.html.php';
		include 'html/footer.html.php';
	}

	public function output_edit_article( $article_id ){
		include 'html/header.html.php';
		$article = $this->model->getArticle( $article_id );
		include 'html/edit.html.php';
		include 'html/footer.html.php';
	}

	public function output_one_article( $article_id ){
		include 'html/header.html.php';
		$article = $this->model->getArticle( $article_id );
		include 'html/article.html.php';
		include 'html/footer.html.php';
	}

	public function output_found_articles(){
		$search_key = $_POST['search_key'];
		include 'html/header.html.php';
		$articles = $this->model->getFoundArticles( $search_key );
		include 'html/articles.html.php';
		include 'html/footer.html.php';
	}


}

 ?>