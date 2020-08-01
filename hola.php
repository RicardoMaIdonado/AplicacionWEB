<?php
    include '../vaince/includes/db.php';
    $pass = 'mientras012corre$';
    echo md5($pass).'<br/>';
    $datos = new DB();
    $datos->getConexion();
    
