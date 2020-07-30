<?php

include_once 'ConexionDB.php';

class Registro extends DB
{

    public function ingreso($nombre, $apellido, $mail, $pass)
    {
        $md5pass = md5($pass);
        

        $data = [
            'id_usuario' => 0,
            'name' => $nombre,
            'apellido' => $apellido,
            'mail' => $mail,
            'pass' => $md5pass,
        ];
        $sql = "INSERT INTO usuario (id_usuario, nombre, apellido, correo, password) VALUES (:id_usuario, :name, :apellido, :mail, :pass)";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute($data);
        
    }

    public function userExist($user)
    {
       
        $query = $this->getConexion()->prepare('SELECT * FROM usuario WHERE correo = :user');
        $query->execute(['user' => $user]);
        if ($query->rowCount()) {
            return false;
        } else {
            return true;
        }
    }

}
