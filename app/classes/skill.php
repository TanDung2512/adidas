<?php 


/**
 * @package app\classes
 * Describe Skill.
 * 
 */

 class Skill{
   /** @var int $worker_skill_id primary key*/
   public $worker_skill_id;

   /** @var string $skill_name */
   public $skill_name;

   /** @var int $worker_id */
   public $worker_id;

   public function __construct(
     $worker_skill_id,
     $skill_name,
     $worker_id
   ){
    $this->worker_skill_id = $worker_skill_id;
    $this->skill_name = $skill_name;
    $this->worker_id = $worker_id;
   }

   public function get_json(){
    $json = array(
      "worker_skill_id" => $this->worker_skill_id,
      "skill_name" => $this->skill_name,
      "worker_id" => $this->worker_id
  );

  return json_encode($json);
  }
 }
?>