<?php

require_once __DIR__ . "/../classes/router.php";

/*
* require Controllers
*/

// require_once __DIR__ . "/../controllers/LoginController.php";
// require_once __DIR__ . "/../controllers/HomeController.php";
// require_once __DIR__ . "/../controllers/LandingController.php";
// require_once __DIR__ . "/../controllers/RegisterController.php";
// require_once __DIR__ . "/../controllers/ChooseCVController.php";
// require_once __DIR__ . "/../controllers/EditCVController.php";
// require_once __DIR__ . "/../controllers/MyCVController.php";
// require_once __DIR__ . "/../controllers/PreviewCVController.php";
// require_once __DIR__ . "/../controllers/BrowseCVController.php";
// require_once __DIR__ . "/../controllers/TestdbController.php";
// require_once __DIR__ . "/../controllers/TemplateController.php";
// require_once __DIR__ . "/../controllers/TemplateController2.php";
// require_once __DIR__ . "/../controllers/UpgradeVipController.php";
// require_once __DIR__ . "/../controllers/Error404Controller.php";
// require_once __DIR__ . "/../controllers/FakeController.php";
// require_once __DIR__ . "/../services/authenticationService.php";
// require_once __DIR__ . "/../controllers/SearchCVController.php";
// require_once __DIR__ . "/../services/priviledgeService.php";
require_once __DIR__ . "/../controllers/LineSuperController.php";
require_once __DIR__ . "/../controllers/ManagerController.php";
require_once __DIR__ . "/../controllers/WaiterController.php";

define("ROOT_DIR", "adidas");



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

$action = $_SERVER['REQUEST_URI'];
$action = str_replace("adidas/", "", $action);
Router::dispatch($action);
