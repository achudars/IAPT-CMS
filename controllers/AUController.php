<?php

class AUController {
	private $articlesModel;
	private $usersModel;

	/**
	 * Constructs articles model and users model
	 * @param ArticlesModel articlesModel [description]
	 * @param UsersModel usersModel [description]
	 * @access public
	 */
	public function __construct($articlesModel, $usersModel) {
		$this -> articlesModel = $articlesModel;
		$this -> usersModel = $usersModel;
	}

	/**
	 * adds an article to the articles model
	 */
	public function addArticle() {
		$article_title = $_POST['article_title'];
		$article_content = nl2br($_POST['article_content']);
		$article_image = $_POST['article_image'];

		$article_status = $_POST['article_status'];
		$article_type = $_POST['article_type'];
		$article_rating = 0;
		$column_name = 0;

		// if article is of type review article rating will be a value between 1 and 5, otherwise 0
		if ($article_type == "review_article") {
			$article_rating = $_POST['article_rating'];
		}

		// if article is of type column article rating will be a column name
		if ($article_type == "column_article") {
			$column_name = $_POST['column_name'];
		}

		// adds article authors (can be an empty array)
		$article_authors = $_POST['article_authors'];
		// adds article editors (can be an empty array)
		$article_editors = $_POST['article_editors'];
		// if the checkbox for "make staff pick" is checked, the value that will be 1, otherwise 0
		$article_staff_pick = ($_POST["article_staff_pick"] == 0) ? 0 : 1;

		$this -> articlesModel -> addArticle($article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick, $column_name, $article_editors);
	}

	/**
	 * This function is called when a user has finished editing an article.
	 * This function updates all fields of an article.
	 */
	public function editArticle() {
		$article_id = $_POST['article_id'];
		$article_title = $_POST['article_title'];
		$article_content = nl2br($_POST['article_content']);
		$article_image = $_POST['article_image'];

		$article_status = $_POST['article_status'];
		$article_type = $_POST['article_type'];
		$article_rating = 0;
		$column_name = 0;

		// if article is of type review article rating will be a value between 1 and 5, otherwise 0
		if ($article_type == "review_article") {
			$article_rating = $_POST['article_rating'];
		}

		// if article is of type column article rating will be a column name
		if ($article_type == "column_article") {
			$column_name = $_POST['column_name'];
		}

		// adds article authors (can be an empty array)
		$article_authors = $_POST['article_authors'];
		// adds article editors (can be an empty array)
		$article_editors = $_POST['article_editors'];
		// if the checkbox for "make staff pick" is checked, the value that will be 1, otherwise 0
		$article_staff_pick = ($_POST["article_staff_pick"] == 0) ? 0 : 1;

		$this -> articlesModel -> editArticle($article_id, $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick, $column_name, $article_editors);
	}

	/*
	 * This function deletes an article.
	 * WARNING: this function is partially implemented.
	 * An article may not be deleted if foreign key dependencies exist.
	 */
	public function deleteArticle() {
		$article_id = $_POST['article_id'];
		echo "I will delete article with iD: " . $article_id;
		$this -> articlesModel -> deleteArticle($article_id);
	}

	/*
	 * Allows editors and publishers change the status of an article to one of the forms:
	 * submitted, awaiting changes, rejected, published, under review .
	 */
	public function changeArticleStatus() {
		$article_id = $_POST['article_id'];
		$article_status = $_POST['article_status'];
		$this -> articlesModel -> changeArticleStatus($article_id, $article_status);
	}

	/*
	 * This function increments the number of likes per article.
	 * Not bound to any user.
	 */
	public function likeArticle() {
		$article_id = $_POST['article_id'];
		$this -> articlesModel -> addLike($article_id);
	}

	/*
	 * This function increments the number of dislikes per article.
	 * Not bound to any user.
	 */
	public function dislikeArticle() {
		$article_id = $_POST['article_id'];
		$this -> articlesModel -> addDislike($article_id);
	}

	/*
	 * This function sends a request to usersModel to retrieve the ID of the logged in user
	 */
	public function getLoggedUserId() {
		echo "username: " . $_SESSION['user_name'];
		echo "userpassword: " . $_SESSION['user_password'];
		$this -> usersModel -> getLoggedUserId($_SESSION['user_name'], $_SESSION['user_password']);
	}

	/*
	 * This function sends a request to articlesModel to retrieve the article column
	 */
	/*
	 public function  getArticleColumn( $article_id ) {
	 $article_id = $_GET['article_id'];
	 $this->articlesModel->getArticleColumn( $article_id );
	 }*/

}
?>