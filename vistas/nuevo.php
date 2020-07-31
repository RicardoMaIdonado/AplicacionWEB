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

    if ($_REQUEST['nueva'] == 0) {
        include_once 'comunidadLog.php';
    } else if ($_REQUEST['nueva'] == 1) {
        include_once 'noticiasLog.php';
    } else if ($_REQUEST['nueva'] == 2) {
        $_SESSION['codigo'] = $_REQUEST['cod'];
        include_once 'DescripcionObjeto.php';
    } else if ($_REQUEST['nueva'] == 3) {
        include_once 'home.php';
    } else if ($_REQUEST['nueva'] == 4) {
        $_SESSION['codigo'] = $_REQUEST['cod'];
        include_once 'Detalle.php';
    } else if ($_REQUEST['nueva'] == 5) {
        include_once '../vistas/carritoPersonal.php';
    } else if ($_REQUEST['nueva'] == 6) {
        include_once 'agregado.php';
    } else if ($_REQUEST['nueva'] == 7) {
        unset($_SESSION['listado']);
        $_SESSION['listado'] = array();
        echo '<script language="javascript">alert("Carrito vacio");</script>';
        include_once 'carritoPersonal.php';
    } else if ($_REQUEST['nueva'] == 8) {
        if ($_REQUEST['mensaje']==0) {
            echo '<script type="text/javascript">alert("Nada para actualizar")</script>';
        } else if ($_REQUEST['mensaje']==1) {
            echo '<script type="text/javascript">alert("Nombre y Apellido actualizados con éxito")</script>';
        } else if ($_REQUEST['mensaje']==2) {
            echo '<script type="text/javascript">alert("Nombre actualizado con éxito")</script>';
        } else if ($_REQUEST['mensaje']==3) {
            echo '<script type="text/javascript">alert("Apellido actualizado con éxito")</script>';
        } else if ($_REQUEST['mensaje']==4) {
            echo '<script type="text/javascript">alert("Contraseña actualizada con éxito")</script>';
        } else if ($_REQUEST['mensaje']==5) {
            echo '<script type="text/javascript">alert("Las contraseñas no coinciden")</script>';
        }
        include_once 'home.php';
    }
}
