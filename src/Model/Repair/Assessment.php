<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Assessment extends DbRepair {

    public function getAssByGroup($ass_group) {
        $sql = "
        SELECT *
        FROM tb_assessment
        WHERE ass_group = '".$ass_group."'
        ";
          
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
    public function getAssGroup() {
        $sql = "
        SELECT ass_group
        FROM tb_assessment
        GROUP BY ass_group
        ORDER BY ass_id
        ";
          
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
    public function addAssessment($data) {
        $sql = "
            INSERT INTO `tb_ass_data` (
                `assd_id`, 
                `r_id`, 
                `type`, 
                `a1`, 
                `a2`,
                `a3`, 
                `a4`, 
                `a5`, 
                `a6`, 
                `a7`, 
                `a8`,
                `suggestion`, 
                `s_id`
            ) VALUES (
                NULL, 
                :r_id, 
                :type, 
                :a1, 
                :a2,
                :a3, 
                :a4, 
                :a5, 
                :a6, 
                :a7, 
                :a8,
                :suggestion, 
                :s_id
            );
        ";
            
        // $stmt = $this->pdo->query($sql);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();  
        // return $sql;  
    }
    public function countAssByRepairType($r_id,$type) {
        $sql ="
            SELECT * 
            FROM tb_ass_data
            WHERE r_id = ".$r_id." AND type ='".$type."'
        ";
        $stmt = $this->pdo->query($sql);
        $row = $stmt->rowCount();
        return $row;
    }
    public function getAssByType($type) {
        $sql = "
        SELECT *
        FROM tb_ass_data
        WHERE type = '".$type."'
        ";
          
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
}
?>