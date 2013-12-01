<?php
include_once "config/connection.php";
include_once "models/Article.php";

class ArticlesModel {
    public $string;

    public function __construct(){
        $this->string= "articles";
    }

    public function getArticle( $article_id ) {
        global $pdo;

        $query = $pdo->prepare( "SELECT * FROM articles WHERE article_id = ?" );
        $query->bindValue( 1, $article_id );
        $query->execute();

        return $query->fetch();
    }

    public function getAllArticles(){
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM articles");
        $query->execute();
        $rows = $query->fetchAll();

        foreach($rows as $row){
            $article = new Article(
               $row['article_id']
               ,$row['article_title']
               ,$row['article_content']
               ,$row['article_timestamp']
               ,$row['article_image']
               ,$row['article_status']
               ,$row['article_type']
               );
            $articles[] = $article;
        }
        return $articles;
    }

    public function getBasicArticles(){
        global $pdo;

        $sth = $pdo->prepare("SELECT * FROM articles WHERE article_type = :type");
        $sth->execute(array(':type'=>'article'));
        $rows = $sth->fetchAll();

        foreach($rows as $row){
            $article = new Article(
               $row['article_id']
               ,$row['article_title']
               ,$row['article_content']
               ,$row['article_timestamp']
               ,$row['article_image']
               ,$row['article_status']
               ,$row['article_type']
               );
            $basic_articles[] = $article;
        }
        return $basic_articles;
    }

    public function getColumnArticles(){
        global $pdo;

        //$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        $sth = $pdo->prepare("SELECT * FROM articles WHERE article_type = :type");
        $sth->execute(array(':type'=>'column article'));
        $rows = $sth->fetchAll();

        foreach($rows as $row){
            $article = new Article(
               $row['article_id']
               ,$row['article_title']
               ,$row['article_content']
               ,$row['article_timestamp']
               ,$row['article_image']
               ,$row['article_status']
               ,$row['article_type']
               );
            $column_articles[] = $article;
        }
        return $column_articles;
    }

    public function getReviewArticles(){
        global $pdo;

        //$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        $sth = $pdo->prepare("SELECT * FROM articles WHERE article_type = :type");
        $sth->execute(array(':type'=>'review'));
        $rows = $sth->fetchAll();

        foreach($rows as $row){
            $article = new Article(
               $row['article_id']
               ,$row['article_title']
               ,$row['article_content']
               ,$row['article_timestamp']
               ,$row['article_image']
               ,$row['article_status']
               ,$row['article_type']
               );
            $review_articles[] = $article;
        }
        return $review_articles;
    }

    public function getFoundArticles( $search_key ) {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM articles WHERE article_title LIKE '%".$search_key."%'");
        $query->execute();
        $rows = $query->fetchAll();

        foreach($rows as $row){
            $article = new Article(
               $row['article_id']
               ,$row['article_title']
               ,$row['article_content']
               ,$row['article_timestamp']
               ,$row['article_image']
               ,$row['article_status']
               ,$row['article_type']
               );
            $articles[] = $article;
        }
        return $articles;
    }

    public function sortAscending() {

    }

    public function getStaffPicks() {

    }

    public function addArticle( $article_title, $article_content, $article_image, $article_status, $article_type ) {
        global $pdo;

        echo "title: " . $article_title ." | content: ". $article_content ." | timestamp: ". time() ." | image: ". $article_image ." | status: ". $article_status ." | type: ". $article_type;

        $query = $pdo->prepare("INSERT INTO articles (article_title, article_content, article_timestamp, article_image, article_status, article_type) VALUES (?,?,?,?,?,?)");

        $query->bindValue(1, $article_title);
        $query->bindValue(2, $article_content);
        $query->bindValue(3, time());
        $query->bindValue(4, "http://placehold.it/350x150"); // TODO change to real image
        $query->bindValue(5, "submitted");
        $query->bindValue(6, $article_type);

        $query->execute();
        //redirection
        header("Location: index.php?page=articles");
    }

    public function deleteArticle( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM articles WHERE article_id = ?");
        $query->bindValue(1, $article_id);
        $query->execute();
    }

    public function changeArticleStatus( $article_id, $article_status ) {
        global $pdo;
        $sql = "UPDATE articles SET article_status=? WHERE article_id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($article_status,$article_id));
    }


}

?>