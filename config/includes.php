<?php

// Config
require_once("config/database.php");

// MVC articles
require 'controllers/BasicArticlesController.php';
require 'models/BasicArticlesModel.php';
require 'views/BasicArticlesView.php';

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

 ?>