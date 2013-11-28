<?php

// Config
require_once("config/database.php");

// MVC articles
require 'controllers/ArticlesController.php';
require 'models/ArticlesModel.php';
require 'views/ArticlesView.php';

// MVC register
require 'controllers/RegisterController.php';
require 'models/RegisterModel.php';
require 'views/RegisterView.php';

/*// MVC login
require 'controllers/LoginController.php';
require 'models/LoginModel.php';
require 'views/LoginView.php';

// MVC submit
require 'controllers/SubmitController.php';
require 'models/SubmitModel.php';
require 'views/SubmitView.php';

// MVC check
require 'controllers/CheckController.php';
require 'models/CheckModel.php';
require 'views/CheckView.php';

// MVC admin
require 'controllers/AdminController.php';
require 'models/AdminModel.php';
require 'views/AdminView.php';

// MVC list
require 'controllers/ListController.php';
require 'models/ListModel.php';
require 'views/ListView.php';

// MVC tutorial
require 'controllers/TutorialController.php';
require 'models/TutorialModel.php';
require 'views/TutorialView.php';

// MVC users
require 'controllers/UsersController.php';
require 'models/UsersModel.php';
require 'views/UsersView.php';*/

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

 ?>