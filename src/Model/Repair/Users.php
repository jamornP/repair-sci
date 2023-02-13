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
            st.*,d.d_name as d_name
        FROM
            tb_staff as st
            LEFT JOIN tb_department as d ON d.d_id = st.d_id
        WHERE
            st.s_id = '".$st_id."'
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        return $data[0];
        // return $sql;
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

    // public function checkUser($user) {
    //     $sql = "
    //     SELECT
    //         *
    //     FROM
    //         tb_staff
    //     WHERE
    //         email = ?
    //     ";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([$user['username']]);
    //     $data = $stmt->fetchAll();
    //     $userDB = $data[0];
    //     if(password_verify($user['password'],$userDB['password'])) {
    //     session_start();
    //     $_SESSION['name'] = $userDB['name_EN'];
    //     $_SESSION['name_TH'] = $userDB['name_TH'];
    //     $_SESSION['name_EN'] = $userDB['name_EN'];
    //     $_SESSION['email'] = $userDB['email'];
    //     $_SESSION['position']=$userDB['position'];
    //     $_SESSION['st_status']=$userDB['st_status'];
    //     $_SESSION['st_type']=$userDB['st_type'];
    //     $_SESSION['st_id']=$userDB['st_id'];
    //     $_SESSION['d_id']=$userDB['d_id'];
    //     $_SESSION['tel']=$userDB['tel'];
    //     $_SESSION['login'] = true;
    //     $_SESSION['image']="/repair-all/images/user.png";
        

    //     return true;
    //     } else {
    //     return false;
    //     }
    // }
    // public function changePassword($user) {
    //     $sql = "
    //     SELECT
    //         *
    //     FROM
    //         tb_staff
    //     WHERE
    //         email = ?
    //     ";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([$user['email']]);
    //     $data = $stmt->fetchAll();
    //     $userDB = $data[0];
    //     if(password_verify($user['OldPassword'],$userDB['password'])) {
    //         $password = password_hash($user['NewPassword'],PASSWORD_DEFAULT);
    //         $sql2 = "
    //         UPDATE 
    //             tb_staff
    //         SET
    //             password = '".$password."'
    //         WHERE
    //             email = '".$user['email']."'
    //         ";
    //         $stmt = $this->pdo->query($sql2);
    //         return true;
    //         // return $sql2;
    //     } else {
    //         // return $sql2;
    //         return false;
    //     }
    // }
    // public function ResetPassword($email) {
    //     $sql1 = "
    //     SELECT
    //         *
    //     FROM
    //         tb_staff
    //     WHERE
    //         email = '".$email."'
    //     ";
    //     $stmt = $this->pdo->query($sql1);
    //     $data = $stmt->fetchAll();
    //     $row = $stmt->rowCount();
    //     if($row > 0){
    //         $password = password_hash('123456',PASSWORD_DEFAULT);
    //         $sql = "
    //         UPDATE 
    //             tb_staff
    //         SET
    //             password = '".$password."'
    //         WHERE
    //             email = '".$email."'
    //         ";
    //         $stmt = $this->pdo->query($sql);
    //         return true;
    //     }else{
    //         return false;
    //     }
        
    // }
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
    // public function updateUsers($user) {
    //     $sql = "
    //     UPDATE 
    //         tb_staff 
    //     SET 
    //         name_TH= :name_TH,
    //         name_EN= :name_EN,
    //         position= :position,
    //         email= :Email,
    //         tel= :tel
    //     WHERE 
    //         st_id= :st_id
    //     ";

    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute($user);

    //     $_SESSION['name'] = $user['name_EN'];
    //     $_SESSION['name_TH'] = $user['name_TH'];
    //     $_SESSION['name_EN'] = $user['name_EN'];
    //     $_SESSION['email'] = $user['Email'];
    //     $_SESSION['position']=$user['position'];
    //     $_SESSION['tel']=$user['tel'];
    //     return true;
        
    // }
    // public function updateStTypeUsers($user) {
    //     $sql = "
    //     UPDATE 
    //         tb_staff 
    //     SET 
    //         st_status= :st_status,
    //         st_type= :st_type
    //     WHERE 
    //         st_id= :st_id
    //     ";

    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute($user);
    //     return true;
        
    // }
}
?>