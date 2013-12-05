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
               ,$row['article_staff_pick']
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
               ,$row['article_staff_pick']
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
               ,$row['article_staff_pick']
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
               ,$row['article_staff_pick']
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
               ,$row['article_staff_pick']
               );
            $articles[] = $article;
        }
        return $articles;
    }


    public function addArticle( $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick ) {
        global $pdo;

        $query = $pdo->prepare("INSERT INTO articles (article_title, article_content, article_timestamp, article_image, article_status, article_type, article_staff_pick) VALUES (?,?,?,?,?,?,?)");

        $query->bindValue(1, $article_title);
        $query->bindValue(2, $article_content);
        $query->bindValue(3, time());
        $query->bindValue(4, $article_image); // TODO change to real image
        $query->bindValue(5, "submitted");
        $query->bindValue(6, $article_type);
        $query->bindValue(7, $article_staff_pick);
        $query->execute();

        $article_id = $pdo->lastInsertId();


        $this->setDefaultLike( $article_id );
        $this->setDefaultDislike( $article_id );
        if ( $article_rating != 0) {
            $this->addRating( $article_id, $article_rating );
        }
        $this->addAuthors( $article_id, $article_authors );

        //$this->associateAuthors( $article_id );
        //
        /*foreach( $article_authors as $key => $article_author ) {
          print "article_id" . $article_id . " | ". $article_author.  "\n";
          // /$this->associateAuthors( $article_id, $article_author );
        }*/

        //print "Article authors: " . $article_authors;

        //redirection
        //header("Location: index.php?page=articles&type=all");
    }

    public function associateAuthors( $article_id, $article_author ) {
        global $pdo;
        $query = $pdo->prepare("
          INSERT INTO article_users(article_id, user_id) VALUES (?,?)
        ");
        $query->bindValue(1, $article_id );
        $query->bindValue(2, $article_author );
        $query->execute();

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

    public function setDefaultDislike( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("
          INSERT INTO article_dislikes (article_dislike_amount, article_id) VALUES (?,?)
        ");
        $query->bindValue(1, 0 );
        $query->bindValue(2, $article_id );
        $query->execute();
    }



    public function deleteArticle( $article_id ) {
        global $pdo;

        $this->deleteLike( $article_id );
        $this->deleteDislike( $article_id );
        $this->deleteRating( $article_id );


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


    public function editArticle( $article_id, $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick ) {
        global $pdo;

        $sql = "UPDATE articles SET article_title=?, article_content=?, article_timestamp=?, article_image=?, article_status=?, article_type=?, article_staff_pick=? WHERE article_id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array( $article_title, $article_content, time(), $article_image, $article_status, $article_type, $article_staff_pick, $article_id ));



        if ( $article_type == "review_article") {
            $this->deleteRating( $article_id );
            $this->addRating( $article_id, $article_rating );
        } else {
            $this->deleteRating( $article_id );
        }
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
    }

    public function deleteLike( $article_id ) {
        global $pdo;

        $query = $pdo->prepare("DELETE FROM article_likes WHERE article_id = ?");
        $query->bindValue(1, $article_id);
        $query->execute();
    }

    public function addDislike( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("UPDATE article_dislikes SET article_dislike_amount = article_dislike_amount + 1 WHERE article_id = ? ");
        $query->bindValue(1, $article_id);
        $query->execute();
    }

    public function deleteDislike( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM article_dislikes WHERE article_id = ?");
        $query->bindValue(1, $article_id);
        $query->execute();
    }

    public function getArticleRating( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("SELECT review_rating FROM review_articles WHERE article_id = ? ");
        $query->bindValue(1, $article_id);
        $query->execute();
        $article_rating = $query->fetchColumn();
        return $article_rating;
    }

    public function addRating( $article_id, $article_rating ) {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM review_articles WHERE article_id = ?");
        $query->bindValue(1, $article_id);
        $result = $query->execute();


        if ( $result ) {
            echo "WILL INSERT ";
            $query = $pdo->prepare("INSERT INTO review_articles (review_rating, article_id) VALUES (?,?)");
            $query->bindValue(1, $article_rating);
            $query->bindValue(2, $article_id);
        } else {
          echo "WILL UPDATE ";
            $query = $pdo->prepare("UPDATE review_articles SET review_rating = ? WHERE article_id = ? ");
            $query->bindValue(1, $article_rating);
            $query->bindValue(2, $article_id);
        }
        $query->execute();
    }

    public function editRating( $article_id, $article_rating ) {
        global $pdo;
        $query = $pdo->prepare("UPDATE review_articles SET review_rating = ? WHERE article_id = ? ");
        $query->bindValue(1, $article_rating);
        $query->bindValue(2, $article_id);
        $query->execute();
    }

    public function deleteRating( $article_id ) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM review_articles WHERE article_id = ?");
        $query->bindValue(1, $article_id);
        $query->execute();
    }

    public function addAuthors( $article_id, $article_authors ) {
        global $pdo;
        foreach( $article_authors as $key => $author_id ) {
          $query = $pdo->prepare("INSERT INTO article_users (article_id, user_id) VALUES (?,?)");
          echo "INSERT INTO article_users: article_id " . $article_id . ", user_id " . $author_id ." )";
          $query->bindValue(1, $article_id);
          $query->bindValue(2, $author_id);
          $query->execute();
        }
    }

    public function getMostLikedArticles() {
        global $pdo;

        $query = $pdo->prepare("
                                SELECT a . *
                                FROM articles AS a
                                JOIN article_likes AS al ON al.article_id = a.article_id
                                ORDER BY al.article_like_amount DESC
                                LIMIT 0 , 5
        ");
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
               ,$row['article_staff_pick']
              );
            $most_liked_articles[] = $article;
        }

        return $most_liked_articles;

    }


    public function getNewestArticles() {
        global $pdo;

        $query = $pdo->prepare("
                                SELECT a . *
                                FROM articles AS a
                                ORDER BY a.article_timestamp DESC
                                LIMIT 0 , 5
        ");
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
               ,$row['article_staff_pick']
              );
            $newest_articles[] = $article;
        }

        return $newest_articles;

    }

    public function getStaffPickedArticles() {
        global $pdo;

        $query = $pdo->prepare("
                                SELECT a . *
                                FROM articles AS a
                                WHERE a.article_staff_pick = 1
                                ORDER BY a.article_timestamp DESC
                                LIMIT 0 , 5
        ");
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
               ,$row['article_staff_pick']
              );
            $staff_picked_articles[] = $article;
        }

        return $staff_picked_articles;
    }

}

?>