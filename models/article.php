<?php
	class Article {
		 // Class properties and methods go here

		 // Fields
		 public $article_title;
		 public $article_content;
		 public $article_timestamp;
		 public $article_image;
		 public $article_status;
		 public $article_type;

		 // Constructor of class Article
		 public function __construct($article_title, $article_content, $article_timestamp, $article_image, $article_status, $article_type){
		 	$this->title = $article_title;
		 	$this->content = $article_content;
		 	$this->timestamp = $article_timestamp;
		 	$this->image = $article_image;
		 	$this->status = $article_status;
		 	$this->type = $article_type;
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
		  * Getter Method: get the status of the Article
		  * @return tha status of the Article
		  */
		 public function getStatus(){
		 	return $this->status;
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