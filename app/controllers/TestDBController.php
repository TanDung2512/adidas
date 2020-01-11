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
            print_r($this->position->getListOfWaiter());
            parent::getView("testDB");
            
        }
    }
?>