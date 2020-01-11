<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/positionService.php";

    class WaiterController extends Controller{

        private $posiService;

        public function __construct(){
            parent::__construct();
            $this->posiService = new positionService();
        }

        public function getWaterSpiders() {
            return $this->posiService->getAllWaterSpiders();
        }

        public function render(){
            $_REQUEST["water_spiders"] = $this->getWaterSpiders();
            parent::getView("waiter");
        }

    }
?>