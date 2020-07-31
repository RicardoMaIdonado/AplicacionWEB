<?php

include_once '../includes/user.php';
include_once '../includes/user_session.php';

$userSession = new UserSession();
$user = new User();
$user->setUser($userSession->getCurrentUser());

if ($_POST['username_reg'] != "" && $_POST['userapell_reg'] != "") {
    $username = $_POST['username_reg'];
    $userapell = $_POST['userapell_reg'];

    $user->updateName($user->getUser(), $username);
    $user->updateApellido($user->getUser(), $userapell);
    $mensaje = 1;
} else if ($_POST['username_reg'] != "" && $_POST['userapell_reg'] == "") {
    $username = $_POST['username_reg'];

    $user->updateName($user->getUser(), $username);

    $mensaje = 2;
} else if ($_POST['username_reg'] == "" && $_POST['userapell_reg'] != "") {
    $userapell = $_POST['userapell_reg'];

    $user->updateApellido($user->getUser(), $userapell);
    $mensaje = 3;
} else {
    $mensaje = 0;
}

header("Location: nuevo.php?nueva=8&mensaje=".$mensaje);
//include_once 'home.php';
