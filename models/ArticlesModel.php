<?php
include_once "config/connection.php";
include_once "models/Article.php";


class ArticlesModel {
	
	/**
	 * Constructs articles model
	 * @access public
	 */
	public function __construct() {

	}
	/**
	 * Retrieves a single article
	 * @param int $article_id gets article based on id
	 * @return a single query containg all the information relevant to an article
	 * @access public
	 */
	public function getArticle($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("SELECT * FROM articles WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
		
		return $query -> fetch();
	}
	
	/**
	 * Retrieves a all articles
	 * @return an array of articles
	 * @access public
	 */
	public function getAllArticles() {
		global $pdo;
		
		$query = $pdo -> prepare("SELECT * FROM articles");
		$query -> execute();
		$rows = $query -> fetchAll();
		
		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$articles[] = $article;
		}
		
		return $articles;
	}
	
	/**
	 * Retrieves articles of type basic_article
	 * @return an array of articles of type basic_article
	 * @access public
	 */
	public function getBasicArticles() {
		global $pdo;
		
		$sth = $pdo -> prepare("SELECT * FROM articles WHERE article_type = :type ORDER BY article_timestamp DESC");
		$sth -> execute(array(':type' => 'basic_article'));
		$rows = $sth -> fetchAll();
		
		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$basic_articles[] = $article;
		}
		
