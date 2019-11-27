<?php 

/**
 * User class
 */
class User {
   
  /** @var int $_user_ID */
  private $_user_ID;

  /** @var string $_user_mail*/
  private $_user_mail;

  /** @var string $_password*/
  private $_password;

  /** @var string $_avatar*/
  private $_avatar;

  /** @var string $_role*/
  private $_role;

  /** @var string $_gender*/
  private $_gender;

  /** @var string $_birthday*/
  private $_birthday;

/**
  * Construction of a user. 
  * @param int $id
  * @param string $mail 
  * @param string $pw
  * @param string $ava
  * @param string $role
  * @param string $gender
  * @param string $birthday
  *  coding style
  * @return instance
  */
  public function __construct($id = null, $mail = null, $pw = null, $ava = null, $role = null, $gender = null, $birthday = null) {
    $this->_user_ID = $id;
    $this->_user_mail = $mail;
    $this->_password = $pw;
    $this->_avatar = $ava;
    $this->_role = $role;
    $this->_gender = $gender;
    $this->_birthday = $birthday;
  }

/**
  * get attribute of user 
  * @param string $name
  *
  * @return attribute
  */
  public function get($name) {
    $name = "_".$name;
    if (property_exists("User", $name)) {
      return $this->name;
    } else {
      return null;
    }
  }
  
/**
  * set attribute of user
  * @param string $name 
  * @param string $value
  *
  * @return boolean
  */  
  public function set($name, $value) {
    $name = "_".$name;
    if (property_exists("User", $name) and $value != null) {
      $this->name = $value;
      return true;
    } else {
      return false;
    }
  }

/**
  * Return json type of user. 
  * @param 
  *
  * @return json user
  */
  public function get_json() {
    // json_encode(get_object_vars($user));

    $json = array(
      'user_ID' => $this->user_ID,
      'user_mail' => $this->user_mail,
      'password' => $this->password,
      'avatar' => $this->avatar,
      'role' => $this->role,
      'gender' => $this->gender,
      'birthday' => $this->birthday
    );

  return json_encode($json);
  }
}
?>