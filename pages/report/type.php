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
        $buildings = $comboboxObj->getType();
        $all = $repairObj->countAllRepair($y,$table);
        $i=0;
        foreach($buildings as $b){
            if($i<10){
            $sql = " r.et_id =".$b['et_id'];
            $dataCount = $repairObj->getRepairByDate($y,$table,$sql);

            $data[$i]['label']=$b['et_name'];
            $data[$i]['value']=number_format(count($dataCount)*100/$all,2);
            // $data[$i]['sql']=$sql;
            $i++;
            }
        }

      break;
   case "tb_a_repair":
       
      break;
   case "tb_c_repair":
       
      break;
   case "tb_r_repair":
        
      break; 
   case "tb_l_repair":
        
      break;
   } 
}
 
//  print_r($datatest);
 echo json_encode($data);
?>