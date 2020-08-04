<?php

//include_once '../includes/ConexionDB.php';

class ManejoNoticias extends DB
{

    public function ListarNoticias()
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from noticias");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }
    public function ListarNoticiasID($id)
    {
        $cnx = new DB();
        $cn = $cnx->getConexion();
        $lista = array();
        $res = $cn->prepare("select * from noticias where id_noticia=$id");
        $res->execute();

        foreach ($res as $row) {
            $lista[] = $row;
        }

        return $lista;
    }

    public function ingresoNoticia($titulo, $link, $descripcion, $imagen, $creador,$fecha,$hora)
    {
        $data = [
            'id_noticia' => 0,
            'titulo' => $titulo,
            'link' => $link,
            'descripcion' => $descripcion,
            'imagen' => $imagen,
            'fecha' => $fecha,
            'hora' => $hora,
            'creador' => $creador,
        ];
        $sql = "INSERT INTO noticias (id_noticia, titulo, link, descripcion, imagen, fecha, hora, creador) VALUES (:id_noticia, :titulo, :link, :descripcion, :imagen, :fecha, :hora, :creador)";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute($data);
        
    }

    public function updateNoticiaImg($id, $titulo, $link, $descripcion, $imagen, $fecha, $hora, $creador)
    {
        
        $sql = "UPDATE noticias SET titulo='$titulo', link='$link', descripcion='$descripcion', imagen='$imagen', fecha='$fecha', hora='$hora', creador=$creador WHERE id_noticia=$id";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute();
        
    }

    public function updateNoticia($id, $titulo, $link, $descripcion, $fecha, $hora, $creador)
    {
        
        $sql = "UPDATE noticias SET titulo='$titulo', link='$link', descripcion='$descripcion', fecha='$fecha', hora='$hora', creador=$creador WHERE id_noticia=$id";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute();
        
    }

    public function deleteNoticia($id) {
        $sql = "DELETE FROM noticias WHERE id_noticia=$id";
        $stmt= $this->getConexion()->prepare($sql);
        $stmt->execute();
    }

    
}