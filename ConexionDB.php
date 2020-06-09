<?php

class ConexionDB {
    public function getConexion() {
        $cnx=new PDO("mysql:host=localhost;dbname=bd_vaince","root","");
        return $cnx;
    }
}