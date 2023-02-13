<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/pages/auth/auth.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/vendor/autoload.php";?>
<?php
// use App\Model\Repair\Repair;
// $repairObj = new Repair;
// use App\Model\Repair\Building;
// $buildingObj = new Building;
// use App\Model\Repair\Department;
// $departmentObj = new Department;
// use App\Model\Repair\Type;
// $typeObj = new Type;
// use App\Model\Repair\Nature;
// $natureObj = new Nature;
// use App\Model\Repair\Status;
// $statusObj = new Status;
use App\Model\Repair\Users;
$usersObj = new Users;
// use App\Model\Repair\Datastatus;
// $datastatusObj = new Datastatus;
use App\Model\Repair\Menu;
$menuObj = new Menu;


// $year_term = yearterm(date("Y-m-d"));
// $_SESSION['year']=$year_term;

// $notifi = $repairObj->getRowsRepairByYearStatus($year_term,1);
// $_SESSION['notifi'] = $notifi;
?> 
    
    <!-- #Top Bar -->