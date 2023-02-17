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
        $sql = "SELECT * FROM {$table} WHERE es_id = {$id}";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
}