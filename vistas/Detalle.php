<!DOCTYPE html>
<?php
include_once '../includes/productos.php';
include '../Modelo/Objeto.php';

$cod = $_SESSION['codigo'];

$listado = $_SESSION['listado'];

$obj = new Producto();
$lista = $obj->ListarProductosID($cod);

$objeto = new Objeto();

foreach ($lista as $row) {
    $nombre = $row[1];
    $precio = $row[2];
    $nivel = $row[5];
    $imagen = $row[17];

    $objeto->id_objeto = $row[0];
    $objeto->nombre = $row[1];
    $objeto->precio = $row[2];
    $objeto->dano_cristal = $row[3];
    $objeto->dano_arma = $row[4];
    $objeto->nivel = $row[5];
    $objeto->escudo = $row[6];
    $objeto->salud = $row[7];
    $objeto->velocidad_ataque = $row[8];
    $objeto->dano_critico = $row[9];
    $objeto->prob_critico = $row[10];
    $objeto->vampirismo = $row[11];
    $objeto->categoria_objeto = $row[12];
    $objeto->perforacion_armadura = $row[13];
    $objeto->reduccion_reposo = $row[14];
    $objeto->energia_recarga = $row[15];
    $objeto->energia_maxima = $row[16];
    $objeto->imagen = $row[17];
    $objeto->armadura = $row[18];
}
$_SESSION['objeto']=$objeto;
$_SESSION['pro']=$objeto->nombre;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vainglory Community Edition</title>
    
</head>

<body>
    <div>
        <form action="agregado.php" method="POST">
            <table border="0">
                <tr>
                    <th rowspan="4">
                        <img src="../Imagenes/<?php echo $imagen; ?>" width="200" height="170">
                    </th>
                    <th><?php echo $nombre; ?></th>
                </tr>
                <tr>
                    <td align="justify"><?php echo $nivel; ?></td>
                </tr>
                <tr>
                    <td align="left"><b><?php echo $precio; ?> de oro</b></td>
                </tr>
                <tr>
                    <td align="right">
                        Ingresar cantidad: <input name="cantidad" type="number" min="1" max="6" value="1">
                        
                    </td>
                </tr>
                <tr>
                    <th align="right" colspan="2">
                        <br>
                        <input value="Agregar al carrito" type="submit">
                        
                    </th>
                </tr>
            </table>
        </form>
        
    </div>
    
</body>

</html>