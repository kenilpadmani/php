<?php

//echo 'Requested URl = "' .$_SERVER['QUERY_STRING']. '"'

require '../Core/Router.php';

$router = new Router();

echo get_class($router);
//add routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}');


//display routing table
echo "<pre>";
print_r($router->getRoutes(), true);
echo "</pre>";

//match requted route
// $url = $_SERVER['QUERY_STRING'];

// if($router->match($url)) {
//     echo "<pre>";
//     var_dump($router->getParams());
//     echo "</pre>";
// } else {
//     echo "Not route found for url".$url;
// }
?>