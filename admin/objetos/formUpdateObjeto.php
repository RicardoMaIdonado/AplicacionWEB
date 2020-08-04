<?php
include_once '../includes/admin.php';
include_once '../includes/admin_session.php';

$adminsession = new AdminSession();
$admin = new Admin();
$admin->setAdmin($adminsession->getCurrentAdmin());

if (isset($_POST['b1'])) {
    //echo $_POST['idobjeto'];
    $_SESSION['objupdate'] = $_POST['idobjeto'];
    //echo $_SESSION['objupdate'];
    include_once 'altObjeto.php';
}else if (isset($_POST['b2'])) {
    //eliminar aqui el objeto
    include '../objetos/manejoobjetos.php';
    $manager = new ManejoObjetos();
    $manager->deleteObjeto($_POST['idobjeto']);
    header('Location: ../indexLogin.php?mensaje=9');
}
