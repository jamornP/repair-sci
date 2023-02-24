<?php

namespace App\Model\Repair;

use App\Database\DbRepair;


class Combobox extends DbRepair
{
    public function getBuilding() {
        $sql = "SELECT * FROM tb_building";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getBuildingById($id) {
        $sql = "SELECT * FROM tb_building WHERE b_id={$id}";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getType() {
        $sql = "SELECT * FROM tb_e_type";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getNature() {
        $sql = "SELECT * FROM tb_nature";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getDataStatus($table) {
        $sql = "SELECT * FROM {$table}";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getDataStatusById($table,$id) {
        switch ($table){
            case "tb_e_status":
                $sql = "SELECT * FROM {$table} WHERE es_id = {$id}";
            break;
            case "tb_a_status":
                $sql = "SELECT * FROM {$table} WHERE as_id = {$id}";
            break;
            case "tb_c_status":
                $sql = "SELECT * FROM {$table} WHERE cs_id = {$id}";
            break;
            case "tb_r_status":
                $sql = "SELECT * FROM {$table} WHERE rs_id = {$id}";
            break;
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getDataStatusByRepair($table,$id) {
        $sql = "SELECT * FROM {$table} WHERE r_id = {$id} ORDER BY ds_num DESC";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getDataStatusByRepair2($table,$id) {
        $sql = "SELECT * FROM {$table} WHERE r_id = {$id} ORDER BY ds_num";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    // เลือกสถานะงานซ่อมจากขั้นตอนการดำเนินงาน
    public function getStatusManage($table,$s_id) {
        switch($table){
            case "tb_e_status" :
                switch ($s_id) {
                    case "9":
                        $sql = "SELECT * FROM {$table} WHERE es_id > 4";
                      break;
                    case "10":
                        $sql = "SELECT * FROM {$table} WHERE es_id > 4";
                      break;
                    default:
                        $sql = "SELECT * FROM {$table} WHERE es_id > {$s_id}";
                }
            break;
            case "tb_a_status" :
                switch ($s_id) {
                    case "9":
                        $sql = "SELECT * FROM {$table} WHERE as_id > 4";
                      break;
                    case "10":
                        $sql = "SELECT * FROM {$table} WHERE as_id > 4";
                      break;
                    default:
                        $sql = "SELECT * FROM {$table} WHERE as_id > ".$s_id;
                }
            break;
            case "tb_c_status" :
                switch ($s_id) {
                    case "1":
                        $sql = "SELECT * FROM {$table} WHERE cs_id > {$s_id}";
                        break;
                    case "2":
                        $sql = "SELECT * FROM {$table} WHERE cs_id > {$s_id}";
                        break;
                    case "3":
                        $sql = "SELECT * FROM {$table} WHERE cs_id > {$s_id}";
                        break;
                    case "4":
                        $sql = "SELECT * FROM {$table} WHERE cs_id > 5";
                      break;
                    case "5":
                        $sql = "SELECT * FROM {$table} WHERE cs_id > 2";
                      break;
                    case "6":
                        $sql = "SELECT * FROM {$table} WHERE cs_id > 2";
                      break;
                    case "7":
                        $sql = "SELECT * FROM {$table} WHERE cs_id > 2";
                      break;
                    default:
                        $sql = "SELECT * FROM {$table} WHERE cs_id = ".$s_id;
                }
            break;
            case "tb_r_status" :
                switch ($s_id) {
                    case "1":
                        $sql = "SELECT * FROM {$table} WHERE rs_id > {$s_id}";
                        break;
                    case "2":
                        $sql = "SELECT * FROM {$table} WHERE rs_id > {$s_id}";
                        break;
                    case "3":
                        $sql = "SELECT * FROM {$table} WHERE rs_id > {$s_id}";
                        break;
                    case "4":
                        $sql = "SELECT * FROM {$table} WHERE rs_id > 5";
                      break;
                    case "5":
                        $sql = "SELECT * FROM {$table} WHERE rs_id > 2";
                      break;
                    case "6":
                        $sql = "SELECT * FROM {$table} WHERE rs_id > 2";
                      break;
                    case "7":
                        $sql = "SELECT * FROM {$table} WHERE rs_id > 2";
                      break;
                    default:
                        $sql = "SELECT * FROM {$table} WHERE rs_id = ".$s_id;
                }
            break;
            
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getStatus($table) {
        $sql = "SELECT * FROM {$table} ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
}