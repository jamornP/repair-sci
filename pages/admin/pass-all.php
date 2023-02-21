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
            <?php
                $datast = $usersObj->getAllUsers();
                foreach($datast as $data){
                    $ck = $usersObj->ResetPassword($data['email']);
                    
                }
                if($ck){
                    $mes="Reset Password Success";
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
                            setTimeout(function(){location.href='/repair-sci/pages/admin/reset-password.php'} , 2000);
                        </script>
                    ";
                }
            ?>
            
    
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/script-js.php";?>
</body>

</html>