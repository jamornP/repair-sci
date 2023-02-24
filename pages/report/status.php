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

    $y = $_SESSION['year'];
    $table = "tb_a_status";
    $table2 = "tb_a_repair";
    $dataSt = $comboboxObj->getStatus($table);
    $color=array('rgb(255,215,0)','rgb(122,125,130)','rgb(142,82,115)','rgb(90,74,133)','rgb(44,83,133)','rgb(35,105,131)','rgb(33,113,92)','rgb(96,127,62)','rgb(153,124,50)','rgb(151,66,48)','rgb(131,40,49)');
$i=0;
 foreach($dataSt as $dataS){
    $sql="r.as_id = {$dataS['as_id']}";
    $data[$i]['label']=$dataS['as_name'];
    $data[$i]['value'] = $repairObj->countRepairByStatus($y,$table2,$sql);
    // print_r($data);
    // echo "\n";
    // $data['color'][$i]=$color[$i];
    $i++;
 }


 
 echo json_encode($data);
?>