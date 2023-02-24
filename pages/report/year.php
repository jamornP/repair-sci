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

    switch($_REQUEST['table']){
        case "tb_e_repair":
            for($i=0;$i<5;$i++){
                $y = $_SESSION['year']-(4-$i);
                $d = (string)$y;
                $data[$i]['year'] = $d;
                $data[$i]['repair'] = $notifiObj->countAll($y,"tb_e_repair");
                $data[$i]['complete'] = $notifiObj->countStatus($y,"tb_e_repair",8);
                $data[$i]['wait'] = $notifiObj->countStatus($y,"tb_e_repair",9);
                $data[$i]['company'] = $notifiObj->countStatus($y,"tb_e_repair",10);
                $data[$i]['no'] = $notifiObj->countNoSuccess($y,"tb_e_repair");
            }
            break;
        case "tb_a_repair":
            for($i=0;$i<5;$i++){
                $y = $_SESSION['year']-(4-$i);
                $d = (string)$y;
                $data[$i]['year'] = $d;
                $data[$i]['repair'] = $notifiObj->countAll($y,"tb_a_repair");
                $data[$i]['complete'] = $notifiObj->countStatus($y,"tb_a_repair",8);
                $data[$i]['wait'] = $notifiObj->countStatus($y,"tb_a_repair",9);
                $data[$i]['company'] = $notifiObj->countStatus($y,"tb_a_repair",10);
                $data[$i]['no'] = $notifiObj->countNoSuccess($y,"tb_a_repair");
            }
            break;
        case "tb_c_repair":
            for($i=0;$i<5;$i++){
                $y = $_SESSION['year']-(4-$i);
                $d = (string)$y;
                $data[$i]['year'] = $d;
                $data[$i]['repair'] = $notifiObj->countAll($y,"tb_c_repair");
                $data[$i]['complete'] = $notifiObj->countStatus($y,"tb_c_repair",8);
                $data[$i]['wait'] = $notifiObj->countStatus($y,"tb_c_repair",9);
                $data[$i]['company'] = ($notifiObj->countStatus($_SESSION['year'],"tb_c_repair",6))+($notifiObj->countStatus($_SESSION['year'],"tb_c_repair",9));
                $data[$i]['no'] = $notifiObj->countNoSuccess($y,"tb_c_repair");
            }
            break;
        case "tb_r_repair":
            for($i=0;$i<5;$i++){
                $y = $_SESSION['year']-(4-$i);
                $d = (string)$y;
                $data[$i]['year'] = $d;
                $data[$i]['repair'] = $notifiObj->countAll($y,"tb_r_repair");
                $data[$i]['complete'] = $notifiObj->countStatus($y,"tb_r_repair",8);
                $data[$i]['wait'] = $notifiObj->countStatus($y,"tb_r_repair",9);
                $data[$i]['company'] = ($notifiObj->countStatus($_SESSION['year'],"tb_r_repair",6))+($notifiObj->countStatus($_SESSION['year'],"tb_r_repair",9));
                $data[$i]['no'] = $notifiObj->countNoSuccess($y,"tb_r_repair");
            }
            break;
    }
    
    echo json_encode($data);
?>