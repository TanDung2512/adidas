<?php
    require_once __DIR__."/Controller.php";
    class ManagerController extends Controller{

        public function __construct(){
            parent::__construct();
        }

        public function render(){
            parent::getView("manager");
        }

    }
?>