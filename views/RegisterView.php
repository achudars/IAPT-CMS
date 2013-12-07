<?php

class RegisterView {
	private $model;
	private $controller;

	/**
	 * Constructs articles view
	 * @param registerController $controller
	 * @param registerModel $model
	 * @access public
	 */
	public function __construct($controller, $model) {
		$this -> controller = $controller;
		$this -> model = $model;
	}
	
	/**
	 * Outputs register page
	 */
	public function output() {
		include 'html/header.html.php';
		include 'html/register.html.php';
		include 'html/footer.html.php';
	}

}
?>