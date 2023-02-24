<?php
    session_start();
    if(isset($_SESSION['login'])){
        if(!$_SESSION['login']){
            echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/repair-sci/pages/auth'} , 1);
                </script>
            ";
            exit;
        }
    }else{
        echo "  
                <script type='text/javascript'>
                    setTimeout(function(){location.href='/repair-sci/pages/auth'} , 1);
                </script>
            ";
            exit;
    }
?>