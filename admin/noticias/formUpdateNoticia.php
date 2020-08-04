<?php
include_once '../includes/admin.php';
include_once '../includes/admin_session.php';

$adminsession = new AdminSession();
$admin = new Admin();
$admin->setAdmin($adminsession->getCurrentAdmin());
if (isset($_POST['b1'])) {
    //echo $_POST['idnoticia'];
    $_SESSION['notupdate'] = $_POST['idnoticia'];
    //echo $_SESSION['notupdate'];
    include_once 'altNoticia.php';
} else if (isset($_POST['b2'])) {
    //eliminar aqui la noticia
    include '../noticias/manejonoticias.php';
    $manager = new ManejoNoticias();
    $manager->deleteNoticia($_POST['idnoticia']);
    header('Location: ../indexLogin.php?mensaje=9');
}
