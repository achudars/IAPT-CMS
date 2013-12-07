<?php
	class Article {
		
		 public $article_id;
		 public $article_title;
		 public $article_content;
		 public $article_timestamp;
		 public $article_image;
		 public $article_status;
		 public $article_type;
		 public $article_staff_pick;
		
		 /**
		 * Constructs the Article class
		 * @param int $article_id 
		 * @param string $article_title
		 * @param string $article_content
		 * @param timestamp $article_timestamp
		 * @param string $article_image which is a URL to an image hosted somewhere on the internet
		 * @param string $article_status
		 * @param string $article_type
		 * @param int $article_staff_pick
		 * @access public
		 */
		 public function __construct($article_id, $article_title, $article_content, $article_timestamp, $article_image, $article_status, $article_type, $article_staff_pick){
		 	$this->id = $article_id;
		 	$this->title = $article_title;
		 	$this->content = $article_content;
		 	$this->timestamp = $article_timestamp;
		 	$this->image = $article_image;
		 	$this->status = $article_status;
		 	$this->type = $article_type;
		 	$this->staff_pick = $article_staff_pick;
		 	
		 	return true;
		 }

		 /** Getter Methods */

		 /**
		  * Getter Method: get the ID of the Article
		  * @return the ID of the Article
		  */
		 public function getArticleId(){
		 	return $this->id;
		 }

		 /**
		  * Getter Method: get the title of the Article
		  * @return the title of the Article
		  */
		 public function getArticleTitle(){
		 	return $this->title;
		 }

		 /**
		  * Getter Method: get the content of the Article
		  * @return the content of the Article
		  */
		 public function getArticleContent(){
		 	return $this->content;
		 }

		 /**
		  * Getter Method: get the timestamp of the Article
		  * @return the timestamp of the Article
		  */
		 public function getArticleTimestamp(){
		 	return $this->timestamp;
		 }

		 /**
		  * Getter Method: get the image of the Article
		  * @return the image of the Article
		  */
		 public function getArticleImage(){
		 	return $this->image;
		 }

		 /**
		  * Getter Method: get the status of the Article
		  * @return tha status of the Article
		  */
		 public function getArticleStatus(){
		 	return $this->status;
		 }

		 /**
		  * Getter Method: get the type of the Article
		  * @return the type of the Article
		  */
		 public function getArticleType(){
		 	return $this->type;
		 }

		 /**
		  * Getter Method: get the value of the staff pick of the Article
		  * @return the value of the staff pick of the Article
		  */
		 public function getStaffPickedArticle(){
		 	return $this->staff_pick;
		 }
	}

 ?>