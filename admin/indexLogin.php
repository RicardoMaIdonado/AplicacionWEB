<?php

include_once 'includes/admin.php';

include_once 'includes/admin_session.php';

$adminSession = new AdminSession();
$admin = new Admin();

$bol = isset($_SESSION['admin']);
if (isset($_SESSION['admin'])) {
    //echo "Hay sesion";
    $admin->setAdmin($adminSession->getCurrentAdmin());
    
    include_once 'inicio.php';
} else if (isset($_POST['mail']) && isset($_POST['password'])) {
    //echo "validacion de login";
    $userForm = $_POST['mail'];
    $passForm = $_POST['password'];

    if ($admin->adminExist($userForm, $passForm)) {
        //echo "Usuario validado";
        $adminSession->setCurrentAdmin($userForm);
        $admin->setAdmin($userForm);
        
        include_once 'inicio.php';
    } else {
        //echo "Nombre de usuario o password incorrecto";
        $errorLogin = "Nombre de usuario o password incorrectos";
        include_once 'login.php';
    }
}
else {
    //echo "Login";
    include_once 'login.php';
}
