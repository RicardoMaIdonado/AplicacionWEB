<?php

include_once 'includes/admin.php';

include_once 'includes/admin_session.php';

$adminSession = new AdminSession();
$admin = new Admin();

$bol = isset($_SESSION['admin']);
if (isset($_SESSION['admin'])) {
    //echo "Hay sesion";
    $admin->setAdmin($adminSession->getCurrentAdmin());

    if ($_REQUEST['nueva'] == 0) {

        include_once 'objetos/addObjeto.php';
    } else if ($_REQUEST['nueva'] == 1) {
        include_once 'objetos/updateobjeto.php';
    } else if ($_REQUEST['nueva'] == 2) {
        include_once 'objetos/catalogoobjetos.php';
    } else if ($_REQUEST['nueva'] == 3) {
        include_once 'noticias/addNoticia.php';
    } else if ($_REQUEST['nueva'] == 4) {
        include_once 'noticias/updatenoticia.php';
    } else if ($_REQUEST['nueva'] == 5) {
        include_once 'noticias/catalogonoticias.php';
    } else if ($_REQUEST['nueva'] == 6) {
        header('Location: indexLogin.php?mensaje='.$_REQUEST['mensaje']);
    }
    if (isset($_REQUEST['mensaje'])) {
        if ($_REQUEST['mensaje'] == 7) {
            echo '<script language="javascript">alert("Formato de archivo incorrecto!");</script>';
      
        } else if ($_REQUEST['mensaje'] == 8) {
            echo '<script language="javascript">alert("El archivo no es una imagen!");</script>';
         
        } else if ($_REQUEST['mensaje'] == 6) {
            echo '<script language="javascript">alert("Error al intentar subir el archivo!");</script>';
        } else if ($_REQUEST['mensaje'] == 3) {
            echo '<script language="javascript">alert("Tamaño máximo de archivo permitido 5000kb!");</script>';
        }else {
            echo '<script language="javascript">alert("Proceso realizado con exito!");</script>';
        }
    }
}
