<?php

include_once 'ConexionDB.php';
date_default_timezone_set('America/Guayaquil');
class Pedido extends DB
{
    
    public function ingreso($usuario,$total)
    {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");

        $data = [
            'id_pedido' => 0,
            'usuario' => $usuario,
            'fecha' => $fecha,
            'hora' => $hora,
            'total' => $total,
        ];
        
        $sql = "INSERT INTO pedido (id_pedido, usuario, fecha, hora, total) VALUES (:id_pedido, :usuario, :fecha, :hora, :total)";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute($data);
        
    }

    public function getUltimoPedido() {
        $res = $this->getConexion()->prepare("SELECT MAX(id_pedido),usuario FROM pedido");
        $res->execute();
        $lista = array();
        foreach($res as $row) {
            $lista[]=$row;
        }
        return $lista;
    }

    public function getFechaHoraID($id) {
        $res = $this->getConexion()->prepare("SELECT * FROM pedido WHERE id_pedido=$id");
        $res->execute();
        $lista = array();
        foreach($res as $row) {
            $lista[]=$row;
        }
        return $lista;
    }

}
