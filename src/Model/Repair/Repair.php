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
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_a_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.as_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_a_status as s ON s.as_id = r.as_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.ar_year_term = '".$year."'
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_c_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.cs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_c_status as s ON s.cs_id = r.cs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.cr_year_term = '".$year."'
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_r_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.rs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_r_status as s ON s.rs_id = r.rs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.rr_year_term = '".$year."'
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_l_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.ls_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_l_status as s ON s.ls_id = r.ls_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.lr_year_term = '".$year."'
                ORDER BY r.date_add DESC
                ";
            break;
       
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
    public function getRepairByStatus($year,$table,$text_sql) {
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
                WHERE r.er_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_a_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.as_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_a_status as s ON s.as_id = r.as_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.ar_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_c_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.cs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_c_status as s ON s.cs_id = r.cs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.cr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_r_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.rs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_r_status as s ON s.rs_id = r.rs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.rr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_l_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.ls_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_l_status as s ON s.ls_id = r.ls_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.lr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
       
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
    public function getRepairByDate($year,$table,$text_sql) {
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
                WHERE r.er_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_a_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.as_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_a_status as s ON s.as_id = r.as_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.ar_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_c_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.cs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_c_status as s ON s.cs_id = r.cs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.cr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_r_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.rs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_r_status as s ON s.rs_id = r.rs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.rr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_l_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.ls_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_l_status as s ON s.ls_id = r.ls_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.lr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
       
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
    public function getRepairByStaff($year,$table,$s_id) {
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
                WHERE r.er_year_term = '".$year."' AND r.s_id ={$s_id}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_a_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.as_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_a_status as s ON s.as_id = r.as_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.ar_year_term = '".$year."' AND r.s_id ={$s_id}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_c_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.cs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_c_status as s ON s.cs_id = r.cs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.cr_year_term = '".$year."' AND r.s_id ={$s_id}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_r_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.rs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_r_status as s ON s.rs_id = r.rs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.rr_year_term = '".$year."' AND r.s_id ={$s_id}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_l_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.ls_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_l_status as s ON s.ls_id = r.ls_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.lr_year_term = '".$year."' AND r.s_id ={$s_id}
                ORDER BY r.date_add DESC
                ";
            break;
       
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data;
    }
    public function countRepairByStatus($year,$table,$text_sql) {
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
                WHERE r.er_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_a_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.as_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_a_status as s ON s.as_id = r.as_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.ar_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_c_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.cs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_c_status as s ON s.cs_id = r.cs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.cr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_r_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.rs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_r_status as s ON s.rs_id = r.rs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.rr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
            case "tb_l_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.ls_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_l_status as s ON s.ls_id = r.ls_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.lr_year_term = '".$year."' AND {$text_sql}
                ORDER BY r.date_add DESC
                ";
            break;
       
        }
        $stmt = $this->pdo->query($sql);
        // $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return  $row;
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
            case "tb_l_repair" :
                $sql = "
                    INSERT INTO {$table} (     
                        lr_year_term,
                        date_add,
                        s_id,
                        lr_tel,
                        lr_room,
                        lr_floor,
                        b_id,
                        lr_remark,
                        ls_id,
                        n_id
                    ) VALUES (
                        :lr_year_term,
                        :date_add,
                        :s_id,
                        :lr_tel,
                        :lr_room,
                        :lr_floor,
                        :b_id,
                        :lr_remark,
                        :ls_id,
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
    public function getRepairById($year,$table,$id) {
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
                WHERE r.er_year_term = '".$year."' AND r.r_id = {$id}
                ";
            break;
            case "tb_a_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.as_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_a_status as s ON s.as_id = r.as_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.ar_year_term = '".$year."' AND r.r_id = {$id}
                ";
            break;
            case "tb_c_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.cs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_c_status as s ON s.cs_id = r.cs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.cr_year_term = '".$year."' AND r.r_id = {$id}
                ";
            break;
            case "tb_r_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.rs_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_r_status as s ON s.rs_id = r.rs_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.rr_year_term = '".$year."' AND r.r_id = {$id}
                ";
            break;
            case "tb_l_repair":
                $sql = "
                SELECT r.* ,st.s_name_TH,st.s_images,b.b_name,s.ls_name,n.n_name
                FROM ".$table." as r 
                LEFT JOIN tb_staff as st ON st.s_id = r.s_id
                LEFT JOIN tb_building as b ON b.b_id = r.b_id
                LEFT JOIN tb_l_status as s ON s.ls_id = r.ls_id
                LEFT JOIN tb_nature as n ON n.n_id = r.n_id
                WHERE r.lr_year_term = '".$year."' AND r.r_id = {$id}
                ";
            break;
       
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data[0];
    }
    public function updateStatusRepair($data,$table) {
        switch ($table){
            
            case "tb_e_repair":
                $sql = "
                    UPDATE {$table}
                    SET es_id = :es_id
                    WHERE r_id = :r_id
                ";
            break;
            case "tb_a_repair":
                $sql = "
                    UPDATE {$table}
                    SET as_id = :as_id
                    WHERE r_id = :r_id
                ";
            break;
            case "tb_c_repair":
                $sql = "
                    UPDATE {$table}
                    SET cs_id = :cs_id
                    WHERE r_id = :r_id
                ";
            break;
            case "tb_r_repair":
                $sql = "
                    UPDATE {$table}
                    SET rs_id = :rs_id
                    WHERE r_id = :r_id
                ";
            break;
            case "tb_l_repair":
                $sql = "
                    UPDATE {$table}
                    SET ls_id = :ls_id
                    WHERE r_id = :r_id
                ";
            break;
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;  
    }

    // tb_-_datastatus-------------------------------------------------------------------------------------
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
            case "tb_l_datastatus" :
                $sql = "
                    INSERT INTO {$table} (     
                        r_id,
                        ls_id,
                        ds_remark,
                        ds_num,
                        ds_date,
                        ds_count_time,
                        s_id
                    ) VALUES (
                        :r_id,
                        :ls_id,
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
    public function getDatastatusByRepair($table,$r_id) {
        switch($table){
            case "tb_e_datastatus" :
                $sql = "
                    SELECT ds.*,st.s_name_TH,s.es_name 
                    FROM {$table} as ds
                    LEFT JOIN tb_staff as st ON st.s_id = ds.s_id
                    LEFT JOIN tb_e_status as s ON s.es_id = ds.es_id
                    WHERE ds.r_id ={$r_id}
                    ORDER BY ds.ds_date
                ";
            break;
            case "tb_a_datastatus" :
                $sql = "
                    SELECT ds.*,st.s_name_TH,s.as_name 
                    FROM {$table} as ds
                    LEFT JOIN tb_staff as st ON st.s_id = ds.s_id
                    LEFT JOIN tb_a_status as s ON s.as_id = ds.as_id
                    WHERE ds.r_id ={$r_id}
                    ORDER BY ds.ds_date
                ";
            break;
            case "tb_c_datastatus" :
                $sql = "
                    SELECT ds.*,st.s_name_TH,s.cs_name 
                    FROM {$table} as ds
                    LEFT JOIN tb_staff as st ON st.s_id = ds.s_id
                    LEFT JOIN tb_c_status as s ON s.cs_id = ds.cs_id
                    WHERE ds.r_id ={$r_id}
                    ORDER BY ds.ds_date
                ";
            break;
            case "tb_r_datastatus" :
                $sql = "
                SELECT ds.*,st.s_name_TH,s.rs_name 
                FROM {$table} as ds
                LEFT JOIN tb_staff as st ON st.s_id = ds.s_id
                LEFT JOIN tb_r_status as s ON s.rs_id = ds.rs_id
                WHERE ds.r_id ={$r_id}
                ORDER BY ds.ds_date
            ";
            break;
            case "tb_l_datastatus" :
                $sql = "
                SELECT ds.*,st.s_name_TH,s.ls_name 
                FROM {$table} as ds
                LEFT JOIN tb_staff as st ON st.s_id = ds.s_id
                LEFT JOIN tb_l_status as s ON s.ls_id = ds.ls_id
                WHERE ds.r_id ={$r_id}
                ORDER BY ds.ds_date
            ";
            break;
            
        }
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        // $row = $stmt->rowCount();
        return  $data; 
    }


    // tb_-_datastatus-------------------------------------------------------------------------------------
    public function editDatastatus($data,$table) {
        $sql = "
            UPDATE {$table}
            SET ds_remark = :ds_remark,
            s_id = :s_id
            WHERE ds_id =:ds_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true; 
    }
}
?>