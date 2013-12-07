<?php

class LoginView {
    private $model;
    private $controller;
	
	/**
	 * Constructs articles view
	 * @param loginController $controller
	 * @param loginModel $model
	 * @access public
	 */
    public function __construct($controller, $model){
        $this->controller = $controller;
        $this->model      = $model;
    }
	
	/**
	 * Outputs login page
	 */
    public function output(){
        include 'html/header.html.php';
        include 'html/login.html.php';
        include 'html/footer.html.php';
    }
}

 ?>