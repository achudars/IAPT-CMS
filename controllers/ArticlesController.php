<?php

class ArticlesController {
	private $model;


	/* @IAPT In this case - there is no user interaction in the interface, so our controller doesn't
	really do anything in this example. */

	public function __construct($model){
		$this->model = $model;
	}
}


 ?>