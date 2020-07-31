<?php

include_once '../includes/user.php';
include_once '../includes/user_session.php';

$userSession = new UserSession();
$user = new User();
$user->setUser($userSession->getCurrentUser());

if ($_POST['password'] != "" && $_POST['password_confirm'] != "") {
    $passForm = $_POST['password'];
    $passConfirmForm = $_POST['password_confirm'];
    if ($passForm == $passConfirmForm) {

        $user->updatePass($user->getUser(), $passForm);
        $mensaje = 4;
    } else {

        $mensaje = 5;
    }
}

header("Location: nuevo.php?nueva=8&mensaje=".$mensaje);
include_once 'home.php';
