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
                <h1>แบบประเมินความพึงพอใจ</h1>
            </div>
            <?php
            $r_id = $_GET['re'];
            $type = $_GET['type'];

            ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ใบงานที่ <?php echo $r_id; ?>
                            </h2>
                            <div class="header-dropdown m-r--5">
                            </div>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <?php
                                    if ($type == 'e') {
                                    ?>
                                        <tr>
                                            <th width="2%" scope="col">#</th>
                                            <th width="6%" scope="col">วันที่แจ้ง</th>
                                            <th width="34%" scope="col">รายละเอียด</th>
                                            <th width="8%" scope="col">ห้อง</th>
                                            <th width="3%" scope="col">ชั้น</th>
                                            <th width="12%" scope="col">อาคาร</th>
                                            <th width="8%" scope="col">ประเถท</th>
                                            <th width="8%" scope="col">ลักษณะงาน</th>
                                            <th width="10%" scope="col">ผู้แจ้ง</th>
                                            <th width="15%" scope="col">สถานะ</th>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
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
                                    <?php
                                    }
                                    ?>

                                </thead>
                                <tbody>
                                    <?php

                                    // print_r($dataid);

                                    switch ($type) {
                                        case  'e':
                                            $dataid = $repairObj->getRepairById($_SESSION['year'], "tb_e_repair", $r_id);
                                            $date_add = datethai($dataid['date_add']);
                                            $datefull = datethai_time($dataid['date_add']);
                                            $s = "";
                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_e_status", $dataid['es_id']);
                                            $dss['s_id'] = $dataSt1['es_id'];
                                            $dss['s_name'] = $dataSt1['es_name'];
                                            $das = statusRepair($dss);
                                            $s = $das['bt'];
                                            $r_idl = sent($dataid['r_id']);
                                            echo "
                                                    <tr>
                                                        <th scope='row'>{$r_id}</th>
                                                        <td class='fs-10 text-center'>{$datefull}</td>
                                                        <td>{$dataid['er_remark']}</td>
                                                        <td class='fs-12'>{$dataid['er_room']}</td>
                                                        <td class='fs-12'>{$dataid['er_floor']}</td>
                                                        <td class='fs-10'>{$dataid['b_name']}</td>
                                                        <td class='fs-12'>{$dataid['et_name']}</td>
                                                        <td class='fs-12'>{$dataid['n_name']}</td>
                                                        <td class='fs-12'>{$dataid['s_name_TH']}</td>
                                                        <td class='fs-12 align-justify'>{$s} {$dataid['es_name']}</td>
                                                    </tr>
                                                ";
                                            break;
                                        case  'a':
                                            $dataid = $repairObj->getRepairById($_SESSION['year'], "tb_a_repair", $r_id);
                                            $date_add = datethai($dataid['date_add']);
                                            $datefull = datethai_time($dataid['date_add']);
                                            $s = "";
                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_a_status", $dataid['as_id']);
                                            $dss['s_id'] = $dataSt1['as_id'];
                                            $dss['s_name'] = $dataSt1['as_name'];
                                            $das = statusRepair($dss);
                                            $s = $das['bt'];
                                            $r_idl = sent($dataid['r_id']);
                                            echo "
                                                    <tr>
                                                        <th scope='row'>{$r_id}</th>
                                                        <td class='fs-10 text-center'>{$datefull}</td>
                                                        <td>{$dataid['ar_remark']}</td>
                                                        <td class='fs-12'>{$dataid['ar_room']}</td>
                                                        <td class='fs-12'>{$dataid['ar_floor']}</td>
                                                        <td class='fs-10'>{$dataid['b_name']}</td>
                                                        <td class='fs-12'>{$dataid['n_name']}</td>
                                                        <td class='fs-12'>{$dataid['s_name_TH']}</td>
                                                        <td class='fs-12 align-justify'>{$s} {$dataid['as_name']}</td>
                                                    </tr>
                                                ";
                                            break;
                                        case  'c':
                                            $dataid = $repairObj->getRepairById($_SESSION['year'], "tb_c_repair", $r_id);
                                            $date_add = datethai($dataid['date_add']);
                                            $datefull = datethai_time($dataid['date_add']);
                                            $s = "";
                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_c_status", $dataid['cs_id']);
                                            $dss['s_id'] = $dataSt1['cs_id'];
                                            $dss['s_name'] = $dataSt1['cs_name'];
                                            $das = statusRepair($dss);
                                            $s = $das['bt'];
                                            $r_idl = sent($dataid['r_id']);
                                            echo "
                                                    <tr>
                                                        <th scope='row'>{$r_id}</th>
                                                        <td class='fs-10 text-center'>{$datefull}</td>
                                                        <td>{$dataid['cr_remark']}</td>
                                                        <td class='fs-12'>{$dataid['cr_room']}</td>
                                                        <td class='fs-12'>{$dataid['cr_floor']}</td>
                                                        <td class='fs-10'>{$dataid['b_name']}</td>
                                                        <td class='fs-12'>{$dataid['n_name']}</td>
                                                        <td class='fs-12'>{$dataid['s_name_TH']}</td>
                                                        <td class='fs-12 align-justify'>{$s} {$dataid['cs_name']}</td>
                                                    </tr>
                                                ";
                                            break;
                                        case  'r':
                                            $dataid = $repairObj->getRepairById($_SESSION['year'], "tb_r_repair", $r_id);
                                            $date_add = datethai($dataid['date_add']);
                                            $datefull = datethai_time($dataid['date_add']);
                                            $s = "";
                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_r_status", $dataid['rs_id']);
                                            $dss['s_id'] = $dataSt1['rs_id'];
                                            $dss['s_name'] = $dataSt1['rs_name'];
                                            $das = statusRepair($dss);
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
                                            break;
                                        case  'l':
                                            $dataid = $repairObj->getRepairById($_SESSION['year'], "tb_l_repair", $r_id);
                                            $date_add = datethai($dataid['date_add']);
                                            $datefull = datethai_time($dataid['date_add']);
                                            $s = "";
                                            $dataSt1 = $comboboxObj->getDataStatusById("tb_l_status", $dataid['ls_id']);
                                            $dss['s_id'] = $dataSt1['ls_id'];
                                            $dss['s_name'] = $dataSt1['ls_name'];
                                            $das = statusRepair($dss);
                                            $s = $das['bt'];
                                            $r_idl = sent($dataid['r_id']);
                                            echo "
                                                    <tr>
                                                        <th scope='row'>{$r_id}</th>
                                                        <td class='fs-10 text-center'>{$datefull}</td>
                                                        <td>{$dataid['lr_remark']}</td>
                                                        <td class='fs-12'>{$dataid['lr_room']}</td>
                                                        <td class='fs-12'>{$dataid['lr_floor']}</td>
                                                        <td class='fs-10'>{$dataid['b_name']}</td>
                                                        <td class='fs-12'>{$dataid['n_name']}</td>
                                                        <td class='fs-12'>{$dataid['s_name_TH']}</td>
                                                        <td class='fs-12 align-justify'>{$s} {$dataid['ls_name']}</td>
                                                    </tr>
                                                ";
                                            break;
                                    }

                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                แบบประเมินความพึงพอใจ
                            </h2>
                            <div class="header-dropdown m-r--5">
                            </div>
                        </div>
                        <div class="body">
                            <form action="save.php" method="POST">
                                <input type="hidden" class="form-control date" placeholder="" value="<?php echo $r_id; ?>" name="r_id">
                                <input type="hidden" class="form-control date" placeholder="" value="<?php echo $type; ?>" name="type">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <!-- <tr class="bg-black">
                                                
                                                <th colspan='2' width="55%" scope="col" class="text-center">หัวข้อ</th>
                                                <th width="" scope="col" class="text-center">ระดับความพึงพอใจ</th>
                                            </tr> -->
                                        </thead>

                                        <tbody>
                                            <?php
                                            $groups = $assessmentObj->getAssGroup();
                                            // print_r($groups);
                                            $j = 0;
                                            foreach ($groups as $g) {
                                                $j++;
                                                echo "
                                                    <tr class='bg-cyan fs-16'>
                                                    <td colspan='2'>{$j}.{$g['ass_group']}</td>
                                                    <td class='text-center'>ระดับความพึงพอใจ</td>
                                                    </tr>
                                                ";
                                                $dataAss = $assessmentObj->getAssByGroup($g['ass_group']);
                                                $i = 0;
                                                foreach ($dataAss as $ass) {
                                                    $i++;
                                                    echo "
                                                        <tr class=''>
                                                            <td   class='text-center'>{$j}.{$i}</td>
                                                            <td  class=''>{$ass['ass_name']}</td>
                                                            <td class=''>
                                                                <div class=''>
                                                                    <input name='a{$ass['ass_id']}' type='radio' id='radio_38{$ass['ass_id']}' class='with-gap radio-col-teal' value='5' />
                                                                    <label for='radio_38{$ass['ass_id']}'>มากที่สุด (5)</label>
                                                                    <input name='a{$ass['ass_id']}' type='radio' id='radio_40{$ass['ass_id']}' class='with-gap radio-col-light-green' value='4' />
                                                                    <label for='radio_40{$ass['ass_id']}'>มาก (4)</label>
                                                                    <input name='a{$ass['ass_id']}' type='radio' id='radio_35{$ass['ass_id']}' class='with-gap radio-col-blue' value='3' />
                                                                    <label for='radio_35{$ass['ass_id']}'>ปานกลาง (3)</label>
                                                                    <input name='a{$ass['ass_id']}' type='radio' id='radio_44{$ass['ass_id']}' class='with-gap radio-col-orange' value='2' />
                                                                    <label for='radio_44{$ass['ass_id']}'>น้อย (2)</label>
                                                                    <input name='a{$ass['ass_id']}' type='radio' id='radio_30{$ass['ass_id']}' class='with-gap radio-col-red' value='1' />
                                                                    <label for='radio_30{$ass['ass_id']}'>ควรปรับปรุง (1)</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    ";
                                                }
                                            }
                                            ?>
                                            <tr class='bg-cyan fs-16'>
                                                    <td colspan='2'><?php echo ($j + 1).'.ข้อเสนอแนะ'; ?></td>
                                                    <td></td>
                                                    </tr>
                                            <tr>
                                                <td width='' class='text-center'></td>
                                                <td colspan='2'width='' class=''><textarea class="form-control" rows=' 3' name='suggestion'></textarea></td>
                                                
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                                <input type="hidden" class="form-control date" placeholder="" value="<?php echo $_SESSION['s_id']; ?>" name="s_id">
                                <button type="submit" class="btn bg-indigo waves-effect">บันทึก</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require $_SERVER['DOCUMENT_ROOT'] . "/repair-sci/component/script-js.php"; ?>

</body>

</html>