		return $basic_articles;
	}
	
	/**
	 * Retrieves articles of type column_article
	 * @return an array of articles of type column_article
	 * @access public
	 */
	public function getColumnArticles() {
		global $pdo;

		$sth = $pdo -> prepare("SELECT * FROM articles WHERE article_type = :type ORDER BY article_timestamp DESC");
		$sth -> execute(array(':type' => 'column_article'));
		$rows = $sth -> fetchAll();

		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$column_articles[] = $article;
		}

		return $column_articles;
	}
	
	/**
	 * Retrieves articles of type review_article
	 * @return an array of articles of type review_article
	 * @access public
	 */
	public function getReviewArticles() {
		global $pdo;

		$sth = $pdo -> prepare("SELECT * FROM articles WHERE article_type = :type ORDER BY article_timestamp DESC");
		$sth -> execute(array(':type' => 'review_article'));
		$rows = $sth -> fetchAll();

		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$review_articles[] = $article;
		}
		
		return $review_articles;
	}
	
	/**
	 * Retrieves articles based on the searchkey that a user typed in the search box
	 * WARNING: may not perform fast with lots of articles.
	 * @return an array of articles that match the search criteria in article content
	 * @access public
	 */
	public function getFoundArticles($search_key) {
		global $pdo;

		$query = $pdo -> prepare("SELECT * FROM articles WHERE article_content LIKE '%" . $search_key . "%'");
		$query -> execute();
		$rows = $query -> fetchAll();

		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$articles[] = $article;
		}
		return $articles;
	}
	
	/**
	 * Adds the article to the Database
	 * @param string $article_title 
	 * @param string $article_content
	 * @param string $article_image which is a URL to an image hosted somewhere on teh internet
	 * @param string $article_status
	 * @param string $article_type
	 * @param array $article_authors that can be null, but by default is the logged in user
	 * @param int $article_rating is 0 if not given, otherwise the value is [0..5]
	 * @param int $article_staff_pick of value 0 or 1
	 * @param string $column_name may take a value of PC, PS, XBOX, MOBILE in current implemntation
	 * @access public
	 */
	public function addArticle($article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick, $column_name) {
		global $pdo;

		$query = $pdo -> prepare("INSERT INTO articles (article_title, article_content, article_timestamp, article_image, article_status, article_type, article_staff_pick) VALUES (?,?,?,?,?,?,?)");

		$query -> bindValue(1, $article_title);
		$query -> bindValue(2, $article_content);
		$query -> bindValue(3, time());
		$query -> bindValue(4, $article_image);
		$query -> bindValue(5, "submitted"); // sets each newly added article by default to 'submitted'
		$query -> bindValue(6, $article_type);
		$query -> bindValue(7, $article_staff_pick);
		$query -> execute();

		// retrieve the ID of the last inserted article in order to update linked tables below
		$article_id = $pdo -> lastInsertId();
		
		// set default amount of likes and dislikes to 0
		$this -> setDefaultLike($article_id);
		$this -> setDefaultDislike($article_id);
		// link and add rating for articles of type review_articles
		if ($article_rating != 0) {
			$this -> addRating($article_id, $article_rating);
		}
		// link and add column names for articles of type column_articles
		if ($article_type == "column_article") {
			$this -> addColumnArticle($article_id, $column_name);
		}
		// associate the article with authors
		$this -> addArticleAuthors($article_id, $article_authors);

		// redirection after submission
		header("Location: index.php?page=articles&type=all");
	}
	
	/**
	 * Adds the article to the Database
	 * @param string $article_id
	 * @param string $article_title 
	 * @param string $article_content
	 * @param string $article_image which is a URL to an image hosted somewhere on teh internet
	 * @param string $article_status
	 * @param string $article_type
	 * @param array $article_authors that can be null, but by default is the logged in user
	 * @param int $article_rating is 0 if not given, otherwise the value is [0..5]
	 * @param int $article_staff_pick of value 0 or 1
	 * @param string $column_name may take a value of PC, PS, XBOX, MOBILE in current implemntation
	 * @param array $editors that can be null, but by default is the logged in user's name who tries to edit the article
	 * @access public
	 */
	public function editArticle($article_id, $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick, $column_name, $article_editors) {
		global $pdo;

		$sql = "UPDATE articles SET article_title=?, article_content=?, article_timestamp=?, article_image=?, article_status=?, article_type=?, article_staff_pick=? WHERE article_id=?";
		$query = $pdo -> prepare($sql);
		$query -> execute(array($article_title, $article_content, time(), $article_image, $article_status, $article_type, $article_staff_pick, $article_id));
		
		// updates the review article rating value
		// not the best implementation
		if ($article_type == "review_article") {
			$this -> deleteRating($article_id);
			$this -> addRating($article_id, $article_rating);
		} else {
			$this -> deleteRating($article_id);
		}
		// updates the column article column name
		// not the best implementation
		if ($article_type == "column_article") {
			$this -> deleteColumnArticle($article_id);
			$this -> addColumnArticle($article_id, $column_name);
		} else {
			$this -> deleteColumnArticle($article_id);
		}
		// updates the article editors
		// not the best implementation
		$this -> deleteArticleEditors($article_id);
		$this -> addArticleEditors($article_id, $article_editors);
	}
	
	/**
	 * Deletes an article from the table article
	 * BAd implementation as it doesn't work if foreign keys link to the article_id
	 * @param int $article_id allows retrieval
	 * @access public
	 */
	public function deleteArticle($article_id) {
		global $pdo;

		// remove associations with likes and dislikes, if exist
		$this -> deleteLike($article_id);
		$this -> deleteDislike($article_id);
		// remove associations with rating, if exists
		$this -> deleteRating($article_id);

		// perform delete query
		$query = $pdo -> prepare("DELETE FROM articles WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}
	
	/**
	 * Helper function to set up default amount of likes for newly created article to 0
	 * @param int $article_id allows to associate article_likes table with articles table
	 * @access public
	 */
	public function setDefaultLike($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("INSERT INTO article_likes (article_like_amount, article_id) VALUES (?,?)");
		
		$query -> bindValue(1, 0);
		$query -> bindValue(2, $article_id);
		$query -> execute();
	}
	
	/**
	 * Helper function to set up default amount of dislikes for newly created article to 0
	 * @param int $article_id allows to associate article_dislikes table with articles table
	 * @access public
	 */
	public function setDefaultDislike($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("INSERT INTO article_dislikes (article_dislike_amount, article_id) VALUES (?,?)");
		
		$query -> bindValue(1, 0);
		$query -> bindValue(2, $article_id);
		$query -> execute();
	}
	
	/**
	 * Gets likes based on article ID
	 * @param int $article_id
	 * @access public
	 */
	public function getLikes($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("SELECT article_like_amount FROM article_likes WHERE article_id = ? ");
		$query -> bindValue(1, $article_id);
		$query -> execute();
		$article_like_amount = $query -> fetchColumn();
		
		return $article_like_amount;
	}
	
	/**
	 * Gets dislikes based on article ID
	 * @param int $article_id
	 * @access public
	 */
	public function getDislikes($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("SELECT article_dislike_amount FROM article_dislikes WHERE article_id = ? ");
		$query -> bindValue(1, $article_id);
		$query -> execute();
		$article_dislike_amount = $query -> fetchColumn();
		
		return $article_dislike_amount;
	}
	
	/**
	 * Increments likes based on article ID
	 * @param int $article_id
	 * @access public
	 */
	public function addLike($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("UPDATE article_likes SET article_like_amount = article_like_amount + 1 WHERE article_id = ? ");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}
	
	/**
	 * Increments dislikes based on article ID
	 * @param int $article_id
	 * @access public
	 */
	public function addDislike($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("UPDATE article_dislikes SET article_dislike_amount = article_dislike_amount + 1 WHERE article_id = ? ");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}
	
	/**
	 * Deletes likes based on article ID
	 * @param int $article_id
	 * @access public
	 */
	public function deleteLike($article_id) {
		global $pdo;

		$query = $pdo -> prepare("DELETE FROM article_likes WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}

	/**
	 * Deletes dislikes based on article ID
	 * @param int $article_id
	 * @access public
	 */
	public function deleteDislike($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("DELETE FROM article_dislikes WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}
	
	/**
	 * Changes article status to one of the 5 following stati:
	 * [submitted, under review, awaiting changes, rejected, published]
	 * @param int $article_id
	 * @param string $article_status
	 * @access public
	 */
	public function changeArticleStatus($article_id, $article_status) {
		global $pdo;
		
		$sql = "UPDATE articles SET article_status=? WHERE article_id=?";
		$query = $pdo -> prepare($sql);
		$query -> execute(array($article_status, $article_id));
	}

	/**
	 * Changes article rating to one of the 6 following values:
	 * [0, 1, 2, 3, 4, 5]
	 * @param int $article_id
	 * @param string $article_status
	 * @access public
	 */
	public function getArticleRating($article_id) {
		global $pdo;
		$query = $pdo -> prepare("SELECT review_rating FROM review_articles WHERE article_id = ? ");
		$query -> bindValue(1, $article_id);
		$query -> execute();
		$article_rating = $query -> fetchColumn();
		return $article_rating;
	}
	
	/**
	 * Adds rating to a review article
	 * @param int $article_id
	 * @return int $article_rating
	 * @access public
	 */
	public function addRating($article_id, $article_rating) {
		global $pdo;

		$query = $pdo -> prepare("SELECT * FROM review_articles WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$result = $query -> execute();
		
		// inserts or updates based on if rating already exists
		if ($result) {
			$query = $pdo -> prepare("INSERT INTO review_articles (review_rating, article_id) VALUES (?,?)");
			$query -> bindValue(1, $article_rating);
			$query -> bindValue(2, $article_id);
		} else {
			$query = $pdo -> prepare("UPDATE review_articles SET review_rating = ? WHERE article_id = ? ");
			$query -> bindValue(1, $article_rating);
			$query -> bindValue(2, $article_id);
		}
		$query -> execute();
	}
	
	/**
	 * Deletes rating of a review article based on article id
	 * @param int $article_id
	 * @return int $article_rating
	 * @access public
	 */
	public function deleteRating($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("DELETE FROM review_articles WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}
	
	/**
	 * Creates an association with a column name and article ID
	 * @param int $article_id
	 * @param int $column_name
	 * @access public
	 */
	public function addColumnArticle($article_id, $column_name) {
		global $pdo;

		$query = $pdo -> prepare("SELECT * FROM column_articles WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$result = $query -> execute();

		if ($result) {
			$query = $pdo -> prepare("INSERT INTO column_articles (column_name, article_id) VALUES (?,?)");
			$query -> bindValue(1, $column_name);
			$query -> bindValue(2, $article_id);
		} else {
			$query = $pdo -> prepare("UPDATE column_articles SET column_name = ? WHERE article_id = ? ");
			$query -> bindValue(1, $column_name);
			$query -> bindValue(2, $article_id);
		}
		$query -> execute();
	}
	
	/**
	 * Get all column names for each column article
	 * @param int $article_id
	 * @return string $column_name
	 * @access public
	 */
	public function getArticleColumn($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("SELECT column_name FROM column_articles WHERE article_id = ? ");
		$query -> bindValue(1, $article_id);
		$query -> execute();
		$column_name = $query -> fetchColumn();

		return $column_name;
	}

	/**
	 * Deletes column article for each column article
	 * @param int $article_id
	 * @access public
	 */
	public function deleteColumnArticle($article_id) {
		global $pdo;
		$query = $pdo -> prepare("DELETE FROM column_articles WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}
	
	/**
	 * Associates users (as 'authors') with newly created article
	 * @param int $article_id
	 * @param string $article_authors
	 * @access public
	 */
	public function addArticleAuthors($article_id, $article_authors) {
		global $pdo;
		foreach ($article_authors as $key => $author_id) {
			$query = $pdo -> prepare("INSERT INTO article_authors  (article_id, user_id) VALUES (?,?)");
			$query -> bindValue(1, $article_id);
			$query -> bindValue(2, $author_id);
			$query -> execute();
		}
	}
	
	/**
	 * Retrieves users (as 'authors') aassociated with an article
	 * @param int $article_id
	 * @return array
	 * @access public $article_authors
	 */
	public function getArticleAuthors($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("
          SELECT U.user_name
          FROM users U
          INNER JOIN article_authors  AU ON U.user_id = AU.user_id
          WHERE AU.article_id = ?");
		  
		$query -> bindValue(1, $article_id);
		$query -> execute();
		$article_authors = $query -> fetchAll();
		
		return $article_authors;
	}

	/**
	 * Associates users (as 'editors') with newly created article
	 * @param int $article_id
	 * @param string $article_editors
	 * @access public
	 */
	public function addArticleEditors($article_id, $article_editors) {
		global $pdo;

		foreach ($article_editors as $key => $editor_id) {
			$query = $pdo -> prepare("INSERT INTO article_editors (article_id, user_id) VALUES (?,?)");
			$query -> bindValue(1, $article_id);
			$query -> bindValue(2, $editor_id);
			$query -> execute();
		}
	}
	
	/**
	 * Retrieves users (as 'editors') aassociated with an article
	 * @param int $article_id
	 * @return array $article_editors
	 * @access public
	 */
	public function getArticleEditors($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("
          SELECT U.user_name
          FROM users U
          INNER JOIN article_editors AU ON U.user_id = AU.user_id
          WHERE AU.article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
		$article_editors = $query -> fetchAll();
		
		return $article_editors;
	}
	
	/**
	 * Deletes users (as 'editors') aassociated with an article
	 * @param int $article_id
	 * @access public $article_editors
	 */
	public function deleteArticleEditors($article_id) {
		global $pdo;
		
		$query = $pdo -> prepare("DELETE FROM article_editors WHERE article_id = ?");
		$query -> bindValue(1, $article_id);
		$query -> execute();
	}
	
	/**
	 * Retrieves articles with largest amount of likes and orders in descending order
	 * TEMP: limits to 17 articles (arbitrary number)
	 * @return array
	 * @access public $article_editors
	 */
	public function getMostLikedArticles() {
		global $pdo;

		$query = $pdo -> prepare("
         SELECT a . *
         FROM articles AS a
         JOIN article_likes AS al ON al.article_id = a.article_id
         ORDER BY al.article_like_amount DESC
         LIMIT 17
        ");
		$query -> execute();
		$rows = $query -> fetchAll();

		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$most_liked_articles[] = $article;
		}

		return $most_liked_articles;

	}
	
	/**
	 * Retrieves newest articles and orders in descending order
	 * TEMP: limits to 10 articles (arbitrary number)
	 * @return array
	 * @access public $article_editors
	 */
	public function getNewestArticles() {
		global $pdo;

		$query = $pdo -> prepare("
         SELECT a . *
         FROM articles AS a
         ORDER BY a.article_timestamp DESC
         LIMIT 0 , 10
        ");
		$query -> execute();
		$rows = $query -> fetchAll();

		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$newest_articles[] = $article;
		}

		return $newest_articles;
	}
	
	/**
	 * Retrieves newest articles and orders in descending order
	 * @return array $staff_picked_articles
	 * @access public $article_editors
	 */
	public function getStaffPickedArticles() {
		global $pdo;

		$query = $pdo -> prepare("
         SELECT a . *
         FROM articles AS a
         WHERE a.article_staff_pick = 1
         ORDER BY a.article_timestamp DESC
        ");
		$query -> execute();
		$rows = $query -> fetchAll();

		foreach ($rows as $row) {
			$article = new Article($row['article_id'], $row['article_title'], $row['article_content'], $row['article_timestamp'], $row['article_image'], $row['article_status'], $row['article_type'], $row['article_staff_pick']);
			$staff_picked_articles[] = $article;
		}

		return $staff_picked_articles;
	}

}
?>