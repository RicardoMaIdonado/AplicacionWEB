<?php
    
    $op=$_SESSION['op'];
    $niv=$_SESSION['niv'];
    unset($_SESSION['lista']);
    
    if ($op==0 && $niv==0) {
        $lista=$producto->ListarProductos();
        $_SESSION['lista']=$lista; 
    }else if ($op!=0 && $niv==0) {
        $lista=$producto->ListarProductosCat($op);
        $_SESSION['lista']=$lista;
    }else if ($op==0 && $niv!=0) {
        $lista=$producto->ListarProductosNiv($niv);
        $_SESSION['lista']=$lista;
    }else if ($op!=0 && $niv!=0) {
        $lista=$producto->ListarProductosCatNiv($op,$niv);
        $_SESSION['lista']=$lista;
    }

    include_once 'vistas/CatalogoUserLog.php';
    
?>