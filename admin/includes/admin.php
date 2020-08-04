<?php

include_once 'ConexionDB.php';

class Admin extends DB
{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;

    public function adminExist($admin, $pass)
    {
        $md5pass = md5($pass);
        $query = $this->getConexion()->prepare('SELECT * FROM administradores WHERE correo = :user AND password = :pass');
        $query->execute(['user' => $admin, 'pass' => $md5pass]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function setAdmin($admin)
    {
        $query = $this->getConexion()->prepare('SELECT * FROM administradores WHERE correo = :user');
        $query->execute(['user' => $admin]);
        foreach ($query as $currentUser) {
            $this->id = $currentUser['id_admin'];
            $this->nombre = $currentUser['nombre'];
            $this->apellido = $currentUser['apellido'];;
            $this->correo = $currentUser['correo'];
        }
    }

    public function getID()
    {
        return $this->id;
    }

    public function getAdmin()
    {
        return $this->correo;
    }
    public function getName()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    
}
