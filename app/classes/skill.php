<?php 


/**
 * @package app\classes
 * Describe Skill.
 * 
 */

 class Skill{
   /** @var int $skill_id primary key*/
   public $skill_id;

   /** @var string $skill_name */
   public $skill_name;

   public function __construct(
     $skill_id,
     $skill_name,
   ){
    $this->skill_id = $skill_id;
    $this->skill_name = $skill_name;
   }

   public function get_json(){
    $json = array(
      "skill_id" => $this->skill_id,
      "skill_name" => $this->skill_name,
  );

  return json_encode($json);
  }
 }
?>