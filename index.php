<?php

require 'config/includes.php';

/* 	@IAPT Let's get our URL and find out to what page we should be directing */

$page = basename($_SERVER['PHP_SELF']);

/* 	@IAPT If the page requested is not the index page, then we will need to do something */
if (!empty($page) && $page !== "index.php"){
	echo "TEST";
	/* 	@IAPT For each of the pages in our website, we create a view, a controller and a model.  When
	*	someone requests the page, we instnce a version of each of those to run the page */
	 if ($page == "articles")
	 {

	 	$model = new ArticleModel();
	 	$controller = new ArticleController($model);
	 	$view = new ArticleView($controller, $model);
	 	echo $view->output();
	 }
	 /* @IAPT We do the same as we did for Article with the Videos link */
/*	 else if ($page == "videos")
	 {
	 	$model = new VideosModel();
	 	$controller = new VideosController($model);
	 	$view = new VideosView($controller, $model);
	 	echo $view->output();
	 } */
/*	 foreach($data as $key => $value){
	 	if ($page == $key){
	 		echo $page;
	 		$m = $value['model'];
	 		$v = $value['view'];
	 		$c = $value['controller'];
	 		break;
	 	}
	 }*/
	}
	else
	{
		include 'home.php';
	}



// foreach($data as $key => $value){
// 	if ($page == $key){
// 		echo $page;
// 		$m = $value['model'];
// 		$v = $value['view'];
// 		$c = $value['controller'];
// 		break;
// 	}
// }



	?>