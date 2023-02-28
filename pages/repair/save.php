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

    <section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <?php $year_term = yearterm(date('Y-m-d')); ?>
                <h2>กำลังบันทึกข้อมูล...</h2>
            </div> -->
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
// print_r($_REQUEST);
// echo $_REQUEST['form_name'];
echo "
    ระบบกำลังดำเนินการ...
    <div class='preloader pl-size-xs'>
        <div class='spinner-layer'>
            <div class='circle-clipper left'>
                <div class='circle'></div>
            </div>
            <div class='circle-clipper right'>
                <div class='circle'></div>
            </div>
        </div>
    </div>
";
switch ($_REQUEST['form_name']){
    case "electricity" :
        $data['er_year_term']=$_POST['year_term'];
        $data['date_add']=date("Y-m-d H:i:s");
        $data['s_id']=$_SESSION['s_id'];
        $data['er_tel']=$_POST['tel'];
        $data['er_room']=$_POST['room'];
        $data['er_floor']=$_POST['floor'];
        $data['b_id']=$_POST['b_id'];
        $data['et_id']=$_POST['t_id'];
        $data['er_remark']=$_POST['r_remark'];
        $data['es_id']=1;
        $data['n_id']=$_POST['n_id'];
        // print_r($data);
        $r_id = $repairObj->addRepair($data,"tb_e_repair");
        // echo $r_id;
        $dataStatus['r_id']=$r_id;
        $dataStatus['es_id']=1;
        $dataStatus['ds_remark']="แจ้งซ่อม";
        $dataStatus['ds_num']=1;
        $dataStatus['ds_date']=date("Y-m-d H:i:s");
        $dataStatus['ds_count_time']="เริ่มจับเวลา";
        $dataStatus['s_id']=$_SESSION['s_id'];
        // print_r($dataStatus);
        $ck = $repairObj->addDatastatus($dataStatus,"tb_e_datastatus");
        if($ck){
            $bdata = $comboboxObj->getBuildingById($_POST['b_id']);
            $_POST['b_name'] = $bdata['b_name'];
            SentLine("building",$_POST,"ไฟฟ้าและประปา");
            $mes="บันทึกข้อมูลเรียบร้อย";
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
                    setTimeout(function(){location.href='/repair-sci/pages/repair/electricity.php'} , 1000);
                </script>
            ";
        }
        break;
    case "air" :
        $data['ar_year_term']=$_POST['year_term'];
        $data['date_add']=date("Y-m-d H:i:s");
        $data['s_id']=$_SESSION['s_id'];
        $data['ar_tel']=$_POST['tel'];
        $data['ar_room']=$_POST['room'];
        $data['ar_floor']=$_POST['floor'];
        $data['b_id']=$_POST['b_id'];
        $data['ar_remark']=$_POST['r_remark'];
        $data['as_id']=1;
        $data['n_id']=$_POST['n_id'];
        // print_r($data);
        $r_id = $repairObj->addRepair($data,"tb_a_repair");
        // echo $r_id;
        $dataStatus['r_id']=$r_id;
        $dataStatus['as_id']=1;
        $dataStatus['ds_remark']="แจ้งซ่อม";
        $dataStatus['ds_num']=1;
        $dataStatus['ds_date']=date("Y-m-d H:i:s");
        $dataStatus['ds_count_time']="เริ่มจับเวลา";
        $dataStatus['s_id']=$_SESSION['s_id'];
        // print_r($dataStatus);
        $ck = $repairObj->addDatastatus($dataStatus,"tb_a_datastatus");
        if($ck){
            $bdata = $comboboxObj->getBuildingById($_POST['b_id']);
            $_POST['b_name'] = $bdata['b_name'];
            SentLine("building",$_POST,"เครื่องปรับอากาศ");
            $mes="บันทึกข้อมูลเรียบร้อย";
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
                    setTimeout(function(){location.href='/repair-sci/pages/repair/air.php'} , 1000);
                </script>
            ";
        }
        break;
    case "computer" :
        $data['cr_year_term']=$_POST['year_term'];
        $data['date_add']=date("Y-m-d H:i:s");
        $data['s_id']=$_SESSION['s_id'];
        $data['cr_tel']=$_POST['tel'];
        $data['cr_room']=$_POST['room'];
        $data['cr_floor']=$_POST['floor'];
        $data['b_id']=$_POST['b_id'];
        $data['cr_remark']=$_POST['r_remark'];
        $data['cs_id']=1;
        $data['n_id']=$_POST['n_id'];
        // print_r($data);
        $r_id = $repairObj->addRepair($data,"tb_c_repair");
        // echo $r_id;
        $dataStatus['r_id']=$r_id;
        $dataStatus['cs_id']=1;
        $dataStatus['ds_remark']="แจ้งซ่อม";
        $dataStatus['ds_num']=1;
        $dataStatus['ds_date']=date("Y-m-d H:i:s");
        $dataStatus['ds_count_time']="เริ่มจับเวลา";
        $dataStatus['s_id']=$_SESSION['s_id'];
        // print_r($dataStatus);
        $ck = $repairObj->addDatastatus($dataStatus,"tb_c_datastatus");
        if($ck){
            $bdata = $comboboxObj->getBuildingById($_POST['b_id']);
            $_POST['b_name'] = $bdata['b_name'];
            SentLine("computer",$_POST,"ศักดา ตราช่าง");
            $mes="บันทึกข้อมูลเรียบร้อย";
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
                    setTimeout(function(){location.href='/repair-sci/pages/repair/computer.php'} , 1000);
                </script>
            ";
        }
        break;
    case "room" :
        $data['rr_year_term']=$_POST['year_term'];
        $data['date_add']=date("Y-m-d H:i:s");
        $data['s_id']=$_SESSION['s_id'];
        $data['rr_tel']=$_POST['tel'];
        $data['rr_room']=$_POST['room'];
        $data['rr_floor']=$_POST['floor'];
        $data['b_id']=$_POST['b_id'];
        $data['rr_remark']=$_POST['r_remark'];
        $data['rs_id']=1;
        $data['n_id']=$_POST['n_id'];
        // print_r($data);
        $r_id = $repairObj->addRepair($data,"tb_r_repair");
        // echo $r_id;
        $dataStatus['r_id']=$r_id;
        $dataStatus['rs_id']=1;
        $dataStatus['ds_remark']="แจ้งซ่อม";
        $dataStatus['ds_num']=1;
        $dataStatus['ds_date']=date("Y-m-d H:i:s");
        $dataStatus['ds_count_time']="เริ่มจับเวลา";
        $dataStatus['s_id']=$_SESSION['s_id'];
        // print_r($dataStatus);
        $ck = $repairObj->addDatastatus($dataStatus,"tb_r_datastatus");
        if($ck){
            $bdata = $comboboxObj->getBuildingById($_POST['b_id']);
            $_POST['b_name'] = $bdata['b_name'];
            SentLine("room",$_POST,"สุรเดช คุรุภัณฑ์");
            $mes="บันทึกข้อมูลเรียบร้อย";
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
                    setTimeout(function(){location.href='/repair-sci/pages/repair/room.php'} , 1000);
                </script>
            ";
        }
        break;
    case "lab" :
        $data['lr_year_term']=$_POST['year_term'];
        $data['date_add']=date("Y-m-d H:i:s");
        $data['s_id']=$_SESSION['s_id'];
        $data['lr_tel']=$_POST['tel'];
        $data['lr_room']=$_POST['room'];
        $data['lr_floor']=$_POST['floor'];
        $data['b_id']=$_POST['b_id'];
        $data['lr_remark']=$_POST['r_remark'];
        $data['ls_id']=1;
        $data['n_id']=$_POST['n_id'];
        // print_r($data);
        $r_id = $repairObj->addRepair($data,"tb_l_repair");
        // echo $r_id;
        $dataStatus['r_id']=$r_id;
        $dataStatus['ls_id']=1;
        $dataStatus['ds_remark']="แจ้งซ่อม";
        $dataStatus['ds_num']=1;
        $dataStatus['ds_date']=date("Y-m-d H:i:s");
        $dataStatus['ds_count_time']="เริ่มจับเวลา";
        $dataStatus['s_id']=$_SESSION['s_id'];
        // print_r($dataStatus);
        $ck = $repairObj->addDatastatus($dataStatus,"tb_l_datastatus");
        if($ck){
            $bdata = $comboboxObj->getBuildingById($_POST['b_id']);
            $_POST['b_name'] = $bdata['b_name'];
            SentLine("lab",$_POST,"พงษ์พันธ์ ขุนทอง");
            $mes="บันทึกข้อมูลเรียบร้อย";
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
                    setTimeout(function(){location.href='/repair-sci/pages/repair/lab.php'} , 1000);
                </script>
            ";
        }
        break;
}

?>
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
 
 </body>
 
 </html>
 