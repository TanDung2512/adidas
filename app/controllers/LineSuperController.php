<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/positionService.php";

    class LineSuperController extends Controller{

        private $posiService;

        public function __construct(){
            parent::__construct();
            $this->posiService = new positionService();
        }

        public function getLineWorkers($line_id) {
            return $this->posiService->getWorkersByLineID($line_id);
        }

        public function getLineName($line_id) {
            return $this->posiService->getLineNameByLineId($line_id);
        }

        public function render(){
            $_REQUEST["line_workers"] = $this->getLineWorkers(1);
            $_REQUEST["line_name"] = $this->getLineName(1);
            parent::getView("line-supervisor");
        }

    }
?>