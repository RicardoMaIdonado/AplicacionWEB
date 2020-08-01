<?php

include_once 'ConexionDB.php';

class User extends DB
{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;

    /*User es considerado como el correo*/

    public function userExist($user, $pass)
    {
        $md5pass = md5($pass);
        $query = $this->getConexion()->prepare('SELECT * FROM usuario WHERE correo = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function setUser($user)
    {
        $query = $this->getConexion()->prepare('SELECT * FROM usuario WHERE correo = :user');
        $query->execute(['user' => $user]);
        foreach ($query as $currentUser) {
            $this->id = $currentUser['id_usuario'];
            $this->nombre = $currentUser['nombre'];
            $this->apellido = $currentUser['apellido'];;
            $this->correo = $currentUser['correo'];
        }
    }

    public function getID()
    {
        return $this->id;
    }

    public function getUser()
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

    public function updateName($correou,$nomu) {
        $query = $this->getConexion()->prepare('UPDATE usuario SET nombre= :nom WHERE correo= :corr');
        $query->execute(['nom' => $nomu, 'corr' => $correou]);
    }

    public function updateApellido($correou,$apellu) {
        $query = $this->getConexion()->prepare('UPDATE usuario SET apellido= :apell WHERE correo= :corr');
        $query->execute(['apell' => $apellu, 'corr' => $correou]);
    }

    public function updatePass($correou,$passu) {
        $query = $this->getConexion()->prepare('UPDATE usuario SET password= :passw WHERE correo= :corr');
        $passe = md5($passu);
        $query->execute(['passw' => $passe, 'corr' => $correou]);
    }
    
}
