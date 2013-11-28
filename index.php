<?php

/*  @IAPT Bring in the includes - the list was getting kind of long and is needed on most pages,
*   so let's bring it in one file just to make including a do-it-once */
require 'config/includes.php';

/*  @IAPT Let's get our URL and find out to what page we should be directing */
echo $url = $_GET['url'];
$page = $_GET['page'];

/*  @IAPT If the page requested is not the index page, then we will need to do something */
if (!empty($page)){

    /*  @IAPT For each of the pages in our website, we create a view, a controller and a model.  When
    *   someone requests the page, we instnce a version of each of those to run the page */
     if ($page == "articles")
     {

        $model = new BasicArticlesModel();
        $controller = new BasicArticlesController($model);
        $view = new BasicArticlesView($controller, $model);
        echo $view->output();
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
