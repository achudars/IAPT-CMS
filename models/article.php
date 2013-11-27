<?php
	class Article {
		 // Class properties and methods go here

		 // Fields
		 public $title;
		 public $content;
		 public $timestamp;
		 public $image;
		 public $status;
		 public $type;

		 // Constructor of class Article
		 public function __construct($title, $content, $timestamp, $image, $publisher, $type){
		 	$this->title = $title;
		 	$this->content = $content;
		 	$this->timestamp = $timestamp;
		 	$this->image = $image;
		 	$this->publisher = $publisher;
		 	$this->type = $type;
		 	return true;
		 }

		 /** Getter Methods */

		 /**
		  * Getter Method: get the title of the Article
		  * @return the title of the Article
		  */
		 public function getTitle(){
		 	return $this->title;
		 }

		 /**
		  * Getter Method: get the content of the Article
		  * @return the content of the Article
		  */
		 public function getContent(){
		 	return $this->content;
		 }

		 /**
		  * Getter Method: get the timestamp of the Article
		  * @return the timestamp of the Article
		  */
		 public function getTimestamp(){
		 	return $this->timestamp;
		 }

		 /**
		  * Getter Method: get the image of the Article
		  * @return the image of the Article
		  */
		 public function getImage(){
		 	return $this->image;
		 }

		 /**
		  * Getter Method: get the publisher of the Article
		  * @return tha publisher of the Article
		  */
		 public function getPublisher(){
		 	return $this->publisher;
		 }

		 /**
		  * Getter Method: get the type of the Article
		  * @return the type of the Article
		  */
		 public function getType(){
		 	return $this->type;
		 }
	}

 ?>