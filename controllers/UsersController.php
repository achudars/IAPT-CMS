<?php

class UsersController {
	private $model;
	
	/**
	 * Constructs users model
	 * @param usersModel $model
	 * @access public
	 */
	public function __construct($model){
		$this->model = $model;
	}
	
	/**
	 * Calls the delete function to try to delete the user
	 * @access public
	 */
    public function deleteUser() {
        $user_id = $_POST['user_id'];
        $this->model->deleteUser( $user_id );
    }
	
	/**
	 * Calls the function to change the role of a user
	 * Accessible only to a user with the publisher status
	 * @access public
	 */
    public function changeUserRole() {
        $user_id = $_POST['user_id'];
        $user_role = $_POST['user_role'];
        $this->model->changeUserRole( $user_id, $user_role );
    }

}


 ?>