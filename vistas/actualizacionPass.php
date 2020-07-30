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
        $successP = "Contraseña actualizada con exito";
    } else {

        $errorPass = "Las contraseñas no coinciden";
    }
}

//header('Location: nuevo.php?nueva=3');
include_once 'home.php';
