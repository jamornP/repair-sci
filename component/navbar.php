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
use App\Model\Repair\Notifi;
$notifiObj = new Notifi;


$year_term = yearterm(date("Y-m-d"));
$_SESSION['year']=$year_term;
$staffMenu = $menuObj->getMenuByStaff($_SESSION['s_id']);
// echo "<pre>";
// print_r($staffMenu);
// echo "</pre>";
$count1 = 0;
foreach($staffMenu as $smenu){
    // echo $smenu['m_table']."<br>";
    $d = $smenu['m_table'];
    $nitifi[$d] = $notifiObj->getRowsRepairByTable($d);
    $count1 = $count1 + $nitifi[$d];
}
// print_r($nitifi);
// echo $count1;

?> 
    
    <!-- #Top Bar -->
    <nav class="navbar font-kanit">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">ระบบงานแจ้งซ่อม คณะวิทยาศาสตร์ สจล.</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   <?php if($count1>=0){ ?>
                    <li class="dropdown">
                        <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                            <i class='material-icons'>notifications</i>
                            <span class='label-count'><?php echo $count1;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">รายการแจ้งซ่อมใหม่</li>
                            <?php
                                foreach($staffMenu as $smenu){
                                    $d = $smenu['m_table'];
                                    if($nitifi[$d]>=0){
                                        echo "
                                            <p class='fs-12 text-primary' style='margin: 10px;'>{$smenu['m_name']}</p>
                                            <hr style='margin-top: 5px; margin-buttom: 10px;'>
                                        ";
                                        echo "
                                            <li class='body'>
                                                <ul class='menu'>
                                        ";
                                        $newRepair = $notifiObj->getDataRepairByTable($d);
                                        foreach($newRepair as $data_new){
                                            $dateadd = datethai_time($data_new['date_add']);
                                            $time = time_dif_EN($data_new['date_add'],date("Y-m-d H:i:s"));
                                            $r_id = sent($data_new['r_id']);
                                            echo "
                                            <li>
                                                <a href='{$smenu['m_link_m_repair']}?id={$r_id}'>
                                                    <div class='icon-circle bg-orange'>
                                                        <i class='material-icons'>person_add</i>
                                                    </div>
                                                    <div class='menu-info'>
                                                        <h4>{$data_new['s_name_TH']}</h4>
                                                        <p>
                                                            <i class='material-icons'>access_time</i> {$time}
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            ";
                                        }
                                        echo "        
                                                </ul>
                                            </li>
                                        ";
                                    }
                                    
                                }
                            ?>
                            
                            <li class="footer">
                                <a href="javascript:void(0);">รายการทั้งหมด</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>