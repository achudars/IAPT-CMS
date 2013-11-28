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
		$title = "Articles";
		$articles = $this->model->getArticles();
		include 'html/articles.html.php';
		include 'html/footer.html.php';

	}
}

 ?>