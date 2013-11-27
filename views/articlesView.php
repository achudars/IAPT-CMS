<?php

class ArticlesView{
	private $model;
	private $controller;

	public function __construct($controller, $model){
		$this->controller = $controller;
		$this->model 	  = $model;
	}

	public function output(){
		include 'header.html.php';
		$title = "Articles";
		$products = $this->model->getArticles();
		include 'template.html.php';
		include 'footer.html.php';

	}
}

 ?>