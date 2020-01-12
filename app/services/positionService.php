<?php

require_once(__DIR__."/../database/connect_DB.php");
include_once(__DIR__."/../classes/operator.php");
include_once(__DIR__."/../classes/worker.php");
include_once(__DIR__."/../classes/log.php");

 /**
  * @package app\services
  * This class provides all position functions.
  *
  * @method 
  */

class positionService {

 /**
  * @var connectDB $db_connection 
  */   
    private $db_connection;

    public function __construct() {
        $this->db_connection = connectDB::getInstance()->getConnection();
    }

  /**
  * update a operator position in a line. 
  * 
  * @param int $line_id
  * @param int $op_id
  * @param int $replace_id
  *
  * @return boolean true if update successfully
  */ 
    public function updateOperatorPosition($line_id, $op_id, $position_val, $replace_id) {
      if ($line_id == NULL || $op_id == NULL || $replace_id == NULL) {
          return false;
      }
      $query = 'UPDATE operator SET position = :position_val, replace_id = :replace_id WHERE op_id = :op_id AND line_id = :line_id';
      $stmt = $this->db_connection->prepare($query);
      $stmt->bindParam(':position_val', $position_val, PDO::PARAM_INT);
      $stmt->bindParam(':replace_id', $replace_id, PDO::PARAM_INT);
      $stmt->bindParam(':line_id', $line_id, PDO::PARAM_INT);
      $stmt->bindParam(':op_id', $op_id, PDO::PARAM_STR);
      $result = $stmt->execute();

      return $result;
    }

