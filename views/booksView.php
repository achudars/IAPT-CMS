<?php

class BooksView{
	private $model;
	private $controller;

	public function __construct($controller, $model){
		$this->controller = $controller;
		$this->model 	  = $model;
	}

	public function output(){
		/* @IAPT Include the headers for the page */
		include 'header.html.php';
		/* @IAPT Set a title for the page */
		$title = "Books";
		/* @IAPT This gets us our content for our books - note it is using the model contained inside the view.  $products is the variable that will be looked for in our template. */
		$products = $this->model->getProducts();
		/* @IAPT This is the template - it handles the display of the data contained in our products list $products */
		include 'template.html.php';
		/* @IAPT Stick on the footer and we are done. */
		include 'footer.html.php';

	}
}

 ?>