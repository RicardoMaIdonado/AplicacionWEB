<?php

include_once 'includes/user.php';
include_once 'includes/productos.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();
$producto = new Producto();
$bol = isset($_SESSION['user']);
if (isset($_REQUEST['no'])) {
    echo '<script type="text/javascript">alert("Usted no se ha registrado todavia en VainCE!")</script>';
}
if (isset($_SESSION['ingreso'])) {
    header("Location: logoutGoogle.php?no=2");
} else if (isset($_SESSION['user'])) {
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());
    if (isset($_REQUEST['op']) && isset($_REQUEST['niv'])) {
        $_SESSION['op'] = $_REQUEST['op'];
        $_SESSION['niv'] = $_REQUEST['niv'];
    }
    if (isset($_REQUEST['c'])) {
        if ($_REQUEST['c'] == 1) {
            echo '<script type="text/javascript">alert("Pedido realizado exitosamente. Revise su correo para ver los detalles de su pedido!")</script>';
        } else if ($_REQUEST['c'] == 2) {
            echo '<script type="text/javascript">alert("No se puede solicitar un carrito vacio!")</script>';
        }
    }
    if (isset($_REQUEST['cat'])) {
        echo '<script type="text/javascript">alert("El catálogo ha sido enviado a su correo!")</script>';
    }
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
} else if (isset($_POST['botonGoogle'])) {
    echo 'hola';
    header('Location: loginGoogle.php');
} else {
    //echo "Login";
    include_once 'vistas/login.php';
}