    /**
  * update a worker status in worker table. 
  * 
  * @param int $worker_id
  * @param int $status

  * @return boolean true if update successfully
  */ 
    public function updateWorkerStatus($worker_id, $status) {
        if ($worker_id == NULL || $status == NULL) {
            return false;
        }
        $query = 'UPDATE worker SET status = :status WHERE worker_id = :worker_id';
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':worker_id', $worker_id, PDO::PARAM_INT);
        $result = $stmt->execute();
        return $result;
    }

    /**
     * get all fillin workers. 
    * 
    * @return array Workers or false
    */ 
    public function getFillinWorkers() {
        $query = 'SELECT * FROM worker, operator WHERE worker.worker_id = operator.replace_id AND operator.position = 2';
        $stmt = $this->db_connection->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(); 
        if (count($resultSet) != 0) {
            $returnArr = [];
            foreach($resultSet as $worker){
              $newTemp = new Worker(
                $worker["worker_id"],
                $worker["ava"],
                $worker["name"],
                $worker["type"],
                $worker["status"]
              );
              array_push($returnArr, $newTemp);
            }
            return $returnArr;
        }
        return false;
    }


    public function getFillinWorkersNew() {
        $query = 'SELECT * FROM worker, operator, line WHERE operator.line_id = line.line_id AND worker.worker_id = operator.replace_id AND operator.position = 2';
        $stmt = $this->db_connection->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(); 
        if (count($resultSet) != 0) {
            $returnArr = [];
            foreach($resultSet as $worker){
              $temp = array(
                "worker_id" => $worker["worker_id"],
                "ava" => $worker["ava"],
                "name" => $worker["name"],
                "type" => $worker["type"],
                "status" => $worker["status"],
                "op_name" => $worker["op_name"],
                "line_name" => $worker["line_name"]
              );
              array_push($returnArr, $temp);
            }
            return $returnArr;
        }
        return false;
    }

    public function getWorkersByLineID($line_id) {
        if ($line_id == NULL) {
            return false;
        }
        $query = 'SELECT * FROM (SELECT ava as ori_ava, position, worker_id as ori_id, name as ori_name, type as ori_type, status as ori_status, replace_id, op_name, op_id FROM operator, worker WHERE operator.line_id = :line_id AND operator.original_id = worker.worker_id) AS TEMP LEFT JOIN worker ON TEMP.replace_id = worker.worker_id';
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(':line_id', $line_id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) > 0) {
            $arr = [];
            foreach($resultSet as $row) {
                array_push($arr, $row);
            }
            return $arr;
        }
        return false;
    }

    
    public function getWorkersNumByLineId($line_id) {
        if ($line_id == NULL) {
            return false;
        }
        $query = 'SELECT workers_num, COUNT(*) as curr, line.line_id FROM line, operator WHERE line.line_id = :line_id AND line.line_id = operator.line_id AND operator.position != 1';
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(':line_id', $line_id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) > 0) {
            return $resultSet;
        }
        return false;
    }



    public function getLineNameByLineId($line_id) {
        if ($line_id == NULL) {
            return false;
        }
        $query = 'SELECT line_name FROM line WHERE line.line_id = :line_id';
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(':line_id', $line_id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) > 0) {
            return $resultSet[0]['line_name'];
        }
        return false;

    }



    public function getEmptyPosition($line_id) {
        if ($line_id == NULL) {
            return false;
        }
        $query = 'SELECT * FROM operator WHERE operator.line_id = :line_id AND operator.position = 1';
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(':line_id', $line_id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) > 0) {
            $arr = [];

            // $op_id,
            // $op_name,
            // $line_id,
            // $position,
            // $original_id,
            // $replace_id,
            // $skill_id_ref

            foreach($resultSet as $row) {
                $temp = new Operator(
                    $row["op_id"],
                    $row["op_name"],
                    $row["line_id"],
                    $row["position"],
                    $row["original_id"],
                    $row["replace_id"],
                    $row["skill_id_ref_op"]
                );
                array_push($arr, $temp);
            }
            return $arr;
        }
        return false;
    }



    public function getFreeWaterSpiders() {
        $query = 'SELECT * FROM worker, skill WHERE worker.status = 1 AND worker.type = 1 AND skill.worker_id = worker.worker_id';
        $stmt = $this->db_connection->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) > 0) {
            $arr = [];
            foreach($resultSet as $row) {
                array_push($arr, $row);
            }
            return $arr;
        }
        return false;
    }

    public function getFreeWaterSpidersBySkillID($skill_id){
        $query = 'SELECT * FROM worker, skill 
                WHERE worker.status = 1 
                AND worker.type = 1 
                AND skill.worker_id = worker.worker_id
                AND skill.skill_id_ref = :skill_id';
        $stmt = $this->db_connection->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':skill_id', $skill_id, PDO::PARAM_INT);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) > 0) {
            $arr = [];
            foreach($resultSet as $row) {
                array_push($arr, $row);
            }
            return $arr;
        }
        return false;
    }

    public function getAllWaterSpiders() {
        $query = 'SELECT * FROM worker, operator WHERE worker.type = 1 AND operator.replace_id = worker.worker_id';
        $stmt = $this->db_connection->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) > 0) {
            $arr = [];
            foreach($resultSet as $row) {
                array_push($arr, $row);
            }
            return $arr;
        }
        return false;
    }

    public function getUpdatedTimeByName($table_name) {

        $query = 'SELECT UPDATE_TIME, TABLE_SCHEMA, TABLE_NAME
        FROM information_schema.tables
        WHERE TABLE_NAME = :table_name
        ORDER BY UPDATE_TIME DESC, TABLE_SCHEMA, TABLE_NAME';

        $stmt = $this->db_connection->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':table_name', $table_name, PDO::PARAM_STR);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) != 0) {
        print_r($resultSet[0]);
        return $resultSet[0];
        }
        return false;  
    }
    public function getUpdatedTime() {

        $query = 'SELECT UPDATE_TIME, TABLE_SCHEMA, TABLE_NAME
                    FROM information_schema.tables
                    WHERE TABLE_SCHEMA = "adidas"
                    ORDER BY UPDATE_TIME DESC, TABLE_SCHEMA, TABLE_NAME';
        $stmt = $this->db_connection->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) != 0) {
            print_r($resultSet);
            return $resultSet;
        }
        return false;
    }

    public function writeLog($line_id, $message) {
        if ($line_id == NULL || $message == NULL) {
            return false;
        }
        $query = 'INSERT INTO log (line_id, message) VALUES (:line_id, :message)';
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(':line_id', $line_id, PDO::PARAM_INT);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $result = $stmt->execute();
        return $result;
    }


    public function readLog($line_id) {
        if ($line_id == NULL) {
            return false;
        }
        $query = 'SELECT * FROM log WHERE line_id = :line_id';
        $stmt = $this->db_connection->prepare($query);
        $stmt->bindParam(':line_id', $line_id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        if (count($resultSet) != 0) {
            $arr = [];
            foreach($resultSet as $row) {
                $tmp = new Log(
                    $row["log_id"],
                    $row["line_id"],
                    $row["message"],
                    $row["time_created"]
                );
                array_push($arr, $tmp);
            }
            return $arr;
        }
        return false;
    }
}

?>