<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/positionService.php";

    class NotificationController extends Controller{
        private $posiService;

        public function __construct(){
            parent::__construct();
            $this->posiService = new positionService();
        }
        
        public function getLog($line_id) {
            $_REQUEST["log"] = $this->posiService->readLog($line_id);
        }
        public function render(){
            $this->getLog(1);
            parent::getView("noti");
        }

    }
?>