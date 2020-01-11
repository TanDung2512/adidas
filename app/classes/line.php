<?php 

/**
 * Line class
 */
class Line {
   
  /** @var int $line_id */
  private $line_id;

  /** @var int $workers_num*/
  private $workers_num;

  /** @var int $supervisor_id*/
  private $supervisor_id;

  /** @var string $line_name*/
  private $line_name;

/**
  * Construction of a line. 
  * @param int $line_id
  * @param int $workers_num 
  * @param int $supervisor_id
  * @param string $line_name
  * @return instance
  */
  public function __construct(
      $line_id = null, 
      $workers_num = null, 
      $supervisor_id = null,
      $line_name = null,
    ) {
    $this->line_id = $line_id;
    $this->workers_num = $workers_num;
    $this->supervisor_id = $supervisor_id;
    $this->line_name = $line_name;
  }

/**
  * get attribute of user 
  * @param string $name
  *
  * @return attribute
  */
  public function get($name_in) {
    if (property_exists("Line", $name_in) {
      return $this->$name_in;
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
    if (property_exists("Line", $name) and $value != null) {
      $this->name = $value;
      return true;
    } else {
      return false;
    }
  }

/**
  * Return json type of line. 
  * @param 
  *
  * @return json line
  */
  public function get_json() {
    // json_encode(get_object_vars($line));

    $json = array(
      'line_id' => $this->line_id,
      'workers_num' => $this->workers_num,
      'supervisor_id' => $this->supervisor_id,
      'line_name' => $this->line_name
    );

  return json_encode($json);
  }
}
?>