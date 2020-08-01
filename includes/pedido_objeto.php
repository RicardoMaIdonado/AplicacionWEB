<?php

include_once 'ConexionDB.php';

class Pedido_Objeto extends DB
{
    
    public function ingreso($pedido,$objeto,$cantidad)
    {
        $data = [
            'id_pedido' => $pedido,
            'id_objeto' => $objeto,
            'cantidad' => $cantidad,
        ];
        $sql = "INSERT INTO pedido_objeto (id_pedido, id_objeto, cantidad) VALUES (:id_pedido, :id_objeto, :cantidad)";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute($data);
        
    }

}