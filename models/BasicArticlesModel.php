<?php
include 'Article.php';

class BasicArticlesModel {
    public $string;

    public function __construct(){
        $this->string= "articles";
    }


    public function getBasicArticles(){
        $pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
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
            $articles[] = $article;
        }
        return $articles;
    }

}

 ?>