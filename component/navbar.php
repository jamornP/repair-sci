<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/pages/auth/auth.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/function/function.php"; ?>
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/vendor/autoload.php";?>
<?php
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
use App\Model\Repair\Assessment;
$assessmentObj = new Assessment;


$year_term = yearterm(date("Y-m-d"));
$_SESSION['year']=$year_term;
$staffMenu = $menuObj->getMenuByStaffNav($_SESSION['s_id']);
$count1 = 0;
foreach($staffMenu as $smenu){
    $d = $smenu['m_table'];
    $nitifi[$d] = $notifiObj->getRowsRepairByTable($d);
    $count1 = $count1 + $nitifi[$d];
}
?>
    <nav class="navbar font-sriracha">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">ระบบงานแจ้งซ่อม คณะวิทยาศาสตร์ สจล.</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href='/repair-sci/doc/คู่มือการใช้งานโปรแกรมแจ้งซ่อมคณะวิทยาศาสตร์เบื้องต้น .pdf' class="" target="_blank">
                            <span class="fs-16">คู่มือ</span>     
                        </a> 
                    </li>
                    <li><a href='/repair-sci/pages/member/profile.php' class="">
                            <span class="fs-16">ติดตามงานซ่อม</span>     
                        </a> 
                    </li>
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?php echo $count1;?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <?php
                                foreach($staffMenu as $smenu){
                                    $d = $smenu['m_table'];
                                    if($nitifi[$d]>0){
                                        echo "
                                            <p class='fs-12 text-primary' style='margin: 10px;'>{$smenu['m_name']}</p>
                                            
                                        ";
                                        $newRepair = $notifiObj->getDataRepairByTable($d);
                                        foreach($newRepair as $data_new){
                                            $dateadd = datethai_time($data_new['date_add']);
                                            $time = time_dif_EN($data_new['date_add'],date("Y-m-d H:i:s"));
                                            $r_id = sent($data_new['r_id']);
                                            echo "
                                                <ul class='menu'>
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
                                                </ul>
                                            ";
                                        }
                                    }
                                }
                                ?>
                                
                                <!-- <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul> -->
                               
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                   
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>