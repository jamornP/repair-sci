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
}
