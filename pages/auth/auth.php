<?php
    session_start();
    if(isset($_SESSION['login'])){
        if(!$_SESSION['login']){
            header("location: /repair-sci/pages/auth");
            exit;
        }
    }else{
        header("location: /repair-sci/pages/auth");
            exit;
    }
?>