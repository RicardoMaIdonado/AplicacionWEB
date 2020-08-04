<?php

include_once '../includes/admin.php';
include_once '../includes/admin_session.php';
include 'manejoobjetos.php';

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
    if (isset($_POST['nombreup'])) {
        if (isset($_POST['nombreup']) && isset($_POST['precioup']) && isset($_POST['dano_cristalup'])) {
            $manejo = new ManejoObjetos();
            $manejo->updateObjeto($_SESSION['objupdate'],$_POST['nombreup'],$_POST['precioup'],$_POST['dano_cristalup'],$_POST['dano_armaup'],$_POST['nivelup'],$_POST['escudoup'],$_POST['saludup'],$_POST['velocidad_ataqueup'],$_POST['dano_criticoup'],$_POST['prob_criticoup'],$_POST['vampirismoup'],$_POST['categoria_objetoup'],$_POST['perforacion_armaduraup'],$_POST['reduccion_reposoup'],$_POST['energia_recargaup'],$_POST['energia_maximaup'],$_POST['armaduraup'],$_POST['perforacion_escudoup']);
            $nueva = 1;
            //echo "actualizado sin imagen";
            $mensaje = 1;
        }
    }else {
        //echo "Se debe seleccionar un archivo";
        $mensaje = 2;
        $nueva = 6;
    }
} else {
    //si se desean crear varios direcotrio 
    //$ruta = 'uploads/'.'fecha'.'hora'.'/';
    $ruta = 'C:/xampp/htdocs/vaince/Imagenes/';
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
            if ($tipoArchivo == "png") {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {

                    $manejo = new ManejoObjetos();
                    if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['dano_cristal']) && isset($_FILES['file'])) {
                        $manejo->ingresoObjeto($_POST['nombre'],$_POST['precio'],$_POST['dano_cristal'],$_POST['dano_arma'],$_POST['nivel'],$_POST['escudo'],$_POST['salud'],$_POST['velocidad_ataque'],$_POST['dano_critico'],$_POST['prob_critico'],$_POST['vampirismo'],$_POST['categoria_objeto'],$_POST['perforacion_armadura'],$_POST['reduccion_reposo'],$_POST['energia_recarga'],$_POST['energia_maxima'],$_FILES["file"]["name"],$_POST['armadura'],$_POST['perforacion_escudo']);
                        $nueva=0;
                        //subido
                        $mensaje = 4;
                    }else if (isset($_POST['nombreup']) && isset($_POST['precioup']) && isset($_POST['dano_cristalup']) && isset($_FILES['file'])) {
                        $manejo->updateObjetoImg($_SESSION['objupdate'],$_POST['nombreup'],$_POST['precioup'],$_POST['dano_cristalup'],$_POST['dano_armaup'],$_POST['nivelup'],$_POST['escudoup'],$_POST['saludup'],$_POST['velocidad_ataqueup'],$_POST['dano_criticoup'],$_POST['prob_criticoup'],$_POST['vampirismoup'],$_POST['categoria_objetoup'],$_POST['perforacion_armaduraup'],$_POST['reduccion_reposoup'],$_POST['energia_recargaup'],$_POST['energia_maximaup'],$_FILES["file"]["name"],$_POST['armaduraup'],$_POST['perforacion_escudoup']);
                        $nueva=1;
                        //echo "actualizado con imagen";
                        $mensaje = 5;
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
