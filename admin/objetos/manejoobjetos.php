<?php

//include '../includes/ConexionDB.php';

class ManejoObjetos extends DB
{

    public function ListarObjetos()
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
    public function ListarObjetosID($id)
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

    public function ingresoObjeto($nombre,$precio,$dano_cristal,$dano_arma,$nivel,$escudo,$salud,$velocidad_ataque,$dano_critico,$prob_critico,$vampirismo,$categoria_objeto,$perforacion_armadura,$reduccion_reposo,$energia_recarga,$energia_maxima,$imagen,$armadura,$perforacion_escudo)
    {
        $data = [
            'id_objeto' => 0,
            'nombre' => $nombre,
            'precio' => $precio,
            'dano_cristal' => $dano_cristal,
            'dano_arma' => $dano_arma,
            'nivel' => $nivel,
            'escudo' => $escudo,
            'salud' => $salud,
            'velocidad_ataque' => $velocidad_ataque,
            'dano_critico' => $dano_critico,
            'prob_critico' => $prob_critico,
            'vampirismo' => $vampirismo,
            'categoria_objeto' => $categoria_objeto,
            'perforacion_armadura' => $perforacion_armadura,
            'reduccion_reposo' => $reduccion_reposo,
            'energia_recarga' => $energia_recarga,
            'energia_maxima' => $energia_maxima,
            'imagen' => $imagen,
            'armadura' => $armadura,
            'perforacion_escudo' => $perforacion_escudo,
        ];
        $sql = "INSERT INTO objeto (id_objeto, nombre, precio, dano_cristal, dano_arma, nivel, escudo, salud, velocidad_ataque, dano_critico, prob_critico, vampirismo, categoria_objeto,perforacion_armadura,reduccion_reposo,energia_recarga,energia_maxima,imagen,armadura,perforacion_escudo) VALUES (:id_objeto, :nombre, :precio, :dano_cristal, :dano_arma, :nivel, :escudo, :salud, :velocidad_ataque, :dano_critico, :prob_critico, :vampirismo, :categoria_objeto,:perforacion_armadura,:reduccion_reposo,:energia_recarga,:energia_maxima,:imagen,:armadura,:perforacion_escudo)";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute($data);
        
    }

    public function updateObjetoImg($id, $nombre,$precio,$dano_cristal,$dano_arma,$nivel,$escudo,$salud,$velocidad_ataque,$dano_critico,$prob_critico,$vampirismo,$categoria_objeto,$perforacion_armadura,$reduccion_reposo,$energia_recarga,$energia_maxima,$imagen,$armadura,$perforacion_escudo)
    {
        
        $sql = "UPDATE objeto SET nombre='$nombre',precio=$precio,dano_cristal=$dano_cristal,dano_arma=$dano_arma,nivel=$nivel,escudo=$escudo,salud=$salud,velocidad_ataque=$velocidad_ataque,dano_critico=$dano_critico,prob_critico=$prob_critico,vampirismo=$vampirismo,categoria_objeto=$categoria_objeto,perforacion_armadura=$perforacion_armadura,reduccion_reposo=$reduccion_reposo,energia_recarga=$energia_recarga,energia_maxima=$energia_maxima,imagen='$imagen',armadura=$armadura,perforacion_escudo=$perforacion_escudo WHERE id_objeto=$id";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute();
        
    }

    public function updateObjeto($id, $nombre,$precio,$dano_cristal,$dano_arma,$nivel,$escudo,$salud,$velocidad_ataque,$dano_critico,$prob_critico,$vampirismo,$categoria_objeto,$perforacion_armadura,$reduccion_reposo,$energia_recarga,$energia_maxima,$armadura,$perforacion_escudo)
    {
        
        $sql = "UPDATE objeto SET nombre='$nombre',precio=$precio,dano_cristal=$dano_cristal,dano_arma=$dano_arma,nivel=$nivel,escudo=$escudo,salud=$salud,velocidad_ataque=$velocidad_ataque,dano_critico=$dano_critico,prob_critico=$prob_critico,vampirismo=$vampirismo,categoria_objeto=$categoria_objeto,perforacion_armadura=$perforacion_armadura,reduccion_reposo=$reduccion_reposo,energia_recarga=$energia_recarga,energia_maxima=$energia_maxima,armadura=$armadura,perforacion_escudo=$perforacion_escudo WHERE id_objeto=$id";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute();
        
    }

    public function deleteObjeto($id) {
        $sql = "DELETE FROM objeto WHERE id_objeto=$id";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute();
    }

    
}