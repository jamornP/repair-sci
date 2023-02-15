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
        $all = $notifiObj->countAll($_SESSION['year'],"tb_e_repair");
        $danger = $notifiObj->countNoSuccess($_SESSION['year'],"tb_e_repair");
        $success = $notifiObj->countStatus($_SESSION['year'],"tb_e_repair",8);
        $wait = $notifiObj->countStatus($_SESSION['year'],"tb_e_repair",9);
        $company = $notifiObj->countStatus($_SESSION['year'],"tb_e_repair",10);
        // $success = 200;
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>แจ้งซ่อมไฟฟ้าและปะปรา</h2>
            </div>

            <!-- Widgets -->
            <div class="row">
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
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue-grey hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text fs-18">งานจ้างเหมา</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $company;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                รายการแจ้งซ่อมทั้งหมด
                            </h2>
                            <div class="header-dropdown m-r--5">
                                <button type="button" class="btn bg-red waves-effect m-r-20 m-t--10 fs-16 " data-toggle="modal" data-target="#defaultModal">
                                    <i class="material-icons">add_circle_outline</i>
                                    <span>แจ้งซ่อม</span>
                                </button>
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
                                            <th width="8%" scope="col">ประเถท</th>
                                            <th width="8%" scope="col">ลักษณะงาน</th>
                                            <th width="10%" scope="col">ผู้แจ้ง</th>
                                            <th width="10%" scope="col">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //     $year_term = yearterm(date('Y-m-d'));
                                        //     $datar = $repairObj->getRepairByYear($year_term);
                                        // $i = 0;
                                        // foreach($datar as $data){
                                        //     $i++;
                                        //     $date_add = datethai($data['date_add']);
                                        //     $datefull = datethai_time($data['date_add']);
                                        //     $s = "";
                                        //     $dataSt1 = $datastatusObj->getDsByRid($data['r_id']);
                                        //     // print_r($dataSt1);
                                        //     $s = btStatus($dataSt1);
                                        //     // foreach($dataSt1 as $c){
                                        //     //     $ds['s_id'] = $c['s_id'];
                                        //     //     $ds['s_name'] = $c['s_name'];
                                        //     //     $das = statusRepair($ds);
                                        //     //     $s = $s."".$das['bt'];
                                            
                                        //     // }
                                        //     // ----
                                        //     echo "
                                        //         <tr>
                                        //             <th scope='row'>{$i}</th>
                                        //             <td class='fs-10 text-center'>{$datefull}</td>
                                        //             <td>{$data['r_remark']}</td>
                                        //             <td class='fs-12'>{$data['room']}</td>
                                        //             <td class='fs-12'>{$data['floor']}</td>
                                        //             <td class='fs-10'>{$data['b_name']}</td>
                                        //             <td class='fs-12'>{$data['t_name']}</td>
                                        //             <td class='fs-12'>{$data['n_name']}</td>
                                        //             <td class='fs-12'>{$data['fullname']}</td>
                                        //             <td class='fs-12 align-justify'>{$s} {$data['s_name']}</td>
                                                
                                        //         </tr>
                                        //     ";
                                        // }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
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