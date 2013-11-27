<?php

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

require_once("config/includes.php");

//if ( isset($_GET['model']) && isset($_GET['view']) && isset($_GET['controller']) && isset($_GET['action'])) {

/*	$model = $_GET['model'];
	$view = $_GET['view'];
	$controller = $_GET['controller'];
	$action = $_GET['action'];

	print_r("TEST: " . $model);

	if (!(empty($model) || empty($view) || empty($controller) || empty($action))) {
		$m = new $model();
		$c = new $controller($m, $action);
		$v = new $view($m);
		echo $v->output();
	}*/

//}

$page = $_GET['page'];
if (!empty($page)) {

    $data = array(
    	'articles' => array('model' => 'articlesModel', 'view' => 'articlesView', 'controller' => 'articlesController'),
        'home' => array('model' => 'model', 'view' => 'view', 'controller' => 'controller'),
        'portfolio' => array('model' => 'PortfolioModel', 'view' => 'PortfolioView', 'controller' => 'PortfolioController')
    );

    foreach($data as $key => $components){
        if ($page == $key) {
            $model = $components['model'];
            $view = $components['view'];
            $controller = $components['controller'];
            break;
        }
    }

    if (isset($model)) {
        $m = new $model();
        $c = new $controller($model);
        $v = new $view($model);
        echo $v->output();
    }
}

?>

<?php include 'views/header.html.php'; ?>

	------

  <h1><?php echo $data; ?></h1>

  -----

<?php include 'views/footer.html.php'; ?>