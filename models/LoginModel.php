<?php
include_once 'User.php';

class LoginModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }


    public function getLogins(){
        global $pdo;

        $sth = $pdo->prepare("SELECT * FROM users WHERE article_type = :type");
/*        $sth->execute(array(':type'=>'article'));
        $rows = $sth->fetchAll();

        foreach($rows as $row){
            $article = new Login(
                 $row['article_title']
                ,$row['article_content']
                ,$row['article_timestamp']
                ,$row['article_image']
                ,$row['article_status']
                ,$row['article_type']
            );
            $articles[] = $article;
        }
        return $articles;*/
    }

}

 ?>