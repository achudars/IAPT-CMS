<?php 

/* @IAPT This model is very similar to the Books model.  The comments in it apply to this as well. */

class VideosModel {
	public $string;

	public function __construct(){
		$this->string= "videos";
	}

	/*@IAPT Please see the booksModel to find out how this works */
	public function getProducts(){
		$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    	$sth = $pdo->prepare("SELECT * FROM products WHERE type = :type");
    	$sth->execute(array(':type'=>'Blu-Ray'));
    	$rows = $sth->fetchAll();
    	foreach($rows as $row){
    		$book = new Product($row['name'],$row['writer'],$row['type'],$row['price'],$row['publisher'],$row['description']);
    		$books[] = $book;
    	}
    	return $books;
	}
}

 ?>