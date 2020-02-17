<?php

//echo 'Requested URl = "' .$_SERVER['QUERY_STRING']. '"'
//require for routing
//require '../Core/Router.php';
require_once dirname(__DIR__).'/vendor/autoload.php';
//Twing_Autoloader :: register();
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root.'/'.str_replace('\\', '/', $class).'.php';
    if (is_readable($file)) {
        require $root.'/'.str_replace('\\', '/', $class).'.php';
    }
});
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
//require for controller
//require '../App/controller/Posts.php';

$router = new Core\Router();

//echo get_class($router);
//add routes
//$router->add('{controller}/{id}/{action}');
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}',['namespace' => 'Admin']);
//$router->add('admin/{controller}/{action}');


//display routing table
// echo "<pre>";
// print_r($router->getRoutes(), true);
// echo "</pre>";

//match requted route
// $url = $_SERVER['QUERY_STRING'];

// if($router->match($url)) {
//     echo "<pre>";
//     var_dump($router->getParams());
//     echo "</pre>";
// } else {
//     echo "Not route found for url".$url;
// }

$router->dispatch($_SERVER['QUERY_STRING']);
?>