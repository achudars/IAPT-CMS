<?php

/*  @IAPT Bring in the includes - the list was getting kind of long and is needed on most pages,
*   so let's bring it in one file just to make including a do-it-once */
require_once 'config/includes.php';

/*  @IAPT Let's get our URL and find out to what page we should be directing */
echo $url = $_GET['url'];
$page = $_GET['page'];
$id = $_GET['id'];

/*  @IAPT If the page requested is not the index page, then we will need to do something */
if (!empty($id)) {

    $model = new ArticlesModel();
    $controller = new ArticlesController($model);
    $view = new ArticlesView($controller, $model);
    echo $view->output_one_article( $id );

} else if (!empty($page)){

    /*  @IAPT For each of the pages in our website, we create a view, a controller and a model.  When
    *   someone requests the page, we instnce a version of each of those to run the page */

     switch ($page) {
        case "articles":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            echo $view->output_home_articles();
            break;
        case "register":
            $model = new RegisterModel();
            $controller = new RegisterController($model);
            $view = new RegisterView($controller, $model);
            echo $view->output();
            break;
        case "login":
            $model = new LoginModel();
            $controller = new LoginController($model);
            $view = new LoginView($controller, $model);
            echo $view->output();
            break;
        case "submit":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            echo $view->output_article_fields();
            break;
        case "check":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            echo $view->output();
            break;
        case "admin":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            echo $view->output();
            break;
        case "list":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            echo $view->output_all_articles();
            break;
        case "tutorial":
            $model = new ArticlesModel();
            $controller = new ArticlesController($model);
            $view = new ArticlesView($controller, $model);
            echo $view->output();
            break;
        default:
            echo "The request page does not exist. Please go back.";

    }

     /* @IAPT We do the same as we did for books with the Videos link */
    /* else if ($page == "videos")
     {
        $model = new VideosModel();
        $controller = new VideosController($model);
        $view = new VideosView($controller, $model);
        echo $view->output();
     }*/
} else {
    //include 'home.php';
    header("Location: index.php?page=articles");
}



// foreach($data as $key => $value){
//  if ($page == $key){
//      echo $page;
//      $m = $value['model'];
//      $v = $value['view'];
//      $c = $value['controller'];
//      break;
//  }
// }



 ?>
