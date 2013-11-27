<?php

require_once("config/includes.php");


$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);
echo $view->output();


/*$page = basename($_SERVER['PHP_SELF']);

if (!empty($page) && $page !== "index.php"){
	 if ($page == "articles") {

	 	$model = new ArticleModel();
	 	$controller = new ArticleController($model);
	 	$view = new ArticleView($controller, $model);
	 	echo $view->output();
	 }

	}
	else
	{
		include 'home.php';
	}
*/


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