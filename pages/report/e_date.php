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
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/link-css.php"; ?>
</head>

<body class="theme-deep-orange font-kanit">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/page-loader.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/navbar.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/s-left-right.php"; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>DASHBOARD</h2> -->
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- <div class="header">
                            <h2>
                                รายงานแจ้งซ่อมไฟฟ้าและประปา
                            </h2>
                            <div class="header-dropdown m-r--5">
                            </div>
                        </div> -->
                        <div class="body">
                            <div class="row clearfix">
                                <form action="" method="POST">
                                    <!-- <div class="row"> -->
                                    <?php
                                    // if ($_SESSION['sts_id'] < 7) {
                                    ?>
                                        <div class="col-sm-10 col-md-10 col-xl-6">
                                            <h2 class="card-inside-title">รายงานแจ้งซ่อม</h2>
                                            <select class="form-control show-tick" tabindex="-98" name="table">
                                                <option value="">-- เลือก --</option>
                                                <?php
                                                $staffMenu = $menuObj->getMenuByStaff($_SESSION['s_id']);
                                                $a = count($staffMenu);
                                                if ($a > 0) {
                                                    foreach ($staffMenu as $smenu) {
                                                        $selected =($smenu['m_table']==$_POST['table']?"selected":"");
                                                        echo "
                                                            <option value='{$smenu['m_table']}' {$selected}>{$smenu['m_name']}</option>
                                                            ";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <?php
                                    // } else {
                                    //     $_POST['table'] = "tb_e_repair";
                                    // }
                                    ?>
                                    <!-- </div> -->
                                    <?php 
                                    $dateS=(isset($_POST['dateS'])?$_POST['dateS']:"");
                                    $dateE=(isset($_POST['dateE'])?$_POST['dateE']:"");
                                    ?>
                                    <div class="col-sm-10 col-md-10 col-xl-6">
                                        <h2 class="card-inside-title">ระหว่างวันที่</h2>
                                        <div class="input-daterange input-group">
                                            <div class="form-line">
                                                <input type="text" id="datepicker" class="form-control" placeholder="วันที่เริ่ม" name="dateS" autocomplete="off" value="<?php echo $dateS;?>">
                                            </div>
                                            <span class="input-group-addon">ถึง</span>
                                            <div class="form-line">
                                                <input type="text" id="datepicker2" class="form-control" placeholder="วันที่สิ้นสุด" name="dateE" autocomplete="off" value="<?php echo $dateE;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2 col-xl-2">
                                        <button type="submit" class="btn bg-deep-purple waves-effec">
                                            <i class="material-icons">search</i><br>
                                            <span class="fs-16">ค้นหา</span>
                                        </button>
                                    </div>
                                </form>
                                <!-- รายงานตามประเภท เฉพาะไฟฟ้าและประปรา -->
                                <?php
                                if ((isset($_POST['dateS']) and isset($_POST['dateE'])) AND ($_POST['dateS']<>"" OR $_POST['dateE']<>"")) {
                                    $dateth = datethai($_POST['dateS']) . " - " . datethai($_POST['dateE']);
                                    if ($_POST['table'] == "tb_e_repair") {
                                    ?>
                                        <div class="col-sm- 12 col-md-12 col-xl-4">
                                            <div class="table-responsive">
                                                <h4>
                                                    <?php

                                                    echo "รายการแจ้งซ่อมไฟฟ้าและประปา ระหว่างวันที่ " . $dateth;
                                                    ?>
                                                </h4>
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr class="bg-pink">
                                                            <th width="4%"></th>
                                                            <th width="">ประเภท</th>
                                                            <?php
                                                            // $datas = $comboboxObj->getDataStatus("tb_e_status");
                                                            // foreach ($datas as $s) {
                                                            //     // สี
                                                            //     $st['s_id']=$s['es_id'];
                                                            //     $st['s_name']=$s['es_name'];
                                                            //     $color_bg = statusRepair($st);
                                                            //     $color = $color_bg['color'];
                                                            //     //
                                                            //     echo "
                                                            //         <th width='8%' class='text-center {$color}'>{$s['es_name']}</th>
                                                            //     ";
                                                            // }
                                                            ?>
                                                            <th width="8%" class='text-center'>แจ้งซ่อม</th>
                                                            <th width="8%" class='text-center'>เรียบร้อย</th>
                                                            <th width="8%" class='text-center'>งานค้าง</th>
                                                            <th width="8%" class='text-center'>รออะไหล่</th>
                                                            <th width="8%" class='text-center'>จ้างเหมา</th>
                                                            <th width="8%" class='text-center'>รอตรวจสอบ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $data = $comboboxObj->getType();
                                                        $datas = $comboboxObj->getDataStatus("tb_e_status");
                                                        foreach ($data as $d) {
                                                            echo "
                                                            <tr>
                                                                <th scope='row'>{$d['et_id']}</th>
                                                                <td>{$d['et_name']}</td> ";
                                                            $d1 = 0;
                                                            $d2 = 0;
                                                            $d3 = 0;
                                                            $d4 = 0;
                                                            $d5 = 0;
                                                            $d6 = 0;
                                                            foreach ($datas as $s) {
                                                                $sqlD = " (date_add BETWEEN '{$_POST['dateS']} 00:00:00' AND '{$_POST['dateE']} 23:59:59')";
                                                                $countS = $notifiObj->countStatusR($_SESSION['year'], "tb_e_repair", $d['et_id'], $s['es_id'], $sqlD);
                                                                $d1 += $countS;
                                                                if ($s['es_id'] <= 6) {
                                                                    $d3 += $countS;
                                                                }
                                                                if ($s['es_id'] == 8) {
                                                                    $d2 += $countS;
                                                                }
                                                                if ($s['es_id'] == 9) {
                                                                    $d4 = $countS;
                                                                }
                                                                if ($s['es_id'] == 10) {
                                                                    $d5 = $countS;
                                                                }
                                                                if ($s['es_id'] == 7) {
                                                                    $d6 = $countS;
                                                                }
                                                                echo "
                                                                
                                                            ";
                                                            }
                                                            echo "
                                                            <td class='text-center'>{$d1}</td>
                                                            <td class='text-center'>{$d2}</td>
                                                            <td class='text-center'>{$d3}</td>
                                                            <td class='text-center'>{$d4}</td>
                                                            <td class='text-center'>{$d5}</td>
                                                            <td class='text-center'>{$d6}</td>
                                                            </tr>
                                                        ";
                                                        }
                                                        ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                <?php 
                                        }
                                } ?>
                                <!-- //เฉพาะไฟฟ้าและประปรา -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- export Excel -->
            <?php
            if (isset($_POST['dateS']) and isset($_POST['dateE']) AND ($_POST['dateS']<>"" OR $_POST['dateE']<>"")) {
                $table = $_POST['table'];
                switch ($table) {
                    case "tb_e_repair":
                        $title = "รายการแจ้งซ่อมไฟฟ้าและประปา ระหว่างวันที่ " . $dateth;
                        $table2 ="tb_e_datastatus";
                        $table3 ="tb_e_status";
                        break;
                    case "tb_a_repair":
                        $title = "รายการแจ้งซ่อมเครื่องปรับอากาศ ระหว่างวันที่ " . $dateth;
                        $table2 ="tb_a_datastatus";
                        $table3 ="tb_a_status";
                        break;
                    case "tb_c_repair":
                        $title = "รายการแจ้งซ่อมเครื่องคอมพิวเตอร์เจ้าหน้าที่ ระหว่างวันที่ " . $dateth;
                        $table2 ="tb_c_datastatus";
                        $table3 ="tb_c_status";
                        break;
                    case "tb_r_repair":
                        $title = "รายการแจ้งซ่อมเครื่องคอมพิวเตอร์ห้องเรียน ระหว่างวันที่ " . $dateth;
                        $table2 ="tb_r_datastatus";
                        $table3 ="tb_r_status";
                        break;
                    case "tb_l_repair":
                        $title = "รายการแจ้งซ่อมเครื่องคอมพิวเตอร์ห้อง LAB  ระหว่างวันที่ " . $dateth;
                        $table2 ="tb_l_datastatus";
                        $table3 ="tb_l_status";
                        break;
                }
                ?>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    <?php echo $title; ?>
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">

                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr class="bg-blue">
                                                <th width="2%" scope="col">#</th>
                                                <th width="6%" scope="col">วันที่แจ้ง</th>
                                                <th width="" scope="col">รายละเอียด</th>
                                                <th width="8%" scope="col">ห้อง</th>
                                                <th width="3%" scope="col">ชั้น</th>
                                                <th width="12%" scope="col">อาคาร</th>
                                                <?php if($table =="tb_e_repair"){?>
                                                    <th width="8%" scope="col">ประเถท</th>
                                                <?php }?>
                                                <th width="8%" scope="col">ลักษณะงาน</th>
                                                <th width="10%" scope="col">ผู้แจ้ง</th>
                                                <th width="10%" scope="col">สถานะ</th>
                                                <th width="10%" scope="col">ใช้เวลา</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $sqlD = " (date_add BETWEEN '{$_POST['dateS']} 00:00:00' AND '{$_POST['dateE']} 23:59:59')";
                                            $datar = $repairObj->getRepairByDate($_SESSION['year'], $table, $sqlD);
                                            $r = count($datar);
                                            if ($r > 0) {
                                                // print_r($datar);
                                                $i = 0;
                                                $dss['s_id'] = "";
                                                $dss['s_name'] = "";
                                                foreach ($datar as $data) {
                                                    $i++;
                                                    $date_add = datethai($data['date_add']);
                                                    $datefull = datethai_time($data['date_add']);
                                                    $s = "";
                                                    $r_data = $comboboxObj->getDataStatusByRepair2($table2, $data['r_id']);
                                                    $crow = count($r_data)-1;
                                                    $countDs = $r_data[0]['ds_date'];
                                                    $countDe = $r_data[$crow]['ds_date'];
                                                    $timeCount = time_dif_TH($countDs,$countDe);
                                                    // 
                                                    switch ($table){
                                                        case "tb_e_repair":
                                                            foreach ($r_data as $datas) {
                                                                $dataSt1 = $comboboxObj->getDataStatusById($table3, $datas['es_id']);
                                                                $dss['s_id'] = $dataSt1['es_id'];
                                                                if ($datas['ds_remark'] == "") {
                                                                    $dss['s_name'] = $dataSt1['es_name'];
                                                                } else {
                                                                    $dss['s_name'] = $datas['ds_remark'];
                                                                }
                                                                $das = statusRepair($dss);
                                                                $s = $s . "" . $das['bt'];
                                                            }

                                                            echo "
                                                                <tr>
                                                                    <th scope='row'>{$data['r_id']}</th>
                                                                    <td class='fs-10 text-center'>{$datefull}</td>
                                                                    <td>{$data['er_remark']}</td>
                                                                    <td class='fs-12'>{$data['er_room']}</td>
                                                                    <td class='fs-12'>{$data['er_floor']}</td>
                                                                    <td class='fs-10'>{$data['b_name']}</td>
                                                                    <td class='fs-12'>{$data['et_name']}</td>
                                                                    <td class='fs-12'>{$data['n_name']}</td>
                                                                    <td class='fs-12'>{$data['s_name_TH']}</td>
                                                                    <td class='fs-12 align-justify'>{$data['es_name']}</td>
                                                                    <td class='fs-12 align-justify'>{$timeCount}</td>
                                                                
                                                                </tr>
                                                            ";
                                                        break;
                                                        case "tb_a_repair":
                                                            foreach ($r_data as $datas) {
                                                                $dataSt1 = $comboboxObj->getDataStatusById($table3, $datas['as_id']);
                                                                $dss['s_id'] = $dataSt1['as_id'];
                                                                if ($datas['ds_remark'] == "") {
                                                                    $dss['s_name'] = $dataSt1['as_name'];
                                                                } else {
                                                                    $dss['s_name'] = $datas['ds_remark'];
                                                                }
                                                                $das = statusRepair($dss);
                                                                $s = $s . "" . $das['bt'];
                                                            }

                                                            echo "
                                                                <tr>
                                                                    <th scope='row'>{$data['r_id']}</th>
                                                                    <td class='fs-10 text-center'>{$datefull}</td>
                                                                    <td>{$data['ar_remark']}</td>
                                                                    <td class='fs-12'>{$data['ar_room']}</td>
                                                                    <td class='fs-12'>{$data['ar_floor']}</td>
                                                                    <td class='fs-10'>{$data['b_name']}</td>
                                                                    <td class='fs-12'>{$data['n_name']}</td>
                                                                    <td class='fs-12'>{$data['s_name_TH']}</td>
                                                                    <td class='fs-12 align-justify'>{$data['as_name']}</td>
                                                                    <td class='fs-12 align-justify'>{$timeCount}</td>
                                                                </tr>
                                                            ";
                                                        break;
                                                        case "tb_c_repair":
                                                            foreach ($r_data as $datas) {
                                                                $dataSt1 = $comboboxObj->getDataStatusById($table3, $datas['cs_id']);
                                                                $dss['s_id'] = $dataSt1['cs_id'];
                                                                if ($datas['ds_remark'] == "") {
                                                                    $dss['s_name'] = $dataSt1['cs_name'];
                                                                } else {
                                                                    $dss['s_name'] = $datas['ds_remark'];
                                                                }
                                                                $das = statusRepair($dss);
                                                                $s = $s . "" . $das['bt'];
                                                            }

                                                            echo "
                                                                <tr>
                                                                    <th scope='row'>{$data['r_id']}</th>
                                                                    <td class='fs-10 text-center'>{$datefull}</td>
                                                                    <td>{$data['cr_remark']}</td>
                                                                    <td class='fs-12'>{$data['cr_room']}</td>
                                                                    <td class='fs-12'>{$data['cr_floor']}</td>
                                                                    <td class='fs-10'>{$data['b_name']}</td>
                                                                    <td class='fs-12'>{$data['n_name']}</td>
                                                                    <td class='fs-12'>{$data['s_name_TH']}</td>
                                                                    <td class='fs-12 align-justify'>{$data['cs_name']}</td>
                                                                    <td class='fs-12 align-justify'>{$timeCount}</td>
                                                                </tr>
                                                            ";
                                                        break;
                                                        case "tb_r_repair":
                                                            foreach ($r_data as $datas) {
                                                                $dataSt1 = $comboboxObj->getDataStatusById($table3, $datas['rs_id']);
                                                                $dss['s_id'] = $dataSt1['rs_id'];
                                                                if ($datas['ds_remark'] == "") {
                                                                    $dss['s_name'] = $dataSt1['rs_name'];
                                                                } else {
                                                                    $dss['s_name'] = $datas['ds_remark'];
                                                                }
                                                                $das = statusRepair($dss);
                                                                $s = $s . "" . $das['bt'];
                                                            }

                                                            echo "
                                                                <tr>
                                                                    <th scope='row'>{$data['r_id']}</th>
                                                                    <td class='fs-10 text-center'>{$datefull}</td>
                                                                    <td>{$data['rr_remark']}</td>
                                                                    <td class='fs-12'>{$data['rr_room']}</td>
                                                                    <td class='fs-12'>{$data['rr_floor']}</td>
                                                                    <td class='fs-10'>{$data['b_name']}</td>
                                                                    <td class='fs-12'>{$data['n_name']}</td>
                                                                    <td class='fs-12'>{$data['s_name_TH']}</td>
                                                                    <td class='fs-12 align-justify'>{$data['rs_name']}</td>
                                                                    <td class='fs-12 align-justify'>{$timeCount}</td>
                                                                </tr>
                                                            ";
                                                        break;
                                                        case "tb_l_repair":
                                                            foreach ($r_data as $datas) {
                                                                $dataSt1 = $comboboxObj->getDataStatusById($table3, $datas['ls_id']);
                                                                $dss['s_id'] = $dataSt1['ls_id'];
                                                                if ($datas['ds_remark'] == "") {
                                                                    $dss['s_name'] = $dataSt1['ls_name'];
                                                                } else {
                                                                    $dss['s_name'] = $datas['ds_remark'];
                                                                }
                                                                $das = statusRepair($dss);
                                                                $s = $s . "" . $das['bt'];
                                                            }

                                                            echo "
                                                                <tr>
                                                                    <th scope='row'>{$data['r_id']}</th>
                                                                    <td class='fs-10 text-center'>{$datefull}</td>
                                                                    <td>{$data['lr_remark']}</td>
                                                                    <td class='fs-12'>{$data['lr_room']}</td>
                                                                    <td class='fs-12'>{$data['lr_floor']}</td>
                                                                    <td class='fs-10'>{$data['b_name']}</td>
                                                                    <td class='fs-12'>{$data['n_name']}</td>
                                                                    <td class='fs-12'>{$data['s_name_TH']}</td>
                                                                    <td class='fs-12 align-justify'>{$data['ls_name']}</td>
                                                                    <td class='fs-12 align-justify'>{$timeCount}</td>
                                                                </tr>
                                                            ";
                                                        break;
                                                    }
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
            <?php }
            ?>
        </div>
        </div>
    </section>

    <?php //require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/script-js.php"; 
    ?>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="/repair-sci/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <!-- Jquery Core Js -->
    <script src="/repair-sci/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/repair-sci/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="/repair-sci/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="/repair-sci/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/repair-sci/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="/repair-sci/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="/repair-sci/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="/repair-sci/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="/repair-sci/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="/repair-sci/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="/repair-sci/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="/repair-sci/js/admin.js"></script>
    <script src="/repair-sci/js/pages/forms/basic-form-elements.js"></script>
    <script src="/repair-sci/js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="/repair-sci/js/demo.js"></script>
    <script src='/repair-sci/plugins/datepicker-th/js/bootstrap-datepicker.js'></script>
    <script src='/repair-sci/plugins/datepicker-th/js/bootstrap-datepicker-thai.js'></script>
    <script src='/repair-sci/plugins/datepicker-th/js/locales/bootstrap-datepicker.th.js'></script>
    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                language: 'th-en',
                format: 'yyyy-mm-dd',
                minDate: 0,
                autoclose: true

            });
            $("#datepicker2").datepicker({
                language: 'th-en',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

        });
    </script>
</body>

</html>