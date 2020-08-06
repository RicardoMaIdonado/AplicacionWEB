<?php
include_once 'user_session.php';
$userSession = new UserSession();
if (isset($_SESSION['google'])) {
    //echo 'Inicio de sesion con google';
    header("Location: ../logoutGoogle.php");
} else {

    $userSession->closeSession();

    header("Location: ../indexLogin.php");
}
