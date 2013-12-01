<?php

class UsersController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function deleteUser() {
        $user_id = $_POST['user_id'];
        $this->model->deleteUser( $user_id );
    }

    public function changeUserRole() {
        $user_id = $_POST['user_id'];
        $user_role = $_POST['user_role'];
        $this->model->changeUserRole( $user_id, $user_role );
    }

}


 ?>