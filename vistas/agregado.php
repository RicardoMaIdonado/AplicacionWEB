<?php

include_once '../includes/user.php';
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
    echo "agregado con exito";
} else {
    echo "no hay espacio ";
    echo "solo queda ";
    echo (6-sizeof($listado));
}
include_once 'carritoPersonal.php';
