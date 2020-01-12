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

Router::GET('/manager/raw-data', function(){
    $manager = new ManagerController();
    echo json_encode($manager->getCurrentEmp());
});

Router::GET('/waiting-list', function(){
    $waiter = new WaiterController();
    $waiter->render();
});

Router::GET('/waiting-list/raw-data', function(){
    $waiter = new WaiterController();
    echo json_encode($waiter->getWaterSpiders());
});

Router::GET('/tv-notification', function(){
    $waiter = new TVNotificationController();
    $waiter->render();
});

Router::GET('/tv-notification/raw-data', function(){
    $waiter = new TVNotificationController();
    echo json_encode($waiter->getTV());
});

Router::GET('/noti', function(){
    $noti = new NotificationController();
    $noti->render();
});

Router::GET('/noti/raw-data', function (){
    $noti = new NotificationController();
    echo json_encode($noti->getLog(1));
});

// Router::GET('/line-supervisor/noti', function(){
    // giong cai o trennnn
// });

// Router::GET('/line-supervisor/line-workers', function(){
//     $lineSuper = new LineSuperController();
//     $lineSuper->render();
// });

Router::POST('/line-supervisor/confirm', function(){
    $lineSuper = new LineSuperController();
    echo $lineSuper->confirmRedToYellow($_POST["line_id"], $_POST["ori_id"], $_POST["worker_id"]);
});

Router::GET('/tv-notification/assign-workers', function(){
    
});



$action = $_SERVER['REQUEST_URI'];
$action = str_replace("adidas/", "", $action);
Router::dispatch($action);
