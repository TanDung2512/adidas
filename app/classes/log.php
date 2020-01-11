<?php 


/**
 * @package app\classes
 * Describe Log.
 * 
 */

 class Log{
   /** @var int $log_id primary key*/
   public $log_id;

   /** @var int $line_id */
   public $line_id;

   /** @var string $message */
   public $message;

   /** @var string $time_created */
   public $time_created;

   public function __construct(
     $log_id,
     $line_id,
     $message,
     $time_created
   ){
    $this->log_id = $log_id;
    $this->line_id = $line_id;
    $this->message = $message;
    $this->time_created = $time_created;
   }

   public function get_json(){
    $json = array(
      "log_id" => $this->log_id,
      "line_id" => $this->line_id,
      "message" => $this->message,
      "time_created" => $this->time_created,
  );

  return json_encode($json);
  }
 }
?>