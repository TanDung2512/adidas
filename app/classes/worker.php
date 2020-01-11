<?php 


/**
 * @package app\classes
 * Describe Worker.
 * 
 */

 class Worker{

  /** @var string $ava */
  public $ava;

   /** @var int $worker_id primary key*/
   public $worker_id;

   /** @var string $name */
   public $name;

   /** @var string $type */
   public $type;

   /** @var int $status */
   public $status;

   public function __construct(
    $ava,
     $worker_id,
     $name,
     $type,
     $status
   ){
    $this->worker_id = $worker_id;
    $this->ava = $ava;
    $this->name = $name;
    $this->type = $type;
    $this->status = $status;
   }

   public function get_json(){
    $json = array(
      "ava" => $this->ava,
      "worker_id" => $this->worker_id,
      "name" => $this->name,
      "type" => $this->type,
      "status" => $this->status,
  );

  return json_encode($json);
  }
 }
?>