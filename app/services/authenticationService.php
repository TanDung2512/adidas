<?php

require_once(__DIR__."/../database/connect_DB.php");
require_once(__DIR__."/userService.php");
include_once(__DIR__."/../classes/user.php");

 /**
  * @package app\services
  * This class provides all authentication functions.
  *
  * @method null | boolean signin(string $user_mail_in, string $password_in)
  * @method null signout()
  */

class AuthenService {

 /**
  * @var connectDB $db_connection 
  */   
    private $db_connection;
    private $userService;

    public function __construct() {
        $this->db_connection = connectDB::getInstance()->getConnection();
        $this->userService = new UserService();

        // check if session exists
        if (isset($_SESSION['loggedin']) AND $_COOKIE['user_ID'] == $_SESSION['user_ID']) {
            setcookie('user_ID', $_SESSION['user_ID'], time() + TIMEOUT); // to be changed to 3600 
            setcookie('token', $_SESSION['hash_token'], time() + TIMEOUT);
        } else {
            if (isset($_COOKIE['user_ID'])) {

                $cookieToken = getTokenFromCookie($_COOKIE['user_ID']);

                if ($cookieToken == $_COOKIE['token']) {

                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_ID'] = $_COOKIE['user_ID'];
                    $_SESSION['hash_token'] = password_hash($user_ID . $password);    

                    setcookie('user_ID', $_SESSION['user_ID'], time() + TIMEOUT); // to be changed to 3600 
                    setcookie('token', $_SESSION['hash_token'], time() + TIMEOUT);
                }
            }
        }
    }

/**
  * return token from user ID
  * @param string $user_ID
  *
  * @return string $cookie_hash | false
  */  

    public function getTokenFromCookie($user_ID) {
        $user_db = $this->userService->getUserByID($user_ID);
        if ($user_db) {
            $cookie_hash = password_hash($user_db->get("user_ID") . $user_db->get("password"));
            return $cookie_hash;
        } else {
            return false;
        }
        
    }

/**
  * signin function
  * @param string $user_mail_in
  * @param string $password_in
  *
  * @return null | false
  */  

    public function signin($user_mail_in, $password_in) {

        // if no data submitted, return false
        if ($user_mail_in == '' || $password_in == '' || $user_mail_in == null || $password_in == null) {
            return false;
        }

        $query = 'SELECT user_ID, user_mail, password FROM users WHERE user_mail = ?';

        // Prepre SQL to prevent SQL injection
        if ($stmt = $this->db_connection->prepare($query)) {
            $stmt->bind_param('s', $user_mail_in);
            $stmt->execute();

            // Store result to check if email exists in DB
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_ID, $user_mail, $password);
                $stmt->fetch();

                // use password_hash in login file
                // Email exists, check password
                if (password_verify($password_in, $password)) {

                    // add SESSION
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_ID'] = $user_ID;
                    $_SESSION['hash_token'] = password_hash($user_ID . $password);
                    
                    // time to be changed to 3600; 10 for testing
                    setcookie("user_ID", $_SESSION['user_ID'], time() + 10);
                    setcookie("token", $_SESSION['hash_token'], time() + 10);
                    // header("location: "); echo for testing
                    echo "Logged in";
                } else {
                    echo "Wrong password";
                }
            } else {
                echo "Wrong email";
            }
            $stmt->close();
        }
    }

/**
  * logout function
  * 
  * @return null
  */      

    public function signout() {
        session_start(); 
        session_unset();
        session_destroy();
        setcookie("user", "", time() - 3600);
        // header("location": ...);

        return null;
    }

/**
  * sign up function
  * 
  * @param string $mail_in
  * @param string $pw_in
  * @param string $pw_confirm_in
  *
  * @return null | false
  */    

    public function signup($mail_in, $pw_in, $pw_confirm_in) {
        if ($mail_in == null || $pw_in == null || $pw_confirm_in == null) {
            return false;
        }

        if ($pw_in != $pw_confirm_in) {
            echo "Pw doesnt match pw confirm";
            return false;
        }

        // default role
        $user_role = "user";

        $this->userService->createUser($mail_in, $pw_in, $user_role);
        $this->signin($mail_in, $pw_in);
    }
}

?>