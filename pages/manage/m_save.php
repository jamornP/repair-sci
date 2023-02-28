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

    echo "
        กำลังประมวลผล...
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
    // print_r($_REQUEST);
    if(isset($_POST['action'])){
        if($_POST['action']=="add"){
            $table = $_POST['table'];
            // echo "<br>".$_POST['r_id'];
            $num = $comboboxObj->getDataStatusByRepair($table,$_POST['r_id']);
            // echo $num['ds_num'];
            switch ($table){
                case "tb_e_datastatus":
                    $data['r_id']=$_POST['r_id'];
                    $data['es_id']=$_POST['s_id'];
                    $data['ds_remark']=$_POST['ds_remark'];
                    $data['ds_num']=$num['ds_num']+1;
                    $data['ds_date']=date("Y-m-d H:i:s");
                    $data['ds_count_time']=time_dif_TH($num['ds_date'],$data['ds_date']);
                    $data['s_id']=$_SESSION['s_id'];
                    // print_r($data);
                    $datau['r_id']=$_POST['r_id'];
                    $datau['es_id']=$_POST['s_id'];
                    // print_r($datau);
                    $ck = $repairObj->addDatastatus($data,$table);
                    $r_idl = sent($_POST['r_id']);
                    if($ck){
                        $cku = $repairObj->updateStatusRepair($datau,"tb_e_repair");
                        if($cku){
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
                                    setTimeout(function(){location.href='/repair-sci/pages/manage/e_repair.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                    }
                break;
                case "tb_a_datastatus":
                    $data['r_id']=$_POST['r_id'];
                    $data['as_id']=$_POST['s_id'];
                    $data['ds_remark']=$_POST['ds_remark'];
                    $data['ds_num']=$num['ds_num']+1;
                    $data['ds_date']=date("Y-m-d H:i:s");
                    $data['ds_count_time']=time_dif_TH($num['ds_date'],$data['ds_date']);
                    $data['s_id']=$_SESSION['s_id'];
                    // print_r($data);
                    $datau['r_id']=$_POST['r_id'];
                    $datau['as_id']=$_POST['s_id'];
                    // print_r($datau);
                    $ck = $repairObj->addDatastatus($data,$table);
                    $r_idl = sent($_POST['r_id']);
                    if($ck){
                        $cku = $repairObj->updateStatusRepair($datau,"tb_a_repair");
                        if($cku){
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
                                    setTimeout(function(){location.href='/repair-sci/pages/manage/a_repair.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                    }
                break;
                case "tb_c_datastatus":
                    $data['r_id']=$_POST['r_id'];
                    $data['cs_id']=$_POST['s_id'];
                    $data['ds_remark']=$_POST['ds_remark'];
                    $data['ds_num']=$num['ds_num']+1;
                    $data['ds_date']=date("Y-m-d H:i:s");
                    $data['ds_count_time']=time_dif_TH($num['ds_date'],$data['ds_date']);
                    $data['s_id']=$_SESSION['s_id'];
                    // print_r($data);
                    $datau['r_id']=$_POST['r_id'];
                    $datau['cs_id']=$_POST['s_id'];
                    // print_r($datau);
                    $ck = $repairObj->addDatastatus($data,$table);
                    $r_idl = sent($_POST['r_id']);
                    if($ck){
                        $cku = $repairObj->updateStatusRepair($datau,"tb_c_repair");
                        if($cku){
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
                                    setTimeout(function(){location.href='/repair-sci/pages/manage/c_repair.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                    }
                break;
                case "tb_r_datastatus":
                    $data['r_id']=$_POST['r_id'];
                    $data['rs_id']=$_POST['s_id'];
                    $data['ds_remark']=$_POST['ds_remark'];
                    $data['ds_num']=$num['ds_num']+1;
                    $data['ds_date']=date("Y-m-d H:i:s");
                    $data['ds_count_time']=time_dif_TH($num['ds_date'],$data['ds_date']);
                    $data['s_id']=$_SESSION['s_id'];
                    // print_r($data);
                    $datau['r_id']=$_POST['r_id'];
                    $datau['rs_id']=$_POST['s_id'];
                    // print_r($datau);
                    $ck = $repairObj->addDatastatus($data,$table);
                    $r_idl = sent($_POST['r_id']);
                    if($ck){
                        $cku = $repairObj->updateStatusRepair($datau,"tb_r_repair");
                        if($cku){
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
                                    setTimeout(function(){location.href='/repair-sci/pages/manage/r_repair.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                    }

                break;
                case "tb_l_datastatus":
                    $data['r_id']=$_POST['r_id'];
                    $data['ls_id']=$_POST['s_id'];
                    $data['ds_remark']=$_POST['ds_remark'];
                    $data['ds_num']=$num['ds_num']+1;
                    $data['ds_date']=date("Y-m-d H:i:s");
                    $data['ds_count_time']=time_dif_TH($num['ds_date'],$data['ds_date']);
                    $data['s_id']=$_SESSION['s_id'];
                    // print_r($data);
                    $datau['r_id']=$_POST['r_id'];
                    $datau['ls_id']=$_POST['s_id'];
                    // print_r($datau);
                    $ck = $repairObj->addDatastatus($data,$table);
                    $r_idl = sent($_POST['r_id']);
                    if($ck){
                        $cku = $repairObj->updateStatusRepair($datau,"tb_l_repair");
                        if($cku){
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
                                    setTimeout(function(){location.href='/repair-sci/pages/manage/l_repair.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                    }

                break;
            }
            
        }
        if($_POST['action']=="edit"){
            $table = $_POST['table'];
            // print_r($_REQUEST);
            switch ($table){
                case "tb_e_datastatus":
                    // $data['r_id']=$_POST['r_id'];
                    $data['ds_id']=$_POST['ds_id'];
                    $data['ds_remark']=$_POST['ds_remark'];
                    $data['s_id']=$_SESSION['s_id'];
                    // print_r($data);
                    $ck = $repairObj->editDatastatus($data,$table);
                    $r_idl = sent($_POST['r_id']);
                    if($ck){
                        $mes="แก้ไขข้อมูลเรียบร้อย";
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
                                setTimeout(function(){location.href='/repair-sci/pages/manage/e_repair.php?id={$r_idl}'} , 1000);
                            </script>
                        ";
                    }
                break;
                case "tb_a_datastatus":
                        // $data['r_id']=$_POST['r_id'];
                        $data['ds_id']=$_POST['ds_id'];
                        $data['ds_remark']=$_POST['ds_remark'];
                        $data['s_id']=$_SESSION['s_id'];
                        // print_r($data);
                        $ck = $repairObj->editDatastatus($data,$table);
                        $r_idl = sent($_POST['r_id']);
                        if($ck){
                            $mes="แก้ไขข้อมูลเรียบร้อย";
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
                                    setTimeout(function(){location.href='/repair-sci/pages/manage/a_repair.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                break;
                case "tb_c_datastatus":
                        // $data['r_id']=$_POST['r_id'];
                        $data['ds_id']=$_POST['ds_id'];
                        $data['ds_remark']=$_POST['ds_remark'];
                        $data['s_id']=$_SESSION['s_id'];
                        // print_r($data);
                        $ck = $repairObj->editDatastatus($data,$table);
                        $r_idl = sent($_POST['r_id']);
                        if($ck){
                            $mes="แก้ไขข้อมูลเรียบร้อย";
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
                                    setTimeout(function(){location.href='/repair-sci/pages/manage/c_repair.php?id={$r_idl}'} , 1000);
                                </script>
                            ";
                        }
                break;
                case "tb_r_datastatus":
                          // $data['r_id']=$_POST['r_id'];
                          $data['ds_id']=$_POST['ds_id'];
                          $data['ds_remark']=$_POST['ds_remark'];
                          $data['s_id']=$_SESSION['s_id'];
                          // print_r($data);
                          $ck = $repairObj->editDatastatus($data,$table);
                          $r_idl = sent($_POST['r_id']);
                          if($ck){
                              $mes="แก้ไขข้อมูลเรียบร้อย";
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
                                      setTimeout(function(){location.href='/repair-sci/pages/manage/r_repair.php?id={$r_idl}'} , 1000);
                                  </script>
                              ";
                          }
                break;
                case "tb_l_datastatus":
                          // $data['r_id']=$_POST['r_id'];
                          $data['ds_id']=$_POST['ds_id'];
                          $data['ds_remark']=$_POST['ds_remark'];
                          $data['s_id']=$_SESSION['s_id'];
                          // print_r($data);
                          $ck = $repairObj->editDatastatus($data,$table);
                          $r_idl = sent($_POST['r_id']);
                          if($ck){
                              $mes="แก้ไขข้อมูลเรียบร้อย";
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
                                      setTimeout(function(){location.href='/repair-sci/pages/manage/l_repair.php?id={$r_idl}'} , 1000);
                                  </script>
                              ";
                          }
                break;
            }
        }
    }
?>
<?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
 
 </body>
 
 </html>
 