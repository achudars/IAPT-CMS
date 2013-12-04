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
        $sth->execute(array(':type'=>'basic_article'));
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
        $sth->execute(array(':type'=>'column_article'));
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
        $sth->execute(array(':type'=>'review_article'));
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

        $query = $pdo->prepare("INSERT INTO articles (article_title, article_content, article_timestamp, article_image, article_status, article_type) VALUES (?,?,?,?,?,?)");

        $query->bindValue(1, $article_title);
        $query->bindValue(2, $article_content);
        $query->bindValue(3, time());
        $query->bindValue(4, $article_image); // TODO change to real image
        $query->bindValue(5, "submitted");
        $query->bindValue(6, $article_type);
        $query->execute();

        $article_id = $pdo->lastInsertId();

        $this->setDefaultLike( $article_id );
        // SELECT IDENT_CURRENT(‘tablename’)
        /*$query = $pdo->prepare("
          INSERT INTO article_likes( article_like_id, article_like_amount, article_id )
          SELECT article_id, RAND(100), article_id
          FROM articles
          WHERE article_id
          ");*/
        //$query->execute();
        //echo $query;
        //print $article_id;
        //redirection
        //header("Location: index.php?page=articles");
    }

    public function setDefaultLike( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("
          INSERT INTO article_likes (article_like_amount, article_id) VALUES (?,?)
        ");
        $query->bindValue(1, 0 );
        $query->bindValue(2, $article_id );
        $query->execute();
    }



    public function deleteArticle( $article_id ) {
        global $pdo;

        $query = $pdo->prepare("DELETE FROM article_likes WHERE article_like_id = ?");
        $query->bindValue(1, $article_id);
        $query->execute();

        $query = $pdo->prepare("DELETE FROM article_dislikes WHERE article_dislike_id = ?");
        $query->bindValue(1, $article_id);
        $query->execute();

        $query = $pdo->prepare("DELETE FROM articles WHERE article_id = ?");
        $query->bindValue(1, $article_id);
        $query->execute();
        // TODo update likes...

    }

    public function changeArticleStatus( $article_id, $article_status ) {
        global $pdo;
        $sql = "UPDATE articles SET article_status=? WHERE article_id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($article_status,$article_id));
    }


    public function editArticle( $article_title, $article_content, $article_image, $article_status, $article_type, $article_id ) {
        global $pdo;
        $sql = "UPDATE articles SET article_title=?, article_content=?, article_timestamp=?, article_image=?, article_status=?, article_type=? WHERE article_id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array( $article_title, $article_content, time(), $article_image, $article_status, $article_type, $article_id ));
    }

    public function getLikes( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("SELECT article_like_amount FROM article_likes WHERE article_id = ? ");
        $query->bindValue(1, $article_id);
        $query->execute();
        $article_like_amount = $query->fetchColumn();
        return $article_like_amount;
    }
    public function getDislikes( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("SELECT article_dislike_amount FROM article_dislikes WHERE article_id = ? ");
        $query->bindValue(1, $article_id);
        $query->execute();
        $article_dislike_amount = $query->fetchColumn();
        return $article_dislike_amount;
    }

    public function addLike( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("UPDATE article_likes SET article_like_amount = article_like_amount + 1 WHERE article_id = ? ");
        $query->bindValue(1, $article_id);
        $query->execute();
        $article_like_amount = $query->fetchColumn();
        return $article_like_amount;
    }

    public function addDislike( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("UPDATE article_dislikes SET article_dislike_amount = article_dislike_amount + 1 WHERE article_id = ? ");
        $query->bindValue(1, $article_id);
        $query->execute();
        $article_like_amount = $query->fetchColumn();
        return $article_like_amount;
    }


}

?>