<?php
include 'components/Db.php';
include 'Controllers/Home.php';
include 'Controllers/Rent.php';
include 'Controllers/Manage.php';
include 'Controllers/Register.php';
include 'Controllers/Cart.php';
include 'Controllers/Profile.php';
include 'Helpers/Validation.php';
include 'Helpers/Autorization.php';
include 'DAO/CategoryDAO.php';
include 'DAO/OrderDAO.php';
include 'DAO/ProductDAO.php';
include 'DAO/UserDAO.php';

if (!session_id()) {
    session_start();
}
$route = $_SERVER['REQUEST_URI'];
$route = str_replace("/index.php" , '',$route);
$route = str_replace("?XDEBUG_SESSION_START=netbeans-xdebug" , '',$route);
if(!$route || $route == '/'){
    $controller = new Home();
    call_user_func_array(array($controller, 'Index'), array());
}else{
    $segments = trim($route, '/');
    $segments = explode('/', $segments);
    $controller = array_shift($segments);
    $action = array_shift($segments);
    $parameters = $segments;
    $controllerObject = new $controller;
    call_user_func_array(array($controllerObject, $action), $parameters);
}
//$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
?>