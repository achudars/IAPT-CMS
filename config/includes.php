<?php

// Config
require_once "config/database.php";

// MVC articles
require_once 'controllers/ArticlesController.php';
require_once 'models/ArticlesModel.php';
require_once 'views/ArticlesView.php';

// MVC register
require_once 'controllers/RegisterController.php';
require_once 'models/RegisterModel.php';
require_once 'views/RegisterView.php';

// MVC login
require_once 'controllers/LoginController.php';
require_once 'models/LoginModel.php';
require_once 'views/LoginView.php';

// MVC users
require_once 'controllers/UsersController.php';
require_once 'models/UsersModel.php';
require_once 'views/UsersView.php';

// VC users+articles
require_once 'controllers/AUController.php';
require_once 'views/AUView.php';

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

 ?>