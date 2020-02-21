<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root.'/'.str_replace('\\', '/', $class).'.php';
    if (is_readable($file)) {
        require $root.'/'.str_replace('\\', '/', $class).'.php';
    }
});
// error_reporting(E_ALL);
// set_error_handler('Core\Error::errorHandler');
// set_exception_handler('Core\Error::exceptionHandler');


$router = new Core\Router();
$router->add('/{controller}',['action' => 'index']);
//$router->add('',['controller' => 'home', 'action' => 'index']);
$router->add('{controller}',['action' =>  'index']);
$router->add('service/{controller}',['namespace' => 'service','action' =>  'index']);
// $router->add('Admin/cms/{controller}',['namespace' => 'Admin\cms', 'action' => 'index']);
// $router->add('Admin/cms/{controller}/{action}',['namespace' => 'Admin\cms']);
// $router->add('Admin/{controller}',['namespace' => 'Admin','action' => 'index']);
$router->add('service/{controller}/{action}',['namespace' => 'service']);
$router->add('{controller}/{action}');
//$router->add('admin/{action}',['controller'=>'admin']);



$router->dispatch($_SERVER['QUERY_STRING']);
?>