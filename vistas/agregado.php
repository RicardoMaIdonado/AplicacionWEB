<?php

include_once '../includes/user.php';
include_once '../includes/productos.php';
include_once '../includes/user_session.php';

$userSession = new UserSession();
$user = new User();
$user->setUser($userSession->getCurrentUser());

$objeto = $_SESSION['pro'];
$listado = $_SESSION['listado'];
$cantidad = $_POST["cantidad"];

if (sizeof($listado) < 6 && (sizeof($listado)+$cantidad)<=6) {
    for ($i=1;$i<=$cantidad;$i++) {
        $listado[] = $objeto;
        $_SESSION['listado'] = $listado;
    }
    echo '<script language="javascript">alert("Agregado con exito");</script>';
    //echo "agregado con exito";
} else {
    $value = (6-sizeof($listado));
    $dat = "Insuficiente espacio en el carrito. Espacio disponible: " . $value . " objetos más.";
    echo '<script type="text/javascript">alert("' . $dat . '")</script>';
}
include_once 'carritoPersonal.php';
