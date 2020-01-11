<?php 


/**
 * @package app\classes
 * Describe Worker.
 * 
 */

 class Worker{
   /** @var int $worker_id primary key*/
   public $worker_id;

   /** @var string $ava */
   public $ava;

   /** @var string $name */
   public $name;

   /** @var string $skill_id */
   public $skill_id;

   /** @var int $type */
   public $type;

   public function __construct(
     $worker_id,
     $ava,
     $name,
     $skill_id,
     $type
   ){
    $this->worker_id = $worker_id;
    $this->ava = $ava;
    $this->name = $name;
    $this->skill_id = $skill_id;
    $this->type = $type;
   }

   public function get_json(){
    $json = array(
      "worker_id" => $this->worker_id,
      "ava" => $this->ava,
      "name" => $this->name,
      "skill_id" => $this->skill_id,
      "type" => $this->type,
  );

  return json_encode($json);
  }
 }
?>