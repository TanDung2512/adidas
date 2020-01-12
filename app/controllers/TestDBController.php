<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/positionService.php";

    class TestDBController extends Controller{
        private $position;

        public function __construct(){
            parent::__construct();
            $this->position = new positionService();
        }

        public function render(){
            parent::getView("testDB");
            // print_r($this->position->getFillinWorkers());
            // $this->position->updateWorkerStatus(3, 2);
            // echo $this->position->updateOperatorPosition(1, 2, 2, 6);
            // print_r($this->position->getWorkersByLineID(1));
            // echo "<br>";
            // print_r($this->position->getEmptyPosition(1));
            // print_r($this->position->getFreeWaterSpiders());
            // print_r($this->position->writeLog(1, "huhuuhhuhuhuhuhuhu"));
            // print_r($this->position->readLog(1));
            // print_r($this->position->getWorkersNumByLineId(1));
            print_r($this->position->getUpdatedTime());
            print_r($this->position->getUpdatedTimeByName("operator"));
        }
    }
?>