<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/repair-sci/google-api/vendor/autoload.php');
    $gClient = new Google_Client();
    $gClient->setClientId("584689131463-qgtl775eq4d7ql9murb4kchhudr0lck4.apps.googleusercontent.com");
    $gClient->setClientSecret("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");
    $gClient->setApplicationName("Science Repair");
    $gClient->setRedirectUri("http://sciserv01.sci.kmitl.ac.th/repair-sci/pages/auth/controller.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

    $login_url = $gClient->createAuthUrl();

?>