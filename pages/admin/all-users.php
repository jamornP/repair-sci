<?php  
    session_start();
    if(!($_SESSION['st_status']=="administrator")){
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/repair-sci/pages/repair'} , 500);
            </script>
        ";
    }
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
    <?php //require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/s-left-right.php";?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php //$year_term = yearterm(date('Y-m-d')); ?>
                <!-- <h2>DASHBOARD<?php //echo $year_term;?></h2> -->
            </div>
            <!-- Widgets -->
            <!-- <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">MESSAGES</div>
                            <div class="number">15</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="text">CPU USAGE</div>
                            <div class="number">92%</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">access_alarm</i>
                        </div>
                        <div class="content">
                            <div class="text">ALARM</div>
                            <div class="number">07:00 AM</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">gps_fixed</i>
                        </div>
                        <div class="content">
                            <div class="text">LOCATION</div>
                            <div class="number">Turkey</div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                รายการแจ้งซ่อมทั้งหมด
                            </h2>
                            <div class="header-dropdown m-r--5">
                           
                            
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="" scope="col">#</th>
                                            <th width="" scope="col">TH</th>
                                            <th width="" scope="col">EN</th>
                                            <th width="" scope="col">ตำแหน่ง</th>
                                            <th width="" scope="col">สังกัด</th>
                                            <th width="" scope="col">email</th>
                                            <th width="" scope="col">pass</th>
                                            <th width="" scope="col">tel</th>
                                            <th width="" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           $datast = $usersObj->getAllUsers();
                                           print_r($datast);
                                           $i = 0;
                                           foreach($datast as $data2){
                                               if($data2['password']==""){
                                                   $pass = "No";
                                               }else{
                                                   $pass = "Yes";
                                               }
                                               $i++;
                                            echo "
                                                <tr>
                                                    <th scope='row'>{$data2['s_id']}</th>
                                                    <td class=''>{$data2['s_name_TH']}</td>
                                                    <td>{$data2['s_name_EN']}</td>
                                                    <td class=''>{$data2['s_position']}</td>
                                                    <td class=''>{$data2['d_name']}</td>
                                                    <td class=''>{$data2['email']}</td>
                                                    <td class=''>{$pass}</td>
                                                    <td class=''>{$data2['s_tel']}</td>
                                                    <td class=''> 
                                                        <a href='/repair-sci/pages/admin/manage.php?id={$data2['s_id']}'>
                                                            <i class='material-icons fs-19'>settings</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            ";
                                            }
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
    <script>
    $('#defaultModal').on('shown.bs.modal', function () {
        $('#fullname').focus()
    })
    
</script>
</body>

</html>