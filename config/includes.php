<?php

// Config
require_once("config/database.php");

// MVC articles
require 'controllers/ArticlesController.php';
require 'models/ArticlesModel.php';
require 'views/ArticlesView.php';

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

 ?>