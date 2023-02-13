
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/vendor/autoload.php";?>
<?php
use App\Model\Repair\Repair;
$repairObj = new Repair;
use App\Model\Repair\Building;
$buildingObj = new Building;
use App\Model\Repair\Department;
$departmentObj = new Department;
use App\Model\Repair\Type;
$typeObj = new Type;
use App\Model\Repair\Nature;
$natureObj = new Nature;
use App\Model\Repair\Status;
$statusObj = new Status;
use App\Model\Repair\Users;
$usersObj = new Users;
// print_r($_REQUEST);
$ck = $usersObj->checkUser($_POST);

if($ck){
    echo "  
        <script type='text/javascript'>
            setTimeout(function(){location.href='/repair-all/pages/repair'} , 500);
        </script>
    ";
}else{
    echo "  
        <script type='text/javascript'>
            setTimeout(function(){location.href='/repair-all/pages/auth'} , 500);
        </script>
    ";
}


?>