<?php 


/**
 * @package app\classes
 * Describe Operator.
 * 
 */

 class Operator{
   /** @var int $op_id primary key*/
   public $op_id;

   /** @var int $line_id */
   public $line_id;

   /** @var int $position */
   public $position;

   public function __construct(
     $op_id,
     $line_id,
     $position
   ){
    $this->op_id = $op_id;
    $this->line_id = $line_id;
    $this->position = $position;
   }

   public function get_json(){
    $json = array(
      "op_id" => $this->op_id,
      "line_id" => $this->line_id
      "position" => $this->position,
  );

  return json_encode($json);
  }
 }
?>