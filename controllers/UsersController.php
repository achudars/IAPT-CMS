<?php

class UsersController {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

    public function deleteUser() {
        $user_id = $_POST['user_id'];

        echo "FROM CONTROLLER: " . $user_id . " | ";

        $this->model->deleteUser( $user_id );
    }

}


 ?>