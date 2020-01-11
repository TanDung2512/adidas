<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/positionService.php";

    class ManagerController extends Controller{

        private $posiService;

        public function __construct(){
            parent::__construct();
            $this->posiService = new positionService();
        }

        public function getCurrentEmp() {
            
            $_REQUEST["manager"] = $this->posiService->getWorkersNumByLineId(1);
        }
        public function render(){
            $this->getCurrentEmp();
            parent::getView("manager");
        }

    }
?>