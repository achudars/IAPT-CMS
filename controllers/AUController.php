<?php

class AUController {
    private $articlesModel;
    private $usersModel;

    public function __construct($articlesModel, $usersModel){
        $this->articlesModel = $articlesModel;
        $this->usersModel = $usersModel;
    }

    public function addArticle(){
        $article_title = $_POST['article_title'];
        $article_content = nl2br($_POST['article_content']);
        $article_image = $_POST['article_image'];

        $article_status = $_POST['article_status'];
        $article_type = $_POST['article_type'];
        $article_rating = 0;
        $article_column = 0;

        if ( $article_type == "review_article") {
            $article_rating = $_POST['article_rating'];
        }

        if ( $article_type == "column_article") {
            $article_column = $_POST['article_column'];
            echo "ARTCILE COLUMN[".$article_column."]";
        }

        $article_authors = $_POST['article_authors'];
        $article_tags = $_POST['article_tags'];

        /*echo "ARTCILE TAGS[".$article_tags."]";
        foreach( $article_tags as $key => $n ) {
              print "ArticleController -->TAGS: ".$n."\n";
         }*/

       // echo "ARTCILE TAGS[".$article_tags."]";


        /*if ( $article_staff_pick == "article_staff_pick" ) {
            $article_staff_pick = $_POST['article_staff_pick'];
        } else if ( $article_staff_pick != "article_staff_pick" ){
            $article_staff_pick = 0;
        }*/

        $article_staff_pick = ( $_POST["article_staff_pick"] == 0 ) ? 0 : 1;

        $this->articlesModel->addArticle( $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick, $article_tags );
    }

    public function editArticle() {
        $article_id = $_POST['article_id'];
        $article_title = $_POST['article_title'];
        $article_content = nl2br($_POST['article_content']);
        $article_image = $_POST['article_image'];

        $article_status = $_POST['article_status'];
        $article_type = $_POST['article_type'];
        $article_rating = 0;
        $article_column = 0;

        if ( $article_type == "review_article") {
            $article_rating = $_POST['article_rating'];
        }

        if ( $article_type == "column_article") {
            $article_column = $_POST['article_column'];
            echo "ARTCILE COLUMN[".$article_column."]";
        }

        $article_authors = $_POST['article_authors'];
        $article_tags = $_POST['article_tags'];

        //echo "ARTCILE AUTHORS[".$article_authors."]";
         //echo "ARTCILE TAGS[".$article_tags."]";
         foreach( $article_tags as $key => $n ) {
              print "ArticleController -->TAGS: ".$n."\n";
         }
        /*foreach( $article_authors as $key => $n ) {
          print "ArticleContreoller -->Authors: ".$n."\n";
      }*/


        /*if ( $article_staff_pick == 1 ) {
            $article_staff_pick = 1;
        } else if ( $article_staff_pick != 1 ){
            $article_staff_pick = 0;
        }*/

        $article_staff_pick = ( $_POST["article_staff_pick"] == 0 ) ? 0 : 1;

        //echo "ARTCILE STAFF PICKED[".$article_staff_pick."]";


        $this->articlesModel->editArticle( $article_id, $article_title, $article_content, $article_image, $article_status, $article_type, $article_authors, $article_rating, $article_staff_pick );
    }

    public function deleteArticle() {
        $article_id = $_POST['article_id'];
        echo "I will delete article with iD: " . $article_id;
        $this->articlesModel->deleteArticle( $article_id );
    }

    public function changeArticleStatus() {
        $article_id = $_POST['article_id'];
        $article_status = $_POST['article_status'];
        $this->articlesModel->changeArticleStatus( $article_id, $article_status );
    }

    public function likeArticle() {
        $article_id = $_POST['article_id'];
        $this->articlesModel->addLike( $article_id );
    }

    public function dislikeArticle() {
        $article_id = $_POST['article_id'];
        $this->articlesModel->addDislike( $article_id );
    }

    public function getLoggedUserId() {
        echo "username: ". $_SESSION['user_name'];
        echo "userpassword: ". $_SESSION['user_password'];
        $this->usersModel->getLoggedUserId( $_SESSION['user_name'], $_SESSION['user_password'] );
    }

}


?>