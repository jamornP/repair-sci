<?php

namespace App\Model\Repair;

use App\Database\DbRepair;


class Repair extends DbRepair
{
    public function getAllRepair($year,$table) {
        switch ($table){
            
            case "tb_e_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,t.et_name,s.es_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_type as t ON t.et_id = r.et_id
                LEFT JOIN tb_e_status as s ON s.es_id = r.es_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.er_year_term = '".$year."'
                ";
            break;
            case "tb_a_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.es_name,n.en_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_status as s ON s.es_id = r.es_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.ar_year_term = '".$year."'
                ";
            break;
            case "tb_c_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.es_name,n.en_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_status as s ON s.es_id = r.es_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.cr_year_term = '".$year."'
                ";
            break;
            case "tb_r_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.es_name,n.en_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_e_status as s ON s.es_id = r.es_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.rr_year_term = '".$year."'
                ";
            break;
       
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
    public function addRepair($data,$table) {
        switch ($table){
            case "tb_e_repair" :
                $sql = "
                    INSERT INTO {$table} (     
                        er_year_term,
                        date_add,
                        s_id,
                        er_tel,
                        er_room,
                        er_floor,
                        b_id,
                        et_id,
                        er_remark,
                        es_id,
                        n_id
                    ) VALUES (
                        :er_year_term,
                        :date_add,
                        :s_id,
                        :er_tel,
                        :er_room,
                        :er_floor,
                        :b_id,
                        :et_id,
                        :er_remark,
                        :es_id,
                        :n_id
                    )
                ";
            break;
            case "tb_a_repair" :
                $sql = "
                    INSERT INTO {$table} (     
                        ar_year_term,
                        date_add,
                        s_id,
                        ar_tel,
                        ar_room,
                        ar_floor,
                        b_id,
                        ar_remark,
                        as_id,
                        n_id
                    ) VALUES (
                        :ar_year_term,
                        :date_add,
                        :s_id,
                        :ar_tel,
                        :ar_room,
                        :ar_floor,
                        :b_id,
                        :ar_remark,
                        :as_id,
                        :n_id
                    )
                ";
            break;
            case "tb_c_repair" :
                $sql = "
                    INSERT INTO {$table} (     
                        cr_year_term,
                        date_add,
                        s_id,
                        cr_tel,
                        cr_room,
                        cr_floor,
                        b_id,
                        cr_remark,
                        cs_id,
                        n_id
                    ) VALUES (
                        :cr_year_term,
                        :date_add,
                        :s_id,
                        :cr_tel,
                        :cr_room,
                        :cr_floor,
                        :b_id,
                        :cr_remark,
                        :cs_id,
                        :n_id
                    )
                ";
            break;
            case "tb_r_repair" :
                $sql = "
                    INSERT INTO {$table} (     
                        rr_year_term,
                        date_add,
                        s_id,
                        rr_tel,
                        rr_room,
                        rr_floor,
                        b_id,
                        rr_remark,
                        rs_id,
                        n_id
                    ) VALUES (
                        :rr_year_term,
                        :date_add,
                        :s_id,
                        :rr_tel,
                        :rr_room,
                        :rr_floor,
                        :b_id,
                        :rr_remark,
                        :rs_id,
                        :n_id
                    )
                ";
            break;
            
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();  
        // return $sql;  
    }
    public function addDatastatus($data,$table) {
        switch($table){
            case "tb_e_datastatus" :
                $sql = "
                    INSERT INTO {$table} (     
                        r_id,
                        es_id,
                        ds_remark,
                        ds_num,
                        ds_date,
                        ds_count_time,
                        s_id
                    ) VALUES (
                        :r_id,
                        :es_id,
                        :ds_remark,
                        :ds_num,
                        :ds_date,
                        :ds_count_time,
                        :s_id
                    )
                ";
            break;
            case "tb_a_datastatus" :
                $sql = "
                    INSERT INTO {$table} (     
                        r_id,
                        as_id,
                        ds_remark,
                        ds_num,
                        ds_date,
                        ds_count_time,
                        s_id
                    ) VALUES (
                        :r_id,
                        :as_id,
                        :ds_remark,
                        :ds_num,
                        :ds_date,
                        :ds_count_time,
                        :s_id
                    )
                ";
            break;
            case "tb_c_datastatus" :
                $sql = "
                    INSERT INTO {$table} (     
                        r_id,
                        cs_id,
                        ds_remark,
                        ds_num,
                        ds_date,
                        ds_count_time,
                        s_id
                    ) VALUES (
                        :r_id,
                        :cs_id,
                        :ds_remark,
                        :ds_num,
                        :ds_date,
                        :ds_count_time,
                        :s_id
                    )
                ";
            break;
            case "tb_r_datastatus" :
                $sql = "
                    INSERT INTO {$table} (     
                        r_id,
                        rs_id,
                        ds_remark,
                        ds_num,
                        ds_date,
                        ds_count_time,
                        s_id
                    ) VALUES (
                        :r_id,
                        :rs_id,
                        :ds_remark,
                        :ds_num,
                        :ds_date,
                        :ds_count_time,
                        :s_id
                    )
                ";
            break;
            
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();  
    }
}
?>