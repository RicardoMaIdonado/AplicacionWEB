<?php

include_once 'ConexionDB.php';

class Producto extends DB
{

    public function ListarProductos()
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
    public function ListarProductosID($id)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto where id_objeto=$id");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
    public function ListarProductosExceptoUno($id)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto where NOT id_objeto=$id");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
    public function ListarProductosCat($cat)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto where categoria_objeto=$cat");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
    public function ListarProductosNiv($niv)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto where nivel=$niv");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
    public function ListarProductosCatNiv($ct, $nv)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto where categoria_objeto=$ct and nivel=$nv");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
    public function obtenerObjeto($nombre)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto where nombre='$nombre'");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function carrito($idusuario, $idpedido)
    {

        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("SELECT p.usuario, po.id_pedido, p.fecha, po.id_objeto, po.cantidad from pedido p INNER JOIN pedido_objeto po ON p.id_pedido = po.id_pedido WHERE P.usuario=$idusuario AND p.id_pedido=$idpedido");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function objetoconID($id)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from objeto where id_objeto='$id'");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function pedidousuario($id)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from pedido where usuario='$id'");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function pedidousuariofecha($id,$idped)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from pedido where usuario='$id' and id_pedido='$idped'");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
}
