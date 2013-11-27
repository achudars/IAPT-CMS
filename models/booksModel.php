<?php 
include 'product.php';
/* 	@IAPT This is a relatively straight forward model which isn't a full Data Mapper.  We could
*	change the data model so that it can do more flexible things.  For example, we could change it
*	so that it pulls a single book, with another constructor that takes in a variable containing a
*	specific identifier for a book.
*/
class BooksModel {
	public $string;

	/* 	@IAPT A simple constructor which sets the string for this page */
	public function __construct(){
		$this->string= "books";
	}

	/* @IAPT Here is our simple retrieval routine.  At the moment it keeps the creation of
	the PDO object within the method.  This could of course be pulled out for more encapsulation. 
	Of course, within the assessment, this method will use your data mapper to retrieve data from
	the database, encapsulating it away from the actual model.  */
	public function getProducts(){
		$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    	$sth = $pdo->prepare("SELECT * FROM products WHERE type = :type");
    	$sth->execute(array(':type'=>'book'));
    	$rows = $sth->fetchAll();
    	foreach($rows as $row){
    		$book = new Product($row['name'],$row['writer'],$row['type'],$row['price'],$row['publisher'],$row['description']);
    		$books[] = $book;
    	}
    	return $books;
	}

}

 ?>