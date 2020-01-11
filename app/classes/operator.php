<?php 


/**
 * @package app\classes
 * Describe Operator.
 * 
 */

 class Operator{
   /** @var int $op_id primary key*/
   public $op_id;

   /** @var string $op_name*/
   public $op_name;

   /** @var int $line_id */
   public $line_id;

   /** @var int $position */
   public $position;

   /** @var int $original_id */
   public $original_id;

   /** @var int $replace_id */
   public $replace_id;

   /** @var int $skill_id_ref */
   public $skill_id_ref;

   public function __construct(
     $op_id,
     $op_name,
     $line_id,
     $position,
     $original_id,
     $replace_id,
     $skill_id_ref
   ){
    $this->op_id = $op_id;
    $this->op_name = $op_name;
    $this->line_id = $line_id;
    $this->position = $position;
    $this->original_id = $original_id;
    $this->replace_id = $replace_id;
    $this->skill_id_ref = $skill_id_ref;
   }

   public function get_json(){
    $json = array(
      "op_id" => $this->op_id,
      "op_name" => $this->op_name,
      "line_id" => $this->line_id,
      "position" => $this->position,
      "original_id" => $this->original_id,
      "replace_id" => $this->replace_id,
      "skill_id_ref" => $this->skill_id_ref
  );

  return json_encode($json);
  }
 }
?>