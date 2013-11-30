<?php
include_once 'User.php';

class UsersModel {
    public $string;

    public function __construct(){
        $this->string= "users";
    }


    public function getAllUsers(){
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM users");
        $query->execute();
        $rows = $query->fetchAll();

        foreach($rows as $row){
            $user = new User(
                 $row['user_id']
                ,$row['user_name']
                ,$row['user_password']
                ,$row['user_role']
            );
            $users[] = $user;
        }
        return $users;
    }

    public function getUserRole(){

    }
    public function getUserName(){ }
    public function getUserPassword(){ }
    public function setUserRole(){ }
    public function addUser(){ }
    public function deleteUser(){ }

}

 ?>