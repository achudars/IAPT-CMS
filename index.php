<?php

session_start();

// the link includes all manadatory 'includes'
require_once 'config/includes.php';

// Get URL and find out to what page we should be directing
$page = $_GET['page'];
// get show parameter when viewing single articles
$show_id = $_GET['show'];

// display single article
if (!empty($show_id)) {

    $articlesModel = new ArticlesModel();
    $usersModel = new UsersModel();
    $controller = new AUController( $articlesModel, $usersModel );
    $view = new AUView( $controller, $articlesModel, $usersModel );

    if ( isset($_GET["action"])) {
        if ( $_GET["action"]=="like") {
            $controller->likeArticle();
        } else if ( $_GET["action"]=="dislike") {
            $controller->dislikeArticle();
        }
    }
    echo $view->output_one_article( $show_id );

} else if (!empty($page)){
	
     // based on page create the relevant Model, View and Controller
     switch ($page) {
        case "home":
			// home page
            $articlesModel = new ArticlesModel();
            $usersModel = new UsersModel();
            $controller = new AUController( $articlesModel, $usersModel );
            $view = new AUView( $controller, $articlesModel, $usersModel );
            echo $view->output_home_articles();
            break;
        case "register":
            $model = new RegisterModel();
            $controller = new RegisterController($model);
            $view = new RegisterView($controller, $model);
			// if action is set, register user
            if ( isset($_GET['action']) ) {
                $controller->registerUser();
            }
            echo $view->output();
            break;
        case "login":
            $model = new LoginModel();
            $controller = new LoginController($model);
            $view = new LoginView($controller, $model);
			// if action is set, register user
            if ( isset($_GET["action"])) {
            	// if action is set and is 'login', log user in
                if( $_GET["action"]=="login") {
                    $controller->login();
				// if action is set and is 'logout', log user out
                } else if( $_GET["action"]=="logout") {
                    $controller->logout();
                }
            }
            echo $view->output();
            break;
        case "add":
			// page to add an article
            $articlesModel = new ArticlesModel();
            $usersModel = new UsersModel();
            $controller = new AUController( $articlesModel, $usersModel );
            $view = new AUView( $controller, $articlesModel, $usersModel );
            if ( isset($_GET["action"])) {
                if( $_GET["action"]=="add_article") {
                    $controller->addArticle();
                }
            }
            echo $view->output_article_fields();
            break;
        case "edit":
			// page to edit an existing article
            $articlesModel = new ArticlesModel();
            $usersModel = new UsersModel();
            $controller = new AUController( $articlesModel, $usersModel );
            $view = new AUView( $controller, $articlesModel, $usersModel );
            echo $view->output_edit_article( $_GET['id'] );
            break;
        case "users":
            $model = new UsersModel();
            $controller = new UsersController($model);
            $view = new UsersView($controller, $model);
            if ( isset($_GET["action"])) {
                if( $_GET["action"]=="delete_user") {
                    $controller->deleteUser();
                } else if ( $_GET["action"]=="change_role") {
                    $controller->changeUserRole();
                }
            }
            echo $view->output();
            break;
        case "articles":
            $articlesModel = new ArticlesModel();
            $usersModel = new UsersModel();
            $controller = new AUController( $articlesModel, $usersModel );
            $view = new AUView( $controller, $articlesModel, $usersModel );
            if ( isset($_GET['type']) ) {
                if ( $_GET["type"]=="basic") {
                	// link to basic articles
                    echo $view->output_basic_articles();
                } else if ( $_GET["type"]=="column") {
                	// link to column articles
                    echo $view->output_column_articles();
                } else if ( $_GET["type"]=="review") {
                	// link to review articles
                    echo $view->output_review_articles();
                } else if ( $_GET["type"]=="my") {
                	// link to articles the user has contributed to
                    echo $view->output_my_articles();
                } else if ( $_GET["type"]=="all") {
                    if ( isset($_GET['action']) ) {
                    	// call different function if action is set
                               if ( $_GET["action"]=="change_article_status") {
                            $controller->changeArticleStatus();
                        } else if ( $_GET["action"]=="edit_article") {
                            $controller->editArticle();
                        } else if ( $_GET["action"]=="delete_article") {
                            $controller->deleteArticle();
                        } else if ( $_GET["action"]=="search_articles") {
                            // filtered stuff from search
                            echo $view->output_found_articles();
                            break;
                        }
                    }
                    echo $view->output_articles();
                }
            } else {
                echo $view->output_articles();
            }
            break;
        default:
            echo "The request page does not exist. Please go back.";

    }
} else {
	// redirection to home in URL invalid
    header("Location: index.php?page=home");
}

 ?>
