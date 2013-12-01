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

    public function deleteUser( $user_id ) {
        global $pdo;
        $query = $pdo->prepare("DELETE FROM users WHERE user_id = ?");
        $query->bindValue(1, $user_id);
        $query->execute();
    }

    public function showUserRoles() {

        $users = [];

        /*foreach ($user_roles as $user_role) {
            if ( $user_role == "subscriber") {
                $users = array_merge($users,(array)$subscribers);
            }
            if ( $user_role == "writer") {
                $users = array_merge($users,(array)$writers);
            }
            if ( $user_role == "editor") {
                $users = array_merge($users,(array)$editors);
            }
            if ( $user_role == "publisher") {
                $users = array_merge($users,(array)$publishers);
            }
        }*/

        return $users;
    }

    public function changeUserRole( $user_id, $user_role ) {
        global $pdo;

        $sql = "UPDATE users SET user_role=? WHERE user_id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($user_role,$user_id));
    }

    public function getSubscribers() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM users WHERE user_role = ?");
        $query->bindValue(1, "subscriber");
        $query->execute();
        $rows = $query->fetchAll();

        foreach($rows as $row){
            $subscriber = new User(
                 $row['user_id']
                ,$row['user_name']
                ,$row['user_password']
                ,$row['user_role']
            );
            $subscribers[] = $subscriber;
        }
        return $subscribers;
    }
    public function getWriters() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM users WHERE user_role = ?");
        $query->bindValue(1, "writer");
        $query->execute();
        $rows = $query->fetchAll();

        foreach($rows as $row){
            $writer = new User(
                 $row['user_id']
                ,$row['user_name']
                ,$row['user_password']
                ,$row['user_role']
            );
            $writers[] = $writer;
        }
        return $writers;
    }
    public function getEditors() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM users WHERE user_role = ?");
        $query->bindValue(1, "editor");
        $query->execute();
        $rows = $query->fetchAll();

        foreach($rows as $row){
            $editor = new User(
                 $row['user_id']
                ,$row['user_name']
                ,$row['user_password']
                ,$row['user_role']
            );
            $editors[] = $editor;
        }
        return $editors;
    }
    public function getPublishers() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM users WHERE user_role = ?");
        $query->bindValue(1, "publisher");
        $query->execute();
        $rows = $query->fetchAll();

        foreach($rows as $row){
            $publisher = new User(
                 $row['user_id']
                ,$row['user_name']
                ,$row['user_password']
                ,$row['user_role']
            );
            $publishers[] = $publisher;
        }
        return $publishers;
    }

}

 ?>