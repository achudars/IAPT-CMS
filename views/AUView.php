<?php

class AUView {
    private $articlesModel;
    private $usersModel;
    private $controller;
	
	/**
	 * Constructs articles+users view
	 * @param AUController $controller
	 * @param usersModel $usersModel
	 * @param articlesModel articlesModel
	 * @access public
	 */
    public function __construct( $controller, $articlesModel, $usersModel ){
        $this->controller       = $controller;
        $this->articlesModel    = $articlesModel;
        $this->usersModel       = $usersModel;
    }
	
	/**
	 * Outputs all articles
	 */
    public function output_articles(){
        include 'html/header.html.php';
        $articles = $this->articlesModel->getAllArticles();
        include 'html/articles.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs articles based on user id
	 */
    public function output_my_articles(){
        include 'html/header.html.php';
        $articles = $this->articlesModel->getAllArticles();
        include 'html/my.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs articles on home page
	 */
    public function output_home_articles(){
        include 'html/header.html.php';
        $most_liked_articles = $this->articlesModel->getMostLikedArticles();
        $newest_articles = $this->articlesModel->getNewestArticles();
        $staff_picked_articles = (array)$this->articlesModel->getStaffPickedArticles();
        include 'html/home.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs articles of article_type = basic_article
	 */
    public function output_basic_articles(){
        include 'html/header.html.php';
        $articles = $this->articlesModel->getBasicArticles();
        include 'html/articles.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs articles of article_type = column_article
	 */
    public function output_column_articles(){
        include 'html/header.html.php';
        $articles = $this->articlesModel->getColumnArticles();
        include 'html/columns.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs articles of article_type = review_article
	 */
    public function output_review_articles(){
        include 'html/header.html.php';
        $articles = $this->articlesModel->getReviewArticles();
        include 'html/articles.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs a form for article submission (adding an article)
	 */
    public function output_article_fields(){
        $writers = $this->usersModel->getWriters();
        $editors = $this->usersModel->getEditors();
        $publishers = $this->usersModel->getPublishers();
        $writers_and_editors_and_publishers = (array)array_merge($writers,$editors,$publishers);
        include 'html/header.html.php';
        include 'html/add.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs a form for article check with populated fields (editing an article)
	 */
    public function output_edit_article( $article_id ){
        include 'html/header.html.php';

        $writers = $this->usersModel->getWriters();
        $editors = $this->usersModel->getEditors();
        $publishers = $this->usersModel->getPublishers();
        $writers_and_editors_and_publishers = (array)array_merge($writers,$editors,$publishers);

        $article = $this->articlesModel->getArticle( $article_id );
        $article_authors = $this->articlesModel->getArticleAuthors( $article_id );
        $article_editors = $this->articlesModel->getArticleEditors( $article_id );
		
        include 'html/edit.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs a article
	 */
    public function output_one_article( $article_id ){
        include 'html/header.html.php';
        $article = $this->articlesModel->getArticle( $article_id );
        $likes = $this->articlesModel->getLikes( $article_id );
        $dislikes = $this->articlesModel->getDislikes( $article_id );
        include 'html/article.html.php';
        include 'html/footer.html.php';
    }
	
	/**
	 * Outputs articles that matched search query
	 */
    public function output_found_articles(){
        $search_key = $_POST['search_key'];
        include 'html/header.html.php';
        (array)$articles = $this->articlesModel->getFoundArticles( $search_key );
		// handle search requests that didn't find anything
		if (empty($articles)) {
			$articles = [];
			echo "<h1>No articles matched the search query: " . $search_key . "</h1>";
		}
        $likes = $this->articlesModel->getLikes( $article_id );
        $dislikes = $this->articlesModel->getDislikes( $article_id );
        include 'html/articles.html.php';
        include 'html/footer.html.php';
    }
}


?>