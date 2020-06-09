<?php
    session_start();
    include '../Modelo/Metodos.php';
    $op=$_REQUEST['op'];
    $niv=$_REQUEST['niv'];
    unset($_SESSION['lista']);
    $objMetodo=new Metodos();

    if ($op==0 && $niv==0) {
        $lista=$objMetodo->ListarProductos();
        $_SESSION['lista']=$lista; 
    }else if ($op!=0 && $niv==0) {
        $lista=$objMetodo->ListarProductosCat($op);
        $_SESSION['lista']=$lista;
    }else if ($op==0 && $niv!=0) {
        $lista=$objMetodo->ListarProductosNiv($niv);
        $_SESSION['lista']=$lista;
    }else if ($op!=0 && $niv!=0) {
        $lista=$objMetodo->ListarProductosCatNiv($op,$niv);
        $_SESSION['lista']=$lista;
    }
    header("Location: ../Vista/Catalogo.php");

?>