<?php

require_once(__DIR__."/../database/connect_DB.php");
include_once(__DIR__."/../classes/user.php");

 /**
  * @package app\services
  * This class provides all authentication functions.
  *
  * @method null | boolean signin(string $user_mail_in, string $password_in)
  * @method null signout()
  */

class positionService {

 /**
  * @var connectDB $db_connection 
  */   
    private $db_connection;

    public function __construct() {
        $this->db_connection = connectDB::getInstance()->getConnection();
    }

    public function updatePosition() {

    }

    public function updateState() {

    }

    public function getListOfWaiter() {

    }

    public function getLineByID() {

    }
}

?>