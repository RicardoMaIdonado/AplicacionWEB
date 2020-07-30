<?php

include_once 'includes/user.php';
include_once 'includes/productos.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();
$producto = new Producto();
$bol = isset($_SESSION['user']);
if (isset($_SESSION['user'])) {
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());

    $_SESSION['op'] = $_REQUEST['op'];
    $_SESSION['niv'] = $_REQUEST['niv'];
    include_once 'controlador/IndexLog.php';
} else if (isset($_POST['mail']) && isset($_POST['password'])) {
    //echo "validacion de login";
    $userForm = $_POST['mail'];
    $passForm = $_POST['password'];

    if ($user->userExist($userForm, $passForm)) {
        //echo "Usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        $_SESSION['op'] = 0;
        $_SESSION['niv'] = 0;
        unset($_SESSION['listado']);
        $_SESSION['listado'] = array();
        include_once 'controlador/IndexLog.php';
    } else {
        //echo "Nombre de usuario o password incorrecto";
        $errorLogin = "Nombre de usuario o password incorrectos";
        include_once 'vistas/login.php';
    }
} else {
    //echo "Login";
    include_once 'vistas/login.php';
}
