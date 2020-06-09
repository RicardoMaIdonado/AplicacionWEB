<?php
include '../Modelo/ConexionDB.php';

class Metodos {
    public function ListarProductos() {
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        
        $res=$cn->prepare("select * from objeto");
        $res->execute();

        foreach($res as $row) {
            $lista[]=$row;
        }
   
        return $lista;
    }
    public function ListarProductosID($id) {
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();

        $res=$cn->prepare("select * from objeto where id_objeto=$id");
        $res->execute();

        foreach($res as $row) {
            $lista[]=$row;
        }
       
        return $lista;
    }
    public function ListarProductosExceptoUno($id) {
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();

        $res=$cn->prepare("select * from objeto where NOT id_objeto=$id");
        $res->execute();

        foreach($res as $row) {
            $lista[]=$row;
        }
       
        return $lista;
    }
    public function ListarProductosCat($cat) {
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        
        $res=$cn->prepare("select * from objeto where categoria_objeto=$cat");
        $res->execute();

        foreach($res as $row) {
            $lista[]=$row;
        }
   
        return $lista;
    }
    public function ListarProductosNiv($niv) {
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        
        $res=$cn->prepare("select * from objeto where nivel=$niv");
        $res->execute();

        foreach($res as $row) {
            $lista[]=$row;
        }
   
        return $lista;
    }
    public function ListarProductosCatNiv($ct,$nv) {
        $cnx=new ConexionDB();
        $cn=$cnx->getConexion();
        
        $res=$cn->prepare("select * from objeto where categoria_objeto=$ct and nivel=$nv");
        $res->execute();

        foreach($res as $row) {
            $lista[]=$row;
        }
   
        return $lista;
    }
}