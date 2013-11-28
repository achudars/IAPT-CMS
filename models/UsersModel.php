<?php
include_once 'User.php';

class UsersModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }


    public function getUsers(){
        global $pdo;
        /*$sth = $pdo->prepare("SELECT * FROM users WHERE user_type = :type");
        $sth->execute(array(':type'=>'user'));
        $rows = $sth->fetchAll();

        foreach($rows as $row){
            $user = new User(
                 $row['user_title']
                ,$row['user_content']
                ,$row['user_timestamp']
                ,$row['user_image']
                ,$row['user_status']
                ,$row['user_type']
            );
            $users[] = $user;
        }
        return $users;*/
    }

}

 ?>