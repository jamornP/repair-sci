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
                <h2>ระบบแจ้งซ่อม คณะวิทยาศาสตร์ สจล.</h2>
            </div> -->
            <div class="row">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    ระบบแจ้งซ่อม คณะวิทยาศาสตร์ สจล.
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <?php
                                        $dataMenu = $menuObj->getAllMenu();
                                        foreach($dataMenu as $menu){
                                            if($menu['m_id']==3){
                                                if($_SESSION['d_id']==2 OR  $_SESSION['d_id']==3 OR $_SESSION['d_id']==4){

                                                }else{
                                                    echo "
                                                        <div class='col-sm-6 col-md-3'>
                                                            <div class='thumbnail'>
                                                                <img src='/repair-sci/images/0{$menu['m_id']}.png'>
                                                                <div class='caption'>
                                                                    
                                                                    <div class='icon-and-text-button-demo'>
                                                                        <a href='{$menu['m_link_repair']}' class='btn btn-block btn-lg bg-pink waves-effect' role='button'><i class='material-icons'>publish</i><span><h4>แจ้งซ่อม</h4></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ";
                                                }
                                            }else{
                                                echo "
                                                    <div class='col-sm-6 col-md-3'>
                                                        <div class='thumbnail'>
                                                            <img src='/repair-sci/images/0{$menu['m_id']}.png' class='shadow'>
                                                            <div class='caption'>
                                                                
                                                                <div class='icon-and-text-button-demo'>
                                                                    <a href='{$menu['m_link_repair']}' class='btn btn-block btn-lg bg-pink waves-effect' role='button'><i class='material-icons'>publish</i><span><h4>แจ้งซ่อม</h4></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ";
                                            }
                                        }
                                    ?>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                // $dataMenu = $menuObj->getAllMenu();
                // foreach($dataMenu as $menu){
                //     if($menu['m_id']==3){
                //         if($_SESSION['d_id']==2 OR  $_SESSION['d_id']==3 OR $_SESSION['d_id']==4){

                //         }else{
                //             echo "
                //                 <a href='{$menu['m_link_repair']}'>
                //                     <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                //                         <div class='info-box bg-cyan hover-zoom-effect'>
                //                             <div class='icon'>
                //                                 <i class='material-icons'>build</i>
                //                             </div>
                //                             <div class='content'>
                //                                 <div class='text'>แจ้งซ่อม</div>
                //                                 <div class='number'>{$menu['m_name']}</div>
                //                             </div>
                //                         </div>
                //                     </div>
                //                 </a>
                //             ";
                //         }
                //     }else{
                //         echo "
                //             <a href='{$menu['m_link_repair']}'>
                //                 <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
                //                     <div class='info-box bg-cyan hover-zoom-effect'>
                //                         <div class='icon'>
                //                             <i class='material-icons'>gps_fixed</i>
                //                         </div>
                //                         <div class='content'>
                //                             <div class='text'>แจ้งซ่อม</div>
                //                             <div class='number'>{$menu['m_name']}</div>
                //                         </div>
                //                     </div>
                //                 </div>
                //             </a>
                //         ";
                //     }
                // }
            ?>
            </div>
        </div>
    </section>
    
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
</body>

</html>