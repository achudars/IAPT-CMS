<?php
include_once("config/connection.php");
include 'article.php';

class ArticlesModel {
	public $string;

	public function __construct(){
		$this->string= "articles";
	}

	public function getArticles( $article_id ){
		global $pdo;

    	$query = $pdo->prepare( "SELECT * FROM articles WHERE article_id = ?" );
        $query->bindValue( 1, $article_id );
        $query->execute();

        return $query->fetch();
	}

}

 ?>