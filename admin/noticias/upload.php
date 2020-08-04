<?php
date_default_timezone_set('America/Guayaquil');
include_once '../includes/admin.php';
include_once '../includes/admin_session.php';
include 'manejonoticias.php';
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$adminsession = new AdminSession();
$admin = new Admin();
$admin->setAdmin($adminsession->getCurrentAdmin());
//conseguir una matriz con la infomracion del archivo subido
/*var_dump($_FILES["file"]);
echo $_FILES["file"]["name"];
echo "<br>";
echo $_FILES["file"]["type"];
echo "<br>";
*/
//ruta a la que se va a guardar el archivo
if ($_FILES["file"]["error"] > 0 ) {
    if (isset($_POST['tituloup'])) {
        if (isset($_POST['tituloup']) && isset($_POST['linkup']) && isset($_POST['descripcionup'])) {
            $manejo = new ManejoNoticias();
            $manejo->updateNoticia($_SESSION['notupdate'], $_POST['tituloup'], $_POST['linkup'], $_POST['descripcionup'], $fecha, $hora, $admin->getID());
            //echo "actualizado sin imagen";
            $mensaje = 1;
            $nueva = 4;
        }
    }else {
        //echo "Se debe seleccionar un archivo";
        $mensaje = 2;
        $nueva = 6;
    }
} else {
    //si se desean crear varios direcotrio 
    //$ruta = 'uploads/'.'fecha'.'hora'.'/';
    $ruta = '../uploads/';
    $archivo = $ruta . basename($_FILES["file"]["name"]);
    //$archivo = $ruta . $_POST['titulo'];

    //Creacion de un directorio si no existe
    /*if (!file_exists($ruta)){
        mkdir($ruta);
    }*/
    //Para conseguir la extension de larchivo
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    //echo $tipoArchivo;
    //validacion para imagenes (devuleve valor booleno)
    $isImg = getimagesize($_FILES["file"]["tmp_name"]);
    if ($isImg != false) {
        //validacion tamanio del archivo
        $size = $_FILES["file"]["size"];
        if ($size > 5000000) {
            //echo "Tamano maximo de 5000 kb";
            $mensaje = 3;
            $nueva = 6;
        } else {
            if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "jfif") {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {

                    $manejo = new ManejoNoticias();
                    if (isset($_POST['titulo']) && isset($_POST['link']) && isset($_POST['descripcion']) && isset($_FILES['file'])) {

                        $manejo->ingresoNoticia($_POST['titulo'], $_POST['link'], $_POST['descripcion'], $_FILES["file"]["name"], $admin->getID(), $fecha, $hora);
                        //echo "subido";
                        $mensaje = 4;
                        $nueva = 3;
                    }else if (isset($_POST['tituloup']) && isset($_POST['linkup']) && isset($_POST['descripcionup']) && isset($_FILES['file'])) {
                        
                        $manejo->updateNoticiaImg($_SESSION['notupdate'], $_POST['tituloup'], $_POST['linkup'], $_POST['descripcionup'], $_FILES["file"]["name"], $fecha, $hora, $admin->getID());
                        //echo "actualizado con imagen";
                        $mensaje = 5;
                        $nueva = 4;
                    }
                } else {
                    //echo "Error al intentar subir el archivo";
                    $mensaje = 6;
                    $nueva = 6;
                }
            } else {
                //echo "Formato de archivo incorrecto";
                $mensaje = 7;
                $nueva = 6;
            }
        }
    } else {
        //echo "El archivo no es una imagen!";
        $mensaje = 8;
        $nueva = 6;
    }
}

header('Location: http://localhost/vaince/admin/control.php?nueva='.$nueva.'&mensaje='.$mensaje);
