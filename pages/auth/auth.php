<?php
    session_start();
    if(isset($_SESSION['login'])){
        if(!$_SESSION['login']){
            header("location: /repair-all/pages/auth");
            exit;
        }
    }else{
        header("location: /repair-all/pages/auth");
            exit;
    }
?>