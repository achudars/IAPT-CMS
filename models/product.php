<?php 
	class Product {
		 // Class properties and methods go here  
		 
		 // Fields
		 public $name;
		 public $writer;
		 public $type;
		 public $price;
		 public $publisher;
		 public $description;

		 // Constructor of class Product
		 public function __construct($name, $writer, $type, $price, $publisher, $description){
		 	$this->name = $name;
		 	$this->writer = $writer;
		 	$this->type = $type;
		 	$this->price = $price;
		 	$this->publisher = $publisher;
		 	$this->description = $description;
		 	return true;
		 }   

		 /** Getter Methods */

		 /**
		  * Getter Method: get the name of the Product
		  * @return the name of the product
		  */
		 public function getName(){
		 	return $this->name;
		 }

		 /**
		  * Getter Method: get the writer of the Product
		  * @return the writer of the product
		  */
		 public function getWriter(){
		 	return $this->writer;
		 }

		 /**
		  * Getter Method: get the type of the Product
		  * @return the type of the product
		  */
		 public function getType(){
		 	return $this->type;
		 }

		 /**
		  * Getter Method: get the price of the Product
		  * @return the price of the product
		  */
		 public function getPrice(){
		 	return $this->price;
		 }

		 /**
		  * Getter Method: get the publisher of the product
		  * @return tha publisher of the product
		  */
		 public function getPublisher(){
		 	return $this->publisher;
		 }

		 /**
		  * Getter Method: get the description of the Product
		  * @return the description of the product
		  */
		 public function getDescription(){
		 	return $this->description;
		 }
	}

 ?>