<?php
require_once($_SERVER['DOCUMENT_ROOT']."/repair-sci/function/function.php");
require_once($_SERVER['DOCUMENT_ROOT']."/repair-sci/vendor/autoload.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/repair-sci/google-api/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/repair-sci/pages/auth/config.php');


use App\Model\Repair\Users;
$usersObj = new Users;
if(isset($_GET["code"])){
    $toke = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);

}else{
    header('location: index.php');
    exit();
}

if(isset($toke["error"]) != "invalid_grant"){
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    
    // echo $userData['email'];
    $data['email']=$userData['email'];
    $data['picture']=$userData['picture'];

    $ck = $usersObj->checkUserGoogle($data,$userData['picture']);

    if($ck){
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/repair-sci'} , 0);
            </script>
        ";
    }else{
        echo "  
            <script type='text/javascript'>
                setTimeout(function(){location.href='/repair-sci/pages/auth'} , 0);
            </script>
        ";
    }
    // echo "<pre>";
    // var_dump($userData);
    // echo "</pre>";
}else{
    header('Location: /repair-sci/pages/auth/index.php');
    exit();
}

?>