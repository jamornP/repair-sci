<?php
namespace App\Model\Repair;

use App\Database\DbRepair;


class Users extends DbRepair {

    public function getAllUsers() {
        $sql1 = "
        SELECT
            s.*,d.d_name as d_name
        FROM
            tb_staff as s
            LEFT JOIN tb_department as d ON d.d_id = s.d_id
        ";
        $stmt = $this->pdo->query($sql1);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $data;
    }
    public function getUsersById($st_id) {
        $sql = "
        SELECT
            st.*,d.d_name as d_name,sts.sts_name
        FROM
            tb_staff as st
            LEFT JOIN tb_department as d ON d.d_id = st.d_id
            LEFT JOIN tb_st_status as sts ON sts.sts_id = st.sts_id
        WHERE
            st.s_id = '".$st_id."'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $data[0];
        // return $sql;
    }
    public function updateStaffStatus($user) {
        $sql = "
        UPDATE 
            tb_staff 
        SET 
            sts_id= :sts_id
        WHERE 
            s_id= :s_id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($user);
        return true;
        
    }
    public function checkUser($user) {
        $sql = "
        SELECT
            s.*,sts.sts_name,d.d_name
        FROM
            tb_staff as s
            LEFT JOIN tb_st_status as sts ON sts.sts_id = s.sts_id
            LEFT JOIN tb_department as d ON d.d_id = s.d_id
        WHERE
            email = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user['username']]);
        $data = $stmt->fetchAll();
        $userDB = $data[0];
        if(password_verify($user['password'],$userDB['password'])) {
        session_start();
        $_SESSION['s_name'] = $userDB['s_name_EN'];
        $_SESSION['s_name_TH'] = $userDB['s_name_TH'];
        $_SESSION['s_name_EN'] = $userDB['s_name_EN'];
        $_SESSION['email'] = $userDB['email'];
        $_SESSION['s_position']=$userDB['s_position'];
        $_SESSION['sts_name']=$userDB['sts_name'];
        $_SESSION['s_id']=$userDB['s_id'];
        $_SESSION['d_id']=$userDB['d_id'];
        $_SESSION['d_name']=$userDB['d_name'];
        $_SESSION['s_tel']=$userDB['s_tel'];
        $_SESSION['login'] = true;
        $_SESSION['s_images']=$userDB['s_images'];
        $_SESSION['s_id']=$userDB['s_id'];
        

        return true;
        } else {
        return false;
        }
    }
    public function ResetPassword($email) {
        $sql1 = "
        SELECT
            *
        FROM
            tb_staff
        WHERE
            email = '".$email."'
        ";
        $stmt = $this->pdo->query($sql1);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        if($row > 0){
            $password = password_hash('123456',PASSWORD_DEFAULT);
            $sql = "
            UPDATE 
                tb_staff
            SET
                password = '".$password."'
            WHERE
                email = '".$email."'
            ";
            $stmt = $this->pdo->query($sql);
            return true;
        }else{
            return false;
        }
        
    }
    public function changePassword($user) {
        $sql = "
        SELECT
            *
        FROM
            tb_staff
        WHERE
            email = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user['email']]);
        $data = $stmt->fetchAll();
        $userDB = $data[0];
        if(password_verify($user['OldPassword'],$userDB['password'])) {
            $password = password_hash($user['NewPassword'],PASSWORD_DEFAULT);
            $sql2 = "
            UPDATE 
                tb_staff
            SET
                password = '".$password."'
            WHERE
                email = '".$user['email']."'
            ";
            $stmt = $this->pdo->query($sql2);
            return true;
            // return $sql2;
        } else {
            // return $sql2;
            return false;
        }
    }
    public function updateUsers($user) {
        $sql = "
        UPDATE 
            tb_staff 
        SET 
            s_name_TH= :s_name_TH,
            s_name_EN= :s_name_EN,
            s_position= :s_position,
            email= :email,
            s_tel= :s_tel
        WHERE 
            s_id= :s_id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($user);

        $_SESSION['s_name'] = $user['s_name_EN'];
        $_SESSION['s_name_TH'] = $user['s_name_TH'];
        $_SESSION['s_name_EN'] = $user['s_name_EN'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['s_position']=$user['s_position'];
        $_SESSION['s_tel']=$user['s_tel'];

        return true;
        
    }




    // sts_status
    public function getAllStatus() {
        $sql = "
        SELECT
            *
        FROM
            tb_st_status
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $data;
    }

    
    // 
    // 
    // public function getUsersById($st_id) {
    //     $sql = "
    //     SELECT
    //         st.*,d.d_name as d_name
    //     FROM
    //         tb_staff as st
    //         LEFT JOIN tb_department as d ON d.d_id = st.d_id
    //     WHERE
    //         st.st_id = '".$st_id."'
    //     ";
    //     $stmt = $this->pdo->query($sql);
    //     $data = $stmt->fetchAll();
    //     $row = $stmt->rowCount();
    //     return $data[0];
    //     // return $sql;
    // }
    
    
}
?>