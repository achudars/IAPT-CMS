<?php

class ArticlesView {
	private $model;
	private $controller;

	public function __construct($controller, $model){
		$this->controller = $controller;
		$this->model 	  = $model;
	}

	public function output_articles(){
		include 'html/header.html.php';
		$articles = $this->model->getAllArticles();
		include 'html/articles.html.php';
		include 'html/footer.html.php';

        $article_ratings =  $this->model->getArticleRating( $article_id );

	}

	public function output_home_articles(){
		include 'html/header.html.php';
		$most_liked_articles = $this->model->getMostLikedArticles();
		$newest_articles = $this->model->getNewestArticles();
		$staff_picked_articles = (array)$this->model->getStaffPickedArticles();
		include 'html/home.html.php';
		include 'html/footer.html.php';
	}

	public function output_basic_articles(){
		include 'html/header.html.php';
		$articles = $this->model->getBasicArticles();
		include 'html/articles.html.php';
		include 'html/footer.html.php';
	}
	public function output_column_articles(){
		include 'html/header.html.php';
		$articles = $this->model->getColumnArticles();
		include 'html/articles.html.php';
		include 'html/footer.html.php';
	}
	public function output_review_articles(){
		include 'html/header.html.php';
		$articles = $this->model->getReviewArticles();
		include 'html/articles.html.php';
		include 'html/footer.html.php';
	}

	public function output_article_fields(){

		/*include_once "models/User.php";
		$users = new User( 22, $_SESSION['user_name'],$_SESSION['user_password'],$_SESSION['user_role']);
		$writers_and_editors_and_publishers = $users->getAllUsers();*/

		include 'html/header.html.php';
		include 'html/add.html.php';
		include 'html/footer.html.php';
	}

	public function output_edit_article( $article_id ){
		include 'html/header.html.php';
		$article = $this->model->getArticle( $article_id );
		include 'html/edit.html.php';
		include 'html/footer.html.php';
	}

	public function output_one_article( $article_id ){

		include 'html/header.html.php';
		$article = $this->model->getArticle( $article_id );
		$likes = $this->model->getLikes( $article_id );
		$dislikes = $this->model->getDislikes( $article_id );
		include 'html/article.html.php';
		include 'html/footer.html.php';
	}

	public function output_found_articles(){
		$search_key = $_POST['search_key'];
		include 'html/header.html.php';
		$articles = $this->model->getFoundArticles( $search_key );
		$likes = $this->model->getLikes( $article_id );
		$dislikes = $this->model->getDislikes( $article_id );
		include 'html/articles.html.php';
		include 'html/footer.html.php';
	}


}

 ?>