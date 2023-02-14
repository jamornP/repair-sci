<?php

namespace App\Model\Repair;

use App\Database\DbRepair;


class Notifi extends DbRepair
{
    public function getRowsRepairByTable($table) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE es_id = 1";
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table." WHERE as_id = 1";
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table." WHERE cs_id = 1";
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table." WHERE rs_id = 1";
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function getDataRepairByTable($table) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT r.*, s.s_name_TH FROM ".$table." as r LEFT JOIN tb_staff as s ON s.s_id = r.s_id WHERE es_id = 1";
            break;
            case "tb_a_repair":
                $sql ="SELECT r.*, s.s_name_TH FROM ".$table."  as r LEFT JOIN tb_staff as s ON s.s_id = r.s_id WHERE as_id = 1";
            break;
            case "tb_c_repair":
                $sql ="SELECT r.*, s.s_name_TH FROM ".$table."  as r LEFT JOIN tb_staff as s ON s.s_id = r.s_id WHERE cs_id = 1";
            break;
            case "tb_r_repair":
                $sql ="SELECT r.*, s.s_name_TH FROM ".$table."  as r LEFT JOIN tb_staff as s ON s.s_id = r.s_id WHERE rs_id = 1";
            break;
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return $data;
    }
}
?>