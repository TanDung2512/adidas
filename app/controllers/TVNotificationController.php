<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/positionService.php";

    class TVNotificationController extends Controller{
        private $posiService;

        public function __construct(){
            parent::__construct();
            $this->posiService = new positionService();
        }

        public function getTV() {
            return $this->posiService->getFillinWorkersNew();
        }
        
        public function render(){
            $_REQUEST["tv_noti"] = $this->getTV();
            parent::getView("tv-notification");
        }

    }
?>