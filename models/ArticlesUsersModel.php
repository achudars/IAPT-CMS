<?php
include_once "config/connection.php";
include_once "models/ArticlesModel.php";
include_once "models/UsersModel.php";

class ArticlesUsersModel {
    public $string;

    public function __construct(){
        $this->string= "articles";
    }

}




?>