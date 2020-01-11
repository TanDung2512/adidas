<?php
    require_once __DIR__."/Controller.php";
    class TVNotificationController extends Controller{

        public function __construct(){
            parent::__construct();
        }
        
        public function render(){
            parent::getView("tv-notification");
        }

    }
?>