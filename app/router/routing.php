<?php

require_once __DIR__ . "/../classes/router.php";

/*
* require Controllers
*/

require_once __DIR__ . "/../controllers/LineSuperController.php";
require_once __DIR__ . "/../controllers/ManagerController.php";
require_once __DIR__ . "/../controllers/WaiterController.php";
require_once __DIR__ . "/../controllers/LoginController.php";
require_once __DIR__ . "/../controllers/TVNotificationController.php";

define("ROOT_DIR", "adidas");


Router::GET('/', function(){
    $login = new LoginController();
    $login->render();
});

Router::GET('/line-supervisor', function(){
    $line = new LineSuperController();
    $line->render();
});

Router::GET('/manager', function(){
    $manager = new ManagerController();
    $manager->render();
});

Router::GET('/waiter', function(){
    $waiter = new WaiterController();
    $waiter->render();
});

Router::GET('/tv-notification', function(){
    $waiter = new TVNotificationController();
    $waiter->render();
});

$action = $_SERVER['REQUEST_URI'];
$action = str_replace("adidas/", "", $action);
Router::dispatch($action);
