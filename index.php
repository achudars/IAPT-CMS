<?php

session_start();

/*  @IAPT Bring in the includes - the list was getting kind of long and is needed on most pages,
*   so let's bring it in one file just to make including a do-it-once */
require_once 'config/includes.php';

/*  @IAPT Let's get our URL and find out to what page we should be directing */
//echo $url = $_GET['url'];
$page = $_GET['page'];
$show_id = $_GET['show'];

if (!empty($show_id)) {

    $model = new ArticlesModel();
    $controller = new ArticlesController($model);
    $view = new ArticlesView($controller, $model);
    if ( isset($_GET["action"])) {
        if ( $_GET["action"]=="like") {
            $controller->likeArticle();
        } else if ( $_GET["action"]=="dislike") {
            $controller->dislikeArticle();
        }
    }
    echo $view->output_one_article( $show_id );

} else if (!empty($page)){

    /*  @IAPT For each of the pages in our website, we create a view, a controller and a model.  When
    *   someone requests the page, we instnce a version of each of those to run the page */

     switch ($page) {
        case "home":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            echo $view->output_home_articles();
            break;
        case "register":
            $model = new RegisterModel();
            $controller = new RegisterController($model);
            $view = new RegisterView($controller, $model);
            if ( isset($_GET['action']) ) {
                $controller->registerUser();
            }
            echo $view->output();
            break;
        case "login":
            $model = new LoginModel();
            $controller = new LoginController($model);
            $view = new LoginView($controller, $model);
            if ( isset($_GET["action"])) {
                if( $_GET["action"]=="login") {
                    $controller->login();
                } else if( $_GET["action"]=="logout") {
                    $controller->logout();
                }
            }
            echo $view->output();
            break;
        case "add":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            if ( isset($_GET["action"])) {
                if( $_GET["action"]=="add_article") {
                    $controller->addArticle();
                }
            }
            echo $view->output_article_fields();
            break;
        case "edit":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
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
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            if ( isset($_GET['type']) ) {
                if ( $_GET["type"]=="basic") {
                    echo $view->output_basic_articles();
                } else if ( $_GET["type"]=="column") {
                    echo $view->output_column_articles();
                } else if ( $_GET["type"]=="review") {
                    echo $view->output_review_articles();
                } else if ( $_GET["type"]=="all") {
                    if ( isset($_GET['action']) ) {
                        if ( $_GET["action"]=="change_article_status") {
                            $controller->changeArticleStatus();
                        } else if ( $_GET["action"]=="edit_article") {
                            $controller->editArticle();
                        } else if ( $_GET["action"]=="delete_article") {
                            $controller->deleteArticle();
                        } else if ( $_GET["action"]=="search_articles") {
                            // filtered stuff
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
    //include 'home.php';
    header("Location: index.php?page=home");
}

 ?>
