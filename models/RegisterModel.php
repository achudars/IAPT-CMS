<?php
include_once 'User.php';

class RegisterModel {
    public $string;


    public function getUsers(){
        /*$pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        $sth = $pdo->prepare("SELECT * FROM users WHERE user_type = :type");
        $sth->execute(array(':type'=>'user'));
        $rows = $sth->fetchAll();

        foreach($rows as $row){
            $user = new Article(
                 $row['user_id']
                ,$row['user_name']
                ,$row['user_password']
                ,$row['user_role']
            );
            $users[] = $user;
        }
        return $users;*/
    }

}

 ?>