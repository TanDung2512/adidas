<?php 


/**
 * @package app\classes
 * Describe Skill.
 * 
 */

 class Skill{
   /** @var int $worker_skill_id primary key*/
   public $worker_skill_id;

   /** @var int $skill_id_ref */
   public $skill_id_ref;

   /** @var int $worker_id */
   public $worker_id;

   public function __construct(
     $worker_skill_id,
     $skill_id_ref,
     $worker_id
   ){
    $this->worker_skill_id = $worker_skill_id;
    $this->skill_id_ref = $skill_id_ref;
    $this->worker_id = $worker_id;
   }

   public function get_json(){
    $json = array(
      "worker_skill_id" => $this->worker_skill_id,
      "skill_id_ref" => $this->skill_id_ref,
      "worker_id" => $this->worker_id
  );

  return json_encode($json);
  }
 }
?>