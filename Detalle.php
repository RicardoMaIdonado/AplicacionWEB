<!DOCTYPE html>
<?php
include '../Modelo/Metodos.php';
$cod = $_REQUEST['cod'];

$objMetodos = new Metodos();
$lista = $objMetodos->ListarProductosID($cod);

foreach ($lista as $row) {
    $nombre = $row[1];
    $precio = $row[2];
    $nivel = $row[5];
    $imagen = $row[17];
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vainglory Community Edition</title>
</head>

<body>
    <form>
        <table border="0">
            <tr>
                <th rowspan="4">
                    <img src="./Imagenes/<?php echo $imagen; ?>" width="200" height="170">
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
                    Ingresar cantidad: <input type="number" min="1" max="6" value="1" name="txtCan">
                </td>
            </tr>
            <tr>
                <th align="right" colspan="2">
                    <br>
                    <button type="button" class="btn btn-secondary">Cerrar</button>
                    <button type="button" class="btn btn-primary">Agregar a Carrito</button>
                </th>
            </tr>
        </table>
    </form>
</body>

</html>