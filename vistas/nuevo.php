<?php

include_once '../includes/user.php';
include_once '../includes/productos.php';
include_once '../includes/user_session.php';

$userSession = new UserSession();
$user = new User();
$producto = new Producto();
$bol = isset($_SESSION['user']);
if (isset($_SESSION['user'])) {
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());
    
    if ($_REQUEST['nueva']==0) {
        include_once 'comunidadLog.php';
    }else if ($_REQUEST['nueva']==1) {
        include_once 'noticiasLog.php';
    }else if ($_REQUEST['nueva']==2) {
        $_SESSION['codigo']=$_REQUEST['cod'];
        include_once 'DescripcionObjeto.php';
    }else if ($_REQUEST['nueva']==3) {
        include_once 'home.php';
    }else if ($_REQUEST['nueva']==4) {
        $_SESSION['codigo']=$_REQUEST['cod'];
        include_once 'Detalle.php';
    }else if ($_REQUEST['nueva']==5) {
        include_once '../vistas/carritoPersonal.php';
    }else if ($_REQUEST['nueva']==6) {
        include_once 'agregado.php';
    }
    
}