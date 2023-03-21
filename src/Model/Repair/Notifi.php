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
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table." WHERE ls_id = 1";
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
            case "tb_l_repair":
                $sql ="SELECT r.*, s.s_name_TH FROM ".$table."  as r LEFT JOIN tb_staff as s ON s.s_id = r.s_id WHERE ls_id = 1";
            break;
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return $data;
    }
    public function countStatus($year,$table,$s_id) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE er_year_term = '".$year."' AND es_id = '".$s_id."'";
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table."  WHERE ar_year_term = '".$year."' AND as_id = '".$s_id."'";
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table."  WHERE cr_year_term = '".$year."' AND cs_id = '".$s_id."'";
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table."  WHERE rr_year_term = '".$year."' AND rs_id = '".$s_id."'";
            break;
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table."  WHERE lr_year_term = '".$year."' AND ls_id = '".$s_id."'";
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function countStatusm($year,$table,$s_id,$s) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE er_year_term = '".$year."' AND es_id = '".$s_id."' AND (date_add {$s})";
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table."  WHERE ar_year_term = '".$year."' AND as_id = '".$s_id."' AND (date_add {$s})";
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table."  WHERE cr_year_term = '".$year."' AND cs_id = '".$s_id."' AND (date_add {$s})";
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table."  WHERE rr_year_term = '".$year."' AND rs_id = '".$s_id."' AND (date_add {$s})";
            break;
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table."  WHERE lr_year_term = '".$year."' AND ls_id = '".$s_id."' AND (date_add {$s})";
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function countStatusR($year,$table,$t_id,$s_id,$sqlD) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE (er_year_term = '".$year."') AND (et_id = '{$t_id}') AND (es_id = '".$s_id."') AND {$sqlD}";
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table."  WHERE (ar_year_term = '".$year."') AND (as_id = '".$s_id."') AND {$sqlD}";
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table."  WHERE (cr_year_term = '".$year."') AND (cs_id = '".$s_id."') AND {$sqlD}";
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table."  WHERE (rr_year_term = '".$year."') AND (rs_id = '".$s_id."') AND {$sqlD}";
            break;
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table."  WHERE (lr_year_term = '".$year."') AND (ls_id = '".$s_id."') AND {$sqlD}";
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function countAll($year,$table) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE er_year_term = '".$year."'" ;
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table."  WHERE ar_year_term = '".$year."'" ;
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table."  WHERE cr_year_term = '".$year."'" ;
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table."  WHERE rr_year_term = '".$year."'" ;
            break;
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table."  WHERE lr_year_term = '".$year."'" ;
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function countAllm($year,$table,$s) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE er_year_term = '".$year."' AND (date_add {$s})" ;
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table."  WHERE ar_year_term = '".$year."' AND (date_add {$s})" ;
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table."  WHERE cr_year_term = '".$year."' AND (date_add {$s})" ;
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table."  WHERE rr_year_term = '".$year."' AND (date_add {$s})" ;
            break;
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table."  WHERE lr_year_term = '".$year."' AND (date_add {$s})" ;
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function countNoSuccess($year,$table) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE er_year_term = '".$year."' AND es_id < 8";
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table."  WHERE ar_year_term = '".$year."' AND as_id < 8";
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table."  WHERE cr_year_term = '".$year."' AND (cs_id < 8 AND (cs_id <> 6 AND cs_id <> 7))";
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table."  WHERE rr_year_term = '".$year."' AND (rs_id < 8 AND (rs_id <> 6 AND rs_id <> 7))";
            break;
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table."  WHERE lr_year_term = '".$year."' AND (ls_id < 8 AND (ls_id <> 6 AND ls_id <> 7))";
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }
    public function countNoSuccessm($year,$table,$s) {
        switch ($table){
            case "tb_e_repair":
                $sql ="SELECT * FROM ".$table." WHERE er_year_term = '".$year."' AND es_id < 8  AND (date_add {$s})";
            break;
            case "tb_a_repair":
                $sql ="SELECT * FROM ".$table."  WHERE ar_year_term = '".$year."' AND as_id < 8  AND (date_add {$s})";
            break;
            case "tb_c_repair":
                $sql ="SELECT * FROM ".$table."  WHERE cr_year_term = '".$year."' AND (cs_id < 8 AND (cs_id <> 6 AND cs_id <> 7))  AND (date_add {$s})";
            break;
            case "tb_r_repair":
                $sql ="SELECT * FROM ".$table."  WHERE rr_year_term = '".$year."' AND (rs_id < 8 AND (rs_id <> 6 AND rs_id <> 7))  AND (date_add {$s})";
            break;
            case "tb_l_repair":
                $sql ="SELECT * FROM ".$table."  WHERE lr_year_term = '".$year."' AND (ls_id < 8 AND (ls_id <> 6 AND ls_id <> 7))  AND (date_add {$s})";
            break;
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $row;
    }

}
?>