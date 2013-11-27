<?php

// Config
require_once("config/database.php");

// MVC articles
require 'controllers/articlesController.php';
require 'models/articlesModel.php';
require 'views/articlesView.php';

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

 ?>