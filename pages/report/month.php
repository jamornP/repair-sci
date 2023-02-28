<?php
header('Content-Type: application/json');
require $_SERVER['DOCUMENT_ROOT']."/repair-sci/pages/auth/auth.php"; 
require $_SERVER['DOCUMENT_ROOT']."/repair-sci/function/function.php"; 
require $_SERVER['DOCUMENT_ROOT']."/repair-sci/vendor/autoload.php";

use App\Model\Repair\Repair;
$repairObj = new Repair;
use App\Model\Repair\Combobox;
$comboboxObj = new Combobox;
use App\Model\Repair\Users;
$usersObj = new Users;
use App\Model\Repair\Menu;
$menuObj = new Menu;
use App\Model\Repair\Notifi;
$notifiObj = new Notifi;

if(isset($_GET['table'])){
$table = $_GET['table'];
switch($table){
   case "tb_e_repair":
      $y=$_SESSION['year'];
      $datatest = monthInYear_term($y);
      $i=0;
      foreach($datatest as $datat){
         $data[$i]['month']=$datat['m_name'];
         $data[$i]['m_sql']=$datat['m_sql'];
         $data[$i]['repair'] = $notifiObj->countAllm($y,"tb_e_repair",$datat['m_sql']);
         $data[$i]['complete'] = $notifiObj->countStatusm($y,"tb_e_repair",8,$datat['m_sql']);
         $data[$i]['wait'] = $notifiObj->countStatusm($y,"tb_e_repair",9,$datat['m_sql']);
         $data[$i]['company'] = $notifiObj->countStatusm($y,"tb_e_repair",10,$datat['m_sql']);
         $data[$i]['no'] = $notifiObj->countNoSuccessm($y,"tb_e_repair",$datat['m_sql']);
         $i++;
      }
      break;
   case "tb_a_repair":
      $y=$_SESSION['year'];
      $datatest = monthInYear_term($y);
      $i=0;
      foreach($datatest as $datat){
         $data[$i]['month']=$datat['m_name'];
         $data[$i]['m_sql']=$datat['m_sql'];
         $data[$i]['repair'] = $notifiObj->countAllm($y,"tb_a_repair",$datat['m_sql']);
         $data[$i]['complete'] = $notifiObj->countStatusm($y,"tb_a_repair",8,$datat['m_sql']);
         $data[$i]['wait'] = $notifiObj->countStatusm($y,"tb_a_repair",9,$datat['m_sql']);
         $data[$i]['company'] = $notifiObj->countStatusm($y,"tb_a_repair",10,$datat['m_sql']);
         $data[$i]['no'] = $notifiObj->countNoSuccessm($y,"tb_a_repair",$datat['m_sql']);
         $i++;
      }
      break;
   case "tb_c_repair":
      $y=$_SESSION['year'];
      $datatest = monthInYear_term($y);
      $i=0;
      foreach($datatest as $datat){
         $data[$i]['month']=$datat['m_name'];
         $data[$i]['m_sql']=$datat['m_sql'];
         $data[$i]['repair'] = $notifiObj->countAllm($y,"tb_c_repair",$datat['m_sql']);
         $data[$i]['complete'] = $notifiObj->countStatusm($y,"tb_c_repair",8,$datat['m_sql']);
         $data[$i]['wait'] = $notifiObj->countStatusm($y,"tb_c_repair",9,$datat['m_sql']);
         $data[$i]['company'] = ($notifiObj->countStatusm($y,"tb_c_repair",6,$datat['m_sql']))+($notifiObj->countStatusm($y,"tb_c_repair",9,$datat['m_sql']));
         $data[$i]['no'] = $notifiObj->countNoSuccessm($y,"tb_c_repair",$datat['m_sql']);
         $i++;
      }
      break;
   case "tb_r_repair":
      $y=$_SESSION['year'];
      $datatest = monthInYear_term($y);
      $i=0;
      foreach($datatest as $datat){
         $data[$i]['month']=$datat['m_name'];
         $data[$i]['m_sql']=$datat['m_sql'];
         $data[$i]['repair'] = $notifiObj->countAllm($y,"tb_r_repair",$datat['m_sql']);
         $data[$i]['complete'] = $notifiObj->countStatusm($y,"tb_r_repair",8,$datat['m_sql']);
         $data[$i]['wait'] = $notifiObj->countStatusm($y,"tb_r_repair",9,$datat['m_sql']);
         $data[$i]['company'] = ($notifiObj->countStatusm($y,"tb_r_repair",6,$datat['m_sql']))+($notifiObj->countStatusm($y,"tb_r_repair",9,$datat['m_sql']));
         $data[$i]['no'] = $notifiObj->countNoSuccessm($y,"tb_r_repair",$datat['m_sql']);
         $i++;
      }
      break; 
   case "tb_l_repair":
      $y=$_SESSION['year'];
      $datatest = monthInYear_term($y);
      $i=0;
      foreach($datatest as $datat){
         $data[$i]['month']=$datat['m_name'];
         $data[$i]['m_sql']=$datat['m_sql'];
         $data[$i]['repair'] = $notifiObj->countAllm($y,"tb_l_repair",$datat['m_sql']);
         $data[$i]['complete'] = $notifiObj->countStatusm($y,"tb_l_repair",8,$datat['m_sql']);
         $data[$i]['wait'] = $notifiObj->countStatusm($y,"tb_l_repair",9,$datat['m_sql']);
         $data[$i]['company'] = ($notifiObj->countStatusm($y,"tb_l_repair",6,$datat['m_sql']))+($notifiObj->countStatusm($y,"tb_l_repair",9,$datat['m_sql']));
         $data[$i]['no'] = $notifiObj->countNoSuccessm($y,"tb_l_repair",$datat['m_sql']);
         $i++;
      }
      break;
   } 
}
 
//  print_r($datatest);
 echo json_encode($data);
?>