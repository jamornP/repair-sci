
<?php  
    session_start(); 
    if(!($_SESSION['sts_name']=="Administrator")){
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
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/s-left-right.php";?>

    <section class="content">
        <div class="container-fluid">
       
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            จัดการข้อมูลเมนู
                            </h2>
                            <div class="header-dropdown m-r--5">
                                <?php
                                    if(isset($_POST['add_menu'])){
                                        unset($_POST['add_menu']);
                                        // print_r($_POST);
                                        $ckadd = $menuObj->newMenu($_POST);
                                        $mes="Save Data Success";
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
                                                setTimeout(function(){location.href='/repair-sci/pages/admin/menu.php'} , 2000);
                                            </script>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="menu.php" method="POST">
                                <div class="form-group">
                                    <label for="m_name" class="col-sm-2 control-label">ชื่อเมนู</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="m_name" name="m_name" placeholder="" value="" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="m_link_repair" class="col-sm-2 control-label">Link แจ้งซ่อม</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="m_link_repair" name="m_link_repair" placeholder="" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="m_link_m_repair" class="col-sm-2 control-label">Link เจ้าหน้าที่</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="m_link_m_repair" name="m_link_m_repair" placeholder="" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="m_icon" class="col-sm-2 control-label">Icon</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="m_icon" name="m_icon" placeholder="" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="m_table" class="col-sm-2 control-label">ตาราง</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="m_table" name="m_table" placeholder="" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger" name="add_menu">เพิ่ม</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Data Menu
                                        <small>จัดการข้อมูลเมนู</small>
                                    </h2>
                                </div>
                                <div class="body table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อเมนู</th>
                                                <th>Link แจ้งซ่อม</th>
                                                <th>Link เจ้าหน้าที่</th>
                                                <th>Icon เมนู</th>
                                                <th>Table เมนู</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $dataM = $menuObj->getAllMenu();
                                                $i=0;
                                                foreach($dataM as $m){
                                                    $i++;
                                                    echo "
                                                    <tr>
                                                        <th scope='row'>{$m['m_id']}</th>
                                                        <td>{$m['m_name']}</td>
                                                        <td>{$m['m_link_repair']}</td>
                                                        <td>{$m['m_link_m_repair']}</td>
                                                        <td><i class='material-icons'>{$m['m_icon']}</i></td>
                                                        <td>{$m['m_table']}</td>
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
            </div>
        </div>
    </section>
    
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
</body>

</html>