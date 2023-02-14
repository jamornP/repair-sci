<?php

namespace App\Model\Repair;

use App\Database\DbRepair;


class Menu extends DbRepair
{
  public function newMenu($data)
  {
    $sql = "
          INSERT INTO tb_menu (     
            m_name, 
            m_link_repair, 
            m_link_m_repair, 
            m_icon, 
            m_table
          ) VALUES (
            :m_name, 
            :m_link_repair, 
            :m_link_m_repair, 
            :m_icon, 
            :m_table
          )    
      ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
    return $this->pdo->lastInsertId();
  }
  public function getAllMenu()
  {
    $sql = "
          SELECT 
              *
          FROM
              tb_menu
      ";
    $stmt = $this->pdo->query($sql);
    $data = $stmt->fetchAll();
    return $data;
  }



  // tb_st_menu
  public function getMenuByStaff($s_id)
  {
    $sql = "
          SELECT 
              stm.*,m.*
          FROM
              tb_st_menu as stm
              LEFT JOIN tb_menu as m ON m.m_id = stm.m_id
          WHERE
              s_id = ?
      ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$s_id]);
    $data = $stmt->fetchAll();
    return $data;
  }
  public function addStaffMenu($data)
  {
    $sql = "
          INSERT INTO tb_st_menu (     
            s_id, 
            m_id 
          ) VALUES (
            :s_id, 
            :m_id 
          )    
      ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($data);
    return $this->pdo->lastInsertId();
  }

}
