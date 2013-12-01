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


    public function getUserName(){ }
    public function getUserPassword(){ }
    public function setUserRole(){ }

    public function deleteUser( $user_id ) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM users WHERE user_id = ?");
        $query->bindValue(1, $user_id);
        $query->execute();
    }

    public function changeUserRole( $user_id, $user_role ) {
        global $pdo;

        //echo "UPDATE users SET user_role=" . $user_role . " WHERE user_id=" . $user_id;

        $sql = "UPDATE users SET user_role=? WHERE user_id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($user_role,$user_id));

        $query->execute();
    }

}

 ?>