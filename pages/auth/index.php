<?php require_once $_SERVER['DOCUMENT_ROOT']."/repair-sci/pages/auth/config.php";?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | App Science KMITL</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/repair-sci/component/link-css.php";?>
</head>

<body class="login-page font-kanit">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>ระบบแจ้งซ่อม</b> <br> คณะวิทยาศาสตร์</a>
            <small>science @ KMITL</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="sign_in.php"  method="POST">
                    <div class="msg">Sign in</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Email สถาบัน ต้องมี @kmitl.ac.th ด้วยนะครับ" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                        <button onclick="window.location = '<?php echo $login_url;?>'" type="button" class="btn bg-22">
                                <div class=""><img src="/repair-sci/images/logo_google2.png" alt="Logo" style="display:box; margin: 0 auto; max-width:20px;">Sign in with Google </div>
                            </button>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                        .
                    </div>
                    <!-- <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
        <a href="/repair-sci/doc/คู่มือการใช้งานโปรแกรมแจ้งซ่อมคณะวิทยาศาสตร์เบื้องต้น .pdf" class="btn bg-indigo waves-effect font-bold col-orange" target="_blank">คู่มือการใช้งานเบื้องต้น</a>
       
    </div>

    <!-- Jquery Core Js -->
    <script src="/repair-sci/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/repair-sci/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/repair-sci/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="/repair-sci/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="/repair-sci/js/admin.js"></script>
    <script src="/repair-sci/js/pages/examples/sign-in.js"></script>
</body>

</html>