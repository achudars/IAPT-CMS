<?php
include_once("config/connection.php");
include 'Article.php';

class ArticlesModel {
    public $string;

    public function __construct(){
        $this->string= "articles";
    }


    public function getBasicArticles(){
        global $pdo;

        //$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        $sth = $pdo->prepare("SELECT * FROM articles WHERE article_type = :type");
        $sth->execute(array(':type'=>'article'));
        $rows = $sth->fetchAll();

        foreach($rows as $row){
            $article = new Article(
                 $row['article_title']
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
                 $row['article_title']
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
                 $row['article_title']
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

}

 ?>