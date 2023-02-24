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
    <?php
        $all = $notifiObj->countAll($_SESSION['year'],"tb_r_repair");
        $danger = $notifiObj->countNoSuccess($_SESSION['year'],"tb_r_repair");
        $success = $notifiObj->countStatus($_SESSION['year'],"tb_r_repair",8);
        $wait = $notifiObj->countStatus($_SESSION['year'],"tb_r_repair",7);
        $company = ($notifiObj->countStatus($_SESSION['year'],"tb_r_repair",6))+($notifiObj->countStatus($_SESSION['year'],"tb_r_repair",9));
        // $success = 200;
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>แจ้งซ่อมเครื่องคอมพิวเตอร์เจ้าหน้าที่</h2>
            </div>

            <!-- Widgets -->
            <div class="row">
                <a href="/repair-sci/pages/manage/r_repair.php?c=งานที่เรียบร้อย">    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-teal hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">done</i>
                            </div>
                            <div class="content">
                                <div class="text fs-18">งานที่เรียบร้อย</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $success;?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/repair-sci/pages/manage/r_repair.php?c=งานค้าง">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">devices</i>
                            </div>
                            <div class="content">
                                <div class="text fs-18">งานค้าง</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $danger;?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/repair-sci/pages/manage/r_repair.php?c=งานรออะไหล่">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-grey hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">schedule</i>
                            </div>
                            <div class="content">
                                <div class="text fs-18">งานรออะไหล่</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $wait;?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/repair-sci/pages/manage/r_repair.php?c=ส่งบริษัทซ่อม">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-blue-grey hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">monetization_on</i>
                            </div>
                            <div class="content">
                                <div class="text fs-18">ส่งบริษัทซ่อม / ซ่อมไม่คุ้ม</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $company;?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                if(isset($_GET['id'])){
                    $r_id =resive($_GET['id']);
                    $dataid = $repairObj->getRepairById($_SESSION['year'],"tb_r_repair",$r_id);
                    ?>
        <!-- กรณีมีการส่งค่า id มา-->
            <!-- Show data -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ใบงานที่ <?php echo $r_id;?>
                            </h2>
                            <div class="header-dropdown m-r--5">
                            </div>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="2%" scope="col">#</th>
                                        <th width="6%" scope="col">วันที่แจ้ง</th>
                                        <th width="34%" scope="col">รายละเอียด</th>
                                        <th width="8%" scope="col">ห้อง</th>
                                        <th width="3%" scope="col">ชั้น</th>
                                        <th width="12%" scope="col">อาคาร</th>
                                        <th width="8%" scope="col">ลักษณะงาน</th>
                                        <th width="10%" scope="col">ผู้แจ้ง</th>
                                        <th width="15%" scope="col">สถานะ</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        // print_r($dataid);
                                        $date_add = datethai($dataid['date_add']);
                                        $datefull = datethai_time($dataid['date_add']);
                                        $s = "";
                                        $dataSt1 = $comboboxObj->getDataStatusById("tb_r_status",$dataid['rs_id']);
                                        $dss['s_id'] = $dataSt1['rs_id']; 
                                        $dss['s_name'] = $dataSt1['rs_name']; 
                                        $das = statusIT($dss);
                                        $s = $das['bt'];
                                        $r_idl = sent($dataid['r_id']);
                                        echo "
                                            <tr>
                                                <th scope='row'>{$r_id}</th>
                                                <td class='fs-10 text-center'>{$datefull}</td>
                                                <td>{$dataid['rr_remark']}</td>
                                                <td class='fs-12'>{$dataid['rr_room']}</td>
                                                <td class='fs-12'>{$dataid['rr_floor']}</td>
                                                <td class='fs-10'>{$dataid['b_name']}</td>
                                                <td class='fs-12'>{$dataid['n_name']}</td>
                                                <td class='fs-12'>{$dataid['s_name_TH']}</td>
                                                <td class='fs-12 align-justify'>{$s} {$dataid['rs_name']}</td>
                                            </tr>
                                        ";
                                    
                                    ?>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ขั้นตอนการดำเนินการ -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ขั้นตอนการดำเนินงาน
                            </h2>
                            <div class="header-dropdown m-r--5">
                            
                            <button type="button" class="btn bg-red waves-effect m-r-20 m-t--10 fs-16 " data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add_circle_outline</i>
                                    <span>เพิ่ม</span></span></button>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="2%" scope="col">#</th>
                                            <th width="6%" scope="col">วันที่</th>
                                            <th width="50%" scope="col">รายละเอียด</th>
                                            <th width="" scope="col">ระยะเวลา</th>
                                            <th width="10%" scope="col">สถานะ</th>
                                            <th width="" scope="col">ผู้บันทึก</th>
                                            <th width="" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $dataSt = $repairObj->getDatastatusByRepair("tb_r_datastatus",$r_id);
                                            // print_r($dataSt);
                                            foreach($dataSt as $row){
                                                $date = datethai_time($row['ds_date']);
                                                $ds2['s_id'] = $row['rs_id'];
                                                $ds2['s_name'] = $row['rs_name'];
                                                $das2 = statusIT($ds2);
                                                ?>
                                                    <tr>
                                                        <th scope='row'><?php echo $row['ds_num'];?></th>
                                                        <td class='fs-10 text-center'><?php echo $date;?></td>
                                                        <td><?php echo $row['ds_remark'];?></td>
                                                        <td class=''><?php echo $row['ds_count_time'];?></td>
                                                        <td class=''><?php echo $das2['bt'];?> <?php echo $row['rs_name'];?></td>
                                                        <td class=''><i class='material-icons btn btn-xs'>person</i> <?php echo $row['s_name_TH'];?></td>
                                                        <td class=' align-justify'>
                                                            <button class="btn btn-xs btn-warning" onclick="myFunction(<?php echo $row['ds_id'];?>,'<?php echo $row['ds_remark'];?>')"><i class="material-icons fs-12">settings</i></button>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--  -->
                    <?php
                }else{
                    ?>
        <!-- กรณีไม่มีการส่งค่า id มา -->
        <!-- กรณีส่งค่า c มา สถานะที่ต้องการ -->
            <?php
                    if(isset($_GET['c'])){
                        ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                รายการแจ้งซ่อม <?php echo $_GET['c'];?>
                                <?php 
                                    // $year =$_SESSION['year'];
                                    // $table = "tb_e_repair";
                                    // $datar = $repairObj->getAllRepair($year,$table);
                                    // print_r($datar);
                                ?>
                            </h2>
                            <div class="header-dropdown m-r--5">
                               
                            </div>
                        </div>
                        <div class="body">
                        <div class="table table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="2%" scope="col">#</th>
                                            <th width="6%" scope="col">วันที่แจ้ง</th>
                                            <th width="" scope="col">รายละเอียด</th>
                                            <th width="8%" scope="col">ห้อง</th>
                                            <th width="3%" scope="col">ชั้น</th>
                                            <th width="12%" scope="col">อาคาร</th>
                                            <th width="8%" scope="col">ลักษณะงาน</th>
                                            <th width="10%" scope="col">ผู้แจ้ง</th>
                                            <th width="10%" scope="col">สถานะ</th>
                                            <th width="3" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            switch ($_GET['c']){
                                                case "งานที่เรียบร้อย":
                                                    $text_sql=" r.rs_id = 8";
                                                break;
                                                case "งานค้าง":
                                                    $text_sql=" (r.rs_id < 8 AND (r.rs_id <> 6 AND r.rs_id <> 7))";
                                                break;
                                                case "งานรออะไหล่":
                                                    $text_sql=" r.rs_id = 7";
                                                break;
                                                case "ส่งบริษัทซ่อม":
                                                    $text_sql=" (r.rs_id = 6 OR r.rs_id = 9)";
                                                break;
                                                default:
                                                    $text_sql=" r.rs_id < 99";
                                            }
                                            $datar = $repairObj->getRepairByStatus($_SESSION['year'],"tb_r_repair",$text_sql);
                                            $r = count($datar);
                                            if($r>0){
                                                // print_r($datar);
                                                $i = 0;
                                                $dss['s_id'] = ""; 
                                                $dss['s_name'] = ""; 
                                                foreach($datar as $data){
                                                    $i++;
                                                    $date_add = datethai($data['date_add']);
                                                    $datefull = datethai_time($data['date_add']);
                                                    $s = "";
                                                    $dataSt1 = $comboboxObj->getDataStatusById("tb_r_status",$data['rs_id']);
                                                    $dss['s_id'] = $dataSt1['rs_id']; 
                                                    $dss['s_name'] = $dataSt1['rs_name']; 
                                                    $das = statusIT($dss);
                                                    $s = $das['bt'];
                                                    $r_idl = sent($data['r_id']);
                                                    echo "
                                                        <tr>
                                                            <th scope='row'>{$i}</th>
                                                            <td class='fs-10 text-center'>{$datefull}</td>
                                                            <td>{$data['rr_remark']}</td>
                                                            <td class='fs-12'>{$data['rr_room']}</td>
                                                            <td class='fs-12'>{$data['rr_floor']}</td>
                                                            <td class='fs-10'>{$data['b_name']}</td>
                                                            <td class='fs-12'>{$data['n_name']}</td>
                                                            <td class='fs-12'>{$data['s_name_TH']}</td>
                                                            <td class='fs-12 align-justify'>{$s} {$data['rs_name']}</td>
                                                            <td class=' align-justify'>
                                                                <a href='/repair-sci/pages/manage/r_repair.php?id={$r_idl}'>
                                                                    <i class='material-icons'>settings</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    ";
                                                }
                                            }
                                            
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
                        <?php 
                    }else{
                ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                รายการแจ้งซ่อมทั้งหมด
                                <?php 
                                    // $year =$_SESSION['year'];
                                    // $table = "tb_e_repair";
                                    // $datar = $repairObj->getAllRepair($year,$table);
                                    // print_r($datar);
                                ?>
                            </h2>
                            <div class="header-dropdown m-r--5">
                               
                            </div>
                        </div>
                        <div class="body">
                        <div class="table table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="2%" scope="col">#</th>
                                            <th width="6%" scope="col">วันที่แจ้ง</th>
                                            <th width="" scope="col">รายละเอียด</th>
                                            <th width="8%" scope="col">ห้อง</th>
                                            <th width="3%" scope="col">ชั้น</th>
                                            <th width="12%" scope="col">อาคาร</th>
                                            <th width="8%" scope="col">ลักษณะงาน</th>
                                            <th width="10%" scope="col">ผู้แจ้ง</th>
                                            <th width="10%" scope="col">สถานะ</th>
                                            <th width="3" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $datar = $repairObj->getAllRepair($_SESSION['year'],"tb_r_repair");
                                            $r = count($datar);
                                            if($r>0){
                                                // print_r($datar);
                                                $i = 0;
                                                $dss['s_id'] = ""; 
                                                $dss['s_name'] = ""; 
                                                foreach($datar as $data){
                                                    $i++;
                                                    $date_add = datethai($data['date_add']);
                                                    $datefull = datethai_time($data['date_add']);
                                                    $s = "";
                                                    $dataSt1 = $comboboxObj->getDataStatusById("tb_r_status",$data['rs_id']);
                                                    $dss['s_id'] = $dataSt1['rs_id']; 
                                                    $dss['s_name'] = $dataSt1['rs_name']; 
                                                    $das = statusIT($dss);
                                                    $s = $das['bt'];
                                                    $r_idl = sent($data['r_id']);
                                                    echo "
                                                        <tr>
                                                            <th scope='row'>{$i}</th>
                                                            <td class='fs-10 text-center'>{$datefull}</td>
                                                            <td>{$data['rr_remark']}</td>
                                                            <td class='fs-12'>{$data['rr_room']}</td>
                                                            <td class='fs-12'>{$data['rr_floor']}</td>
                                                            <td class='fs-10'>{$data['b_name']}</td>
                                                            <td class='fs-12'>{$data['n_name']}</td>
                                                            <td class='fs-12'>{$data['s_name_TH']}</td>
                                                            <td class='fs-12 align-justify'>{$s} {$data['rs_name']}</td>
                                                            <td class=' align-justify'>
                                                                <a href='/repair-sci/pages/manage/r_repair.php?id={$r_idl}'>
                                                                    <i class='material-icons'>settings</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    ";
                                                }
                                            }
                                            
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <?php
                    }
                }
            ?>
        </div>
    </section>
   <!-- modal เพิ่มการดำเนินการ -->
   <?php
        if(isset($_GET['id'])){
            $r_id =resive($_GET['id']);
            $dataid = $repairObj->getRepairById($_SESSION['year'],"tb_r_repair",$r_id);
            ?>
            <!-- defaultModal -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">ข้อมูลการดำเนินงาน สถานะแจ้งซ่อม <?php echo $dataid['rs_id'];?></h4>
                        </div>
                        <form id="add" action="m_save.php" method="post">
                            <div class="modal-body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p>
                                            <b>สถานะการดำเนินงาน</b> 
                                        </p>
                                        <select class="form-control show-tick" name="s_id">
                                            <?php
                                                $datast2 = $comboboxObj->getStatusManage("tb_r_status",$dataid['rs_id']);
                                                foreach($datast2 as $st){
                                                    echo "
                                                        <option value='{$st['rs_id']}'>{$st['rs_name']}</option>
                                                    ";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p>
                                            <b>รายละเอียด</b>
                                        </p>
                                        <div class="input-group">
                                            <div class="form-line">
                                                <textarea class="form-control" id="ds_remark" rows="3" name="ds_remark" ></textarea>
                                                <input type="hidden" class="form-control" id="r_id" value="<?php echo $r_id;?>" name="r_id" required readonly>
                                                <input type="hidden" class="form-control" id="table" value="tb_r_datastatus" name="table" required readonly>
                                                <input type="hidden" class="form-control" id="action" value="add" name="action" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                <button type="submit" class="btn btn-primary waves-effect" >บันทึก</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    <!-- modal แก้ไขรายละเอียดขั้นตอนการดำเนินงาน -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">ข้อมูลการดำเนินงาน แก้ไข </h4>
                </div>
                <form id="add" action="m_save.php" method="post">
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <p>
                                    <b>รายละเอียด</b>
                                </p>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea class="form-control" id="rds_remark" rows="3" name="ds_remark" ></textarea>
                                        <input type="hidden" class="form-control" id="st_id" value="<?php echo $_SESSION['s_id'];?>" name="s_id" required readonly>
                                        <input type="hidden" class="form-control" id="r_id" value="<?php echo resive($_GET['id']);?>" name="r_id" required readonly>
                                        <input type="hidden" class="form-control" id="ds_id"  name="ds_id" required readonly>
                                        <input type="hidden" class="form-control" id="table" value="tb_r_datastatus" name="table" required readonly>
                                        <input type="hidden" class="form-control" id="action" value="edit" name="action" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary waves-effect" >บันทึก</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
    <script>
        $('#defaultModal').on('shown.bs.modal', function () {
            $('#ds_remark').focus();
        });
    </script>
    <script>
        function myFunction(id,re) {
            $('#editModal').modal('show');
            // document.getElementById("demo").style.color = "red";
            var ds =  document.getElementById("ds_id");
            var remark = document.getElementById("rds_remark");
            ds.value = id;
            remark.value = re;
        }
    </script>
</body>

</html>