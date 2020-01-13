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

        public function arrangeEmptyWorker() {
            $emptyPos = $this->posiService->getEmptyPosition(1);
            
            if($emptyPos == false){
                return;
            }
            
            foreach($emptyPos as $pos) {
                $log_message = "Worker at position " . $pos->op_id . " is absent";
                $this->posiService->writeLog(1, $log_message);

                $result = $this->posiService->getFreeWaterSpidersBySkillID($pos->skill_id_ref);
                if($result != false && count($result) > 0){
                    $top = $result[0];
                    $this->posiService->updateOperatorPosition(1, $pos->op_id, 2, $top["worker_id"]);
                    $this->posiService->updateWorkerStatus($top["worker_id"], 2);
                    $log_message = $top["name"] . " is assigned to position " . $pos->op_id . " line 1";
                    $this->posiService->writeLog(1, $log_message);
                }
                else {
                    $log_message = "No multi-skill worker is available for position " . $pos->op_id . " line 1";
                    $this->posiService->writeLog(1, $log_message);
                }
            }
            return true;
        }

        public function confirmRedToYellow($line_id, $worker_id, $ori_id) {
            $res = $this->posiService->updateOperatorPosition($line_id, $ori_id, 3, $worker_id);
            $msg = "Multi-skill workder " . $_POST["replace_name"] ."has filled in line " . $_POST["line_id"];
            $this->posiService->writeLog(1, $msg);
            return $res;
        }

        // public function isUpdated($table_name, $currentTime) {
        //     $this->posiService->getUpdatedTimeByName($table_name);
        // }

        public function render(){
            $_REQUEST["line_workers"] = $this->getLineWorkers(1);
            $_REQUEST["line_name"] = $this->getLineName(1);
            // $this->arrangeEmptyWorker();
            parent::getView("line-supervisor");
        }

    }
?>