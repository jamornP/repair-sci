<?php  
    session_start(); 
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>App Science KMITL</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/link-css.php";?>
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/page-loader.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/navbar.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/s-left-right.php";?>
    
   <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <?php
        $dataf = $usersObj->getUsersById($_SESSION['s_id']);
    ?>
    <section class="content">
        <div class="container-fluid font-kanit">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <?php if($dataf['s_images']==""){
                                    ?>
                                        <img src="/repair-sci/images/staff/user.png" width="128" height="128" alt="Profile Image" />
                                    <?php
                                }else{
                                    echo "
                                        <img src='/repair-sci/images/staff/{$dataf['s_images']}' width='128' height='128' alt='no images' />
                                    ";
                                }
                                ?>
                                
                            </div>
                            <div class="content-area">
                                <h3><?php echo $dataf['s_name_TH'];?></h3>
                                <h4><?php echo $dataf['s_name_EN'];?></h4>
                                <p><?php echo $dataf['s_position'];?></p>
                                
                            </div>
                        </div>
                        <div class="profile-footer">
                            <h4>ข้อมูลติดต่อ</h4>
                            <hr>
                            <p><b>Email : </b><?php echo $dataf['email'];?></p>
                           
                            <p><b>เบอร์ติดต่อ : </b><?php echo $dataf['s_tel'];?></p>
                        </div>
                    </div>

                    <!-- <div class="card card-about-me">
                        <div class="header">
                            <h2>ข้อมูลส่วนตัว</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        การศึกษา
                                    </div>
                                    <div class="content">
                                        ป.ตรี วิทยาการคอมพิวเตอร์, มหาวิทยาลัยราชภัฏนครปฐม
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        ที่อยู่
                                    </div>
                                    <div class="content">
                                        กรุงเทพมหานคร, ไทย
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Skills
                                    </div>
                                    <div class="content" style="line-height: 1.8;">
                                        <span class="label bg-red" >HTML</span>
                                        <span class="label bg-blue">PHP</span>
                                        <span class="label bg-cyan">SQL</span>
                                        <span class="label bg-amber">Xampp</span>
                                        <span class="label bg-teal">JavaScript</span>
                                        <span class="label bg-green">เครื่องเสียง</span>
                                        <span class="label bg-orange">ถ่ายภาพ</span>
                                        <span class="label bg-blue-grey">ซ่อมเครื่องคอมพิวเตอร์</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                    "ความสำเร็จ" คือผลรวมของความพยายามเล็กๆ ที่เกิดขึ้นซ้ำๆเป็นประจำทุกวัน
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <?php
                    if(isset($_POST['changePass'])){
                        // echo "changePass ok"."<br>";
                        $_POST['email']=$_SESSION['email'];
                        unset($_POST['changePass']);
                        // print_r($_POST);
                        if($_POST['NewPassword']==$_POST['NewPasswordConfirm']){
                            $ckPass = $usersObj->changePassword($_POST);
                            // echo $ckPass;
                            if($ckPass){
                                $mes="Change Password Success";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>×</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>";
                                echo "  
                                    <script type='text/javascript'>
                                        setTimeout(function(){location.href='/repair-sci/pages/member/profile.php'} , 2000);
                                    </script>
                                ";
                            }
                        }else{
                            $mes="กรุณาตรวจสอบ Password อีกครั้ง";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-danger p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>×</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>
                                ";
                        }
                    }
                    if(isset($_POST['update'])){
                        // echo "update ok"."<br>";
                        $_POST['s_id']=$_SESSION['s_id'];
                        unset($_POST['update']);
                        // print_r($_POST);
                        $ckUser = $usersObj->updateUsers($_POST);
                            // echo $ckUser;
                            if($ckUser){
                                $mes="Update Profile Success";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>×</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>";
                                echo "  
                                    <script type='text/javascript'>
                                        setTimeout(function(){location.href='/repair-sci/pages/member/profile.php'} , 2000);
                                    </script>
                                ";
                            }else{
                                echo $ckUser;
                                $mes="Update Profile ไม่สำเร็จ";
                                echo "
                                    <div data-notify='container' class='bootstrap-notify-container alert alert-dismissible alert-danger p-r-35 animated rotateInUpRight' role='alert' data-notify-position='top-right' style='display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;'>
                                        <button type='button' aria-hidden='true' class='close' data-notify='dismiss' style='position: absolute; right: 10px; top: 5px; z-index: 1033;'>×</button>
                                        <span data-notify='icon'></span> 
                                        <span data-notify='title'></span> 
                                        <span data-notify='message'>{$mes}</span>
                                        <a href='#' target='_blank' data-notify='url'></a>
                                    </div>
                                ";
                            }
                    }

                ?>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <?php
                                            $datar = $repairObj->getRepairByStaff($_SESSION['year'],"tb_e_repair",$_SESSION['s_id']);
                                            $r = count($datar);
                                            if($r>0){
                                            ?>
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading bg-light-blue">
                                                    <div class="media">
                                                        <div class="media-left">
                                                        
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a href="#">แจ้งซ่อมไฟฟ้าและประปา</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table table-responsive">
                                                        <table class="table table-bordered table-striped table-hover  dataTable">
                                                            <thead>
                                                                <tr class='fs-12'>
                                                                    <th width="" scope="col">#</th>
                                                                    <th width="" scope="col">วันที่แจ้ง</th>
                                                                    <th width="" scope="col">รายละเอียด</th>
                                                                    <th width="" scope="col">ห้อง</th>
                                                                    <th width="" scope="col">ชั้น</th>
                                                                    <th width="" scope="col">อาคาร</th>
                                                                    <th width="" scope="col">ประเถท</th>
                                                                    <th width="" scope="col">ลักษณะงาน</th>
                                                                    <th width="" scope="col">สถานะ</th>
                                                                    <th width="" scope="" class="fs-12">ความพึงพอใจ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $i = 0;
                                                                    $dss['s_id'] = ""; 
                                                                    $dss['s_name'] = ""; 
                                                                    foreach($datar as $data){
                                                                        $i++;
                                                                        $date_add = datethai($data['date_add']);
                                                                        $datefull = datethai_time($data['date_add']);
                                                                        $s = "";
                                                                        $r_data = $comboboxObj->getDataStatusByRepair2("tb_e_datastatus",$data['r_id']);
                                                                        foreach($r_data as $datas){
                                                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_e_status",$datas['es_id']);
                                                                            $dss['s_id'] = $dataSt1['es_id']; 
                                                                            $dss['s_name'] = $dataSt1['es_name'];
                                                                            $das = statusRepair($dss);
                                                                            $s = $s."". $das['bt'];
                                                                        }
                                                                        $ckAss = $assessmentObj->countAssByRepairType($data['r_id'],'e');
                                                                        if($ckAss>0){
                                                                            $dataAssessment="<a href='#'>ประเมินเรียบร้อย</a>";
                                                                        }elseif($data['es_id']==8){
                                                                            $dataAssessment="<a href='/repair-sci/pages/member/assessment.php?re={$data['r_id']}&type=e'>รอประเมิน</a>";
                                                                        }else{
                                                                            $dataAssessment="";
                                                                        }
                                                                        
                                                                        echo "
                                                                            <tr>
                                                                                <th scope='row'>{$i}</th>
                                                                                <td class='fs-10 text-center'>{$datefull}</td>
                                                                                <td class='fs-12'>{$data['er_remark']}</td>
                                                                                <td class='fs-12'>{$data['er_room']}</td>
                                                                                <td class='fs-12'>{$data['er_floor']}</td>
                                                                                <td class='fs-10'>{$data['b_name']}</td>
                                                                                <td class='fs-12'>{$data['et_name']}</td>
                                                                                <td class='fs-12'>{$data['n_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$s} {$data['es_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$dataAssessment}</td>
                                                                            
                                                                            </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php
                                            }
                                        ?>
                                        <?php
                                            $datar = $repairObj->getRepairByStaff($_SESSION['year'],"tb_a_repair",$_SESSION['s_id']);
                                            $r = count($datar);
                                            if($r>0){
                                            ?>
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading bg-light-green">
                                                    <div class="media">
                                                        <div class="media-left">
                                                        
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a href="#">แจ้งซ่อมเครื่องปรับอากาศ</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table table-responsive">
                                                        <table class="table table-bordered table-striped table-hover  dataTable">
                                                            <thead>
                                                                <tr class='fs-12'>
                                                                    <th width="2%" scope="col">#</th>
                                                                    <th width="10%" scope="col">วันที่แจ้ง</th>
                                                                    <th width="" scope="col">รายละเอียด</th>
                                                                    <th width="8%" scope="col">ห้อง</th>
                                                                    <th width="3%" scope="col">ชั้น</th>
                                                                    <th width="15%" scope="col">อาคาร</th>
                                                                    <th width="8%" scope="col">ลักษณะงาน</th>
                                                                    <th width="10%" scope="col">สถานะ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    // print_r($datar);
                                                                    $i = 0;
                                                                    $dss['s_id'] = ""; 
                                                                    $dss['s_name'] = ""; 
                                                                    foreach($datar as $data){
                                                                        $i++;
                                                                        $date_add = datethai($data['date_add']);
                                                                        $datefull = datethai_time($data['date_add']);
                                                                        $s = "";
                                                                        $r_data = $comboboxObj->getDataStatusByRepair2("tb_a_datastatus",$data['r_id']);
                                                                        foreach($r_data as $datas){
                                                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_a_status",$datas['as_id']);
                                                                            $dss['s_id'] = $dataSt1['as_id']; 
                                                                            $dss['s_name'] = $dataSt1['as_name'];
                                                                            $das = statusRepair($dss);
                                                                            $s = $s."". $das['bt'];
                                                                        }
                                                                        $ckAss = $assessmentObj->countAssByRepairType($data['r_id'],'a');
                                                                        if($ckAss>0){
                                                                            $dataAssessment="<a href='#'>ประเมินเรียบร้อย</a>";
                                                                        }elseif($data['as_id']==8){
                                                                            $dataAssessment="<a href='/repair-sci/pages/member/assessment.php?re={$data['r_id']}&type=a'>รอประเมิน</a>";
                                                                        }else{
                                                                            $dataAssessment="";
                                                                        }
                                                                        echo "
                                                                            <tr>
                                                                                <th scope='row'>{$i}</th>
                                                                                <td class='fs-10 text-center'>{$datefull}</td>
                                                                                <td class='fs-12'>{$data['ar_remark']}</td>
                                                                                <td class='fs-12'>{$data['ar_room']}</td>
                                                                                <td class='fs-12'>{$data['ar_floor']}</td>
                                                                                <td class='fs-10'>{$data['b_name']}</td>
                                                                                <td class='fs-12'>{$data['n_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$s} {$data['as_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$dataAssessment}</td>
                                                                            </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                                <?php
                                                }
                                        ?>
                                        <?php
                                            $datar = $repairObj->getRepairByStaff($_SESSION['year'],"tb_c_repair",$_SESSION['s_id']);
                                            $r = count($datar);
                                            if($r>0){
                                            ?>
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading bg-orange">
                                                    <div class="media">
                                                        <div class="media-left">
                                                        
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a href="#">แจ้งซ่อมเครื่องคอมพิวเตอร์เจ้าหน้าที่</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table table-responsive">
                                                        <table class="table table-bordered table-striped table-hover  dataTable">
                                                            <thead>
                                                                <tr class='fs-12'>
                                                                    <th width="2%" scope="col">#</th>
                                                                    <th width="10%" scope="col">วันที่แจ้ง</th>
                                                                    <th width="" scope="col">รายละเอียด</th>
                                                                    <th width="8%" scope="col">ห้อง</th>
                                                                    <th width="3%" scope="col">ชั้น</th>
                                                                    <th width="15%" scope="col">อาคาร</th>
                                                                    <th width="8%" scope="col">ลักษณะงาน</th>
                                                                    <th width="10%" scope="col">สถานะ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    // print_r($datar);
                                                                    $i = 0;
                                                                    $dss['s_id'] = ""; 
                                                                    $dss['s_name'] = ""; 
                                                                    foreach($datar as $data){
                                                                        $i++;
                                                                        $date_add = datethai($data['date_add']);
                                                                        $datefull = datethai_time($data['date_add']);
                                                                        $s = "";
                                                                        $r_data = $comboboxObj->getDataStatusByRepair2("tb_c_datastatus",$data['r_id']);
                                                                        foreach($r_data as $datas){
                                                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_c_status",$datas['cs_id']);
                                                                            $dss['s_id'] = $dataSt1['cs_id']; 
                                                                            $dss['s_name'] = $dataSt1['cs_name'];
                                                                            $das = statusRepair($dss);
                                                                            $s = $s."". $das['bt'];
                                                                        }
                                                                        $ckAss = $assessmentObj->countAssByRepairType($data['r_id'],'c');
                                                                        if($ckAss>0){
                                                                            $dataAssessment="<a href='#'>ประเมินเรียบร้อย</a>";
                                                                        }elseif($data['cs_id']==8){
                                                                            $dataAssessment="<a href='/repair-sci/pages/member/assessment.php?re={$data['r_id']}&type=c'>รอประเมิน</a>";
                                                                        }else{
                                                                            $dataAssessment="";
                                                                        }
                                                                        echo "
                                                                            <tr>
                                                                                <th scope='row'>{$i}</th>
                                                                                <td class='fs-10 text-center'>{$datefull}</td>
                                                                                <td class='fs-12'>{$data['cr_remark']}</td>
                                                                                <td class='fs-12'>{$data['cr_room']}</td>
                                                                                <td class='fs-12'>{$data['cr_floor']}</td>
                                                                                <td class='fs-10'>{$data['b_name']}</td>
                                                                                <td class='fs-12'>{$data['n_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$s} {$data['cs_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$dataAssessment}</td>
                                                                            </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                                <?php
                                                }
                                        ?>
                                        <?php
                                            $datar = $repairObj->getRepairByStaff($_SESSION['year'],"tb_r_repair",$_SESSION['s_id']);
                                            $r = count($datar);
                                            if($r>0){
                                            ?>
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading bg-cyan">
                                                    <div class="media">
                                                        <div class="media-left">
                                                        
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading text-white">
                                                                <a href="#">แจ้งซ่อมเครื่องคอมพิวเตอร์ห้องเรียน</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table table-responsive">
                                                        <table class="table table-bordered table-striped table-hover  dataTable">
                                                            <thead>
                                                                <tr class='fs-12'>
                                                                    <th width="2%" scope="col">#</th>
                                                                    <th width="10%" scope="col">วันที่แจ้ง</th>
                                                                    <th width="" scope="col">รายละเอียด</th>
                                                                    <th width="8%" scope="col">ห้อง</th>
                                                                    <th width="3%" scope="col">ชั้น</th>
                                                                    <th width="15%" scope="col">อาคาร</th>
                                                                    <th width="8%" scope="col">ลักษณะงาน</th>
                                                                    <th width="10%" scope="col">สถานะ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    // print_r($datar);
                                                                    $i = 0;
                                                                    $dss['s_id'] = ""; 
                                                                    $dss['s_name'] = ""; 
                                                                    foreach($datar as $data){
                                                                        $i++;
                                                                        $date_add = datethai($data['date_add']);
                                                                        $datefull = datethai_time($data['date_add']);
                                                                        $s = "";
                                                                        $r_data = $comboboxObj->getDataStatusByRepair2("tb_r_datastatus",$data['r_id']);
                                                                        foreach($r_data as $datas){
                                                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_r_status",$datas['rs_id']);
                                                                            $dss['s_id'] = $dataSt1['rs_id']; 
                                                                            $dss['s_name'] = $dataSt1['rs_name'];
                                                                            $das = statusRepair($dss);
                                                                            $s = $s."". $das['bt'];
                                                                        }
                                                                        $ckAss = $assessmentObj->countAssByRepairType($data['r_id'],'r');
                                                                        if($ckAss>0){
                                                                            $dataAssessment="<a href='#'>ประเมินเรียบร้อย</a>";
                                                                        }elseif($data['rs_id']==8){
                                                                            $dataAssessment="<a href='/repair-sci/pages/member/assessment.php?re={$data['r_id']}&type=r'>รอประเมิน</a>";
                                                                        }else{
                                                                            $dataAssessment="";
                                                                        }
                                                                        echo "
                                                                            <tr>
                                                                                <th scope='row'>{$i}</th>
                                                                                <td class='fs-10 text-center'>{$datefull}</td>
                                                                                <td class='fs-12'>{$data['rr_remark']}</td>
                                                                                <td class='fs-12'>{$data['rr_room']}</td>
                                                                                <td class='fs-12'>{$data['rr_floor']}</td>
                                                                                <td class='fs-10'>{$data['b_name']}</td>
                                                                                <td class='fs-12'>{$data['n_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$s} {$data['rs_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$dataAssessment}</td>
                                                                            </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                                <?php
                                                }
                                        ?>
                                        <?php
                                            $datar = $repairObj->getRepairByStaff($_SESSION['year'],"tb_l_repair",$_SESSION['s_id']);
                                            $r = count($datar);
                                            if($r>0){
                                            ?>
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading bg-yellow">
                                                    <div class="media">
                                                        <div class="media-left">
                                                        
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading text-white">
                                                                <a href="#">แจ้งซ่อมเครื่องคอมพิวเตอร์ห้อง LAB คณะ</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table table-responsive">
                                                        <table class="table table-bordered table-striped table-hover  dataTable">
                                                            <thead>
                                                                <tr class='fs-12'>
                                                                    <th width="2%" scope="col">#</th>
                                                                    <th width="10%" scope="col">วันที่แจ้ง</th>
                                                                    <th width="" scope="col">รายละเอียด</th>
                                                                    <th width="8%" scope="col">ห้อง</th>
                                                                    <th width="3%" scope="col">ชั้น</th>
                                                                    <th width="15%" scope="col">อาคาร</th>
                                                                    <th width="8%" scope="col">ลักษณะงาน</th>
                                                                    <th width="10%" scope="col">สถานะ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    // print_r($datar);
                                                                    $i = 0;
                                                                    $dss['s_id'] = ""; 
                                                                    $dss['s_name'] = ""; 
                                                                    foreach($datar as $data){
                                                                        $i++;
                                                                        $date_add = datethai($data['date_add']);
                                                                        $datefull = datethai_time($data['date_add']);
                                                                        $s = "";
                                                                        $r_data = $comboboxObj->getDataStatusByRepair2("tb_l_datastatus",$data['r_id']);
                                                                        foreach($r_data as $datas){
                                                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_l_status",$datas['ls_id']);
                                                                            $dss['s_id'] = $dataSt1['ls_id']; 
                                                                            $dss['s_name'] = $dataSt1['ls_name'];
                                                                            $das = statusRepair($dss);
                                                                            $s = $s."". $das['bt'];
                                                                        }
                                                                        $ckAss = $assessmentObj->countAssByRepairType($data['r_id'],'l');
                                                                        if($ckAss>0){
                                                                            $dataAssessment="<a href='#'>ประเมินเรียบร้อย</a>";
                                                                        }elseif($data['ls_id']==8){
                                                                            $dataAssessment="<a href='/repair-sci/pages/member/assessment.php?re={$data['r_id']}&type=l'>รอประเมิน</a>";
                                                                        }else{
                                                                            $dataAssessment="";
                                                                        }
                                                                        echo "
                                                                            <tr>
                                                                                <th scope='row'>{$i}</th>
                                                                                <td class='fs-10 text-center'>{$datefull}</td>
                                                                                <td class='fs-12'>{$data['lr_remark']}</td>
                                                                                <td class='fs-12'>{$data['lr_room']}</td>
                                                                                <td class='fs-12'>{$data['lr_floor']}</td>
                                                                                <td class='fs-10'>{$data['b_name']}</td>
                                                                                <td class='fs-12'>{$data['n_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$s} {$data['ls_name']}</td>
                                                                                <td class='fs-12 align-justify'>{$dataAssessment}</td>
                                                                            </tr>
                                                                        ";
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                                <?php
                                                }
                                        ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal" action="profile.php" method="POST">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">ชื่อ - นามสกุล TH</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="s_name_TH" placeholder="ชื่อ - นามสกุล" value="<?php echo $_SESSION['s_name_TH'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname2" class="col-sm-2 control-label">ชื่อ - นามสกุล EN</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname2" name="s_name_EN" placeholder="ชื่อ - นามสกุล" value="<?php echo $_SESSION['s_name_EN'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="s_position" class="col-sm-2 control-label">ตำแหน่ง</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_position" name="s_position" placeholder="Position" value="<?php echo $_SESSION['s_position'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="s_tel" class="col-sm-2 control-label">เบอร์ติดต่อ</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="s_tel" name="s_tel" placeholder="s_tel" value="<?php echo $_SESSION['s_tel'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger" name="update">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" action="profile.php" method="POST">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger" name="changePass">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
</body>

</html>
