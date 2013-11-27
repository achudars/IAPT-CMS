<?php 

class VideosView{
	private $model;
	private $controller;

	public function __construct($controller, $model){
		$this->controller = $controller;
		$this->model 	  = $model;
	}

	/* @IAPT Please refer to the booksView for commentary on how all of this works */
	public function output(){
		include 'header.html.php';
		$title = "Videos";
		$products = $this->model->getProducts();
		$result = $this->model->result;
		include 'template.html.php';
		include 'footer.html.php';	
	}
}

 ?>