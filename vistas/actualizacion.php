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
    $success = "Datos actualizados con exito";
} else if ($_POST['username_reg'] != "" && $_POST['userapell_reg'] == "") {
    $username = $_POST['username_reg'];

    $user->updateName($user->getUser(), $username);

    $success = "Datos actualizados con exito";
} else if ($_POST['username_reg'] == "" && $_POST['userapell_reg'] != "") {
    $userapell = $_POST['userapell_reg'];

    $user->updateApellido($user->getUser(), $userapell);
    $success = "Datos actualizados con exito";
} else {
    $ninguno = "Nada para actualizar";
}

header('Location: nuevo.php?nueva=3');
//include_once 'home.php';
