<?php require $_SERVER['DOCUMENT_ROOT']."/repair-all/pages/auth/auth.php"; ?>
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
use App\Model\Repair\Datastatus;
$datastatusObj = new Datastatus;
use App\Model\Repair\Menu;
$menuObj = new Menu;


$year_term = yearterm(date("Y-m-d"));
$_SESSION['year']=$year_term;

$notifi = $repairObj->getRowsRepairByYearStatus($year_term,1);
$_SESSION['notifi'] = $notifi;
?> 
<nav class="navbar font-sriracha">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">ระบบงานแจ้งซ่อม คณะวิทยาศาสตร์ สจล.</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <?php
                            if(isset($_SESSION['notifi']) AND $_SESSION['notifi'] > 0 ){
                                echo "
                                <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                    <i class='material-icons'>notifications</i>
                                    <span class='label-count'>{$_SESSION['notifi']}</span>
                                </a>
                                ";
                            }else{
                                echo "
                                <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                                    <i class='material-icons'>notifications</i>
                                    <span class='label-count'></span>
                                </a>
                                ";
                            }
                        ?>
                        
                        <ul class="dropdown-menu">
                            <li class="header">รายการแจ้งซ่อมใหม่</li>
                            
                            <p style="margin: 10px;">dfsdfdsf</p>
                            <li class="body">
                                <ul class="menu">
                                    <?php
                                        $data_new = $repairObj->getRepairByYearStatus($year_term);
                                        foreach($data_new as $data){
                                            $dateadd = datethai_time($data['date_add']);
                                            $time = time_dif_EN($data['date_add'],date("Y-m-d H:i:s"));
                                            $r_id = go($data['r_id']);
                                            echo "
                                            <li>
                                                <a href='/repair-all/pages/manage/m_{$_SESSION['st_type']}.php?id={$r_id}'>
                                                    <div class='icon-circle bg-orange'>
                                                        <i class='material-icons'>person_add</i>
                                                    </div>
                                                    <div class='menu-info'>
                                                        <h4>{$data['fullname']}</h4>
                                                        <p>
                                                            <i class='material-icons'>access_time</i> {$time}
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            ";
                                        }
                                    ?>
                                    
                                    
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">รายการทั้งหมด</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->