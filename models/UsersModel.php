<?php
include_once 'User.php';

class UsersModel {
  
	/**
	 * Constructor for users model
	 * @access public
	 */
    public function __construct(){

    }

	/**
	 * Gets all users from the users table
	 * @return array $users
	 * @access public
	 */
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
	
	/**
	 * Deletes a user based on user id 
	 * @param int $user_id
	 * @access public
	 */
    public function deleteUser( $user_id ) {
        global $pdo;
		
        $query = $pdo->prepare("DELETE FROM users WHERE user_id = ?");
        $query->bindValue(1, $user_id);
        $query->execute();
    }
	
	/**
	 * Changes user role based on user id 
	 * @param int $user_id
	 * @param string $user_role
	 * @access public
	 */
    public function changeUserRole( $user_id, $user_role ) {
        global $pdo;

        $sql = "UPDATE users SET user_role=? WHERE user_id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($user_role,$user_id));
    }
	
	/**
	 * Gets users whose role is subscriber 
	 * @return array $subscribers
	 * @access public
	 */
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
	
	/**
	 * Gets users whose role is writer 
	 * @return array $writers
	 * @access public
	 */
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
	
	/**
	 * Gets users whose role is editor 
	 * @return array $editors
	 * @access public
	 */
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
	
	/**
	 * Gets users whose role is publisher 
	 * @return array $publishers
	 * @access public
	 */
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
	
	/**
	 * Actually gets the id of a user whose session parameters user_name and user_password match
	 * Not the best implementation
	 * @param string $user_name
	 * @param string $user_password
	 * @return int $user_id
	 * @access public
	 */
    public function getLoggedUserId( $user_name, $user_password ){
        global $pdo;
        $query = $pdo->prepare("SELECT user_id FROM users WHERE user_name =? AND user_password = ?");
        $query->bindValue(1, $user_name);
        $query->bindValue(2, $user_password);
        $query->execute();
        $user_id = $query->fetchColumn();
        return $user_id;
    }


}

 ?>