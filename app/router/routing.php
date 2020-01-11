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
require_once __DIR__ . "/../controllers/NotiController.php";
require_once __DIR__ . "/../controllers/TestDBController.php";

require_once __DIR__ . "/../services/positionService.php";

define("ROOT_DIR", "adidas");


Router::GET('/', function(){
    $login = new LoginController();
    $login->render();
});

Router::GET('/test-db', function(){
    $testDB = new TestDBController();
    $testDB->render();
});

Router::GET('/line-supervisor', function(){
    $line = new LineSuperController();
    $line->render();
});

Router::GET('/manager', function(){
    $manager = new ManagerController();
    $manager->render();
});

Router::GET('/waiting-list', function(){
    $waiter = new WaiterController();
    $waiter->render();
});

Router::GET('/tv-notification', function(){
    $waiter = new TVNotificationController();
    $waiter->render();
});


Router::GET('/noti', function(){
    $noti = new NotificationController();
    $noti->render();
});

// Router::GET('/line-supervisor/noti', function(){
    // giong cai o trennnn
// });

// Router::GET('/line-supervisor/line-workers', function(){
//     $lineSuper = new LineSuperController();
//     $lineSuper->render();
// });

Router::POST('/line-supervisor/confirm', function(){
    
});

Router::GET('/tv-notification/assign-workers', function(){
    
});



$action = $_SERVER['REQUEST_URI'];
$action = str_replace("adidas/", "", $action);
Router::dispatch($action);
