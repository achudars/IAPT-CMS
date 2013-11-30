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

    public function addArticle() {

    }

    public function deleteArticle() {

    }

}

 ?>