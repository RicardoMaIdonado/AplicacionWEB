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
$_SESSION['objeto'] = $objeto;
$_SESSION['pro'] = $objeto->nombre;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Pie.css">
    <title>VAINCE</title>

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand">
            <div style="font-family:monaco;font-size:larger">VAINCE</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/vaince/indexLogin.php?op=0&niv=0">
                        <div style="color:white;">Objetos</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/vaince/vistas/nuevo.php?nueva=1">
                        <div style="color:white;">Noticias</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/vaince/vistas/nuevo.php?nueva=0">
                        <div style="color:white;">Comunidad</div>
                    </a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <div id="botonP" class="btn-group" role="group" aria-label="Button group with nested dropdown" style="margin-left: auto;">
                    <div class="btn-group" role="group">
                        <button style="color:white;" id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../Iconos/user.png" style="max-width: 20px; max-height: 20px;">
                            <?php echo $user->getName(); ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="http://localhost/vaince/vistas/nuevo.php?nueva=3">Perfil</a>
                            <a class="dropdown-item" href="http://localhost/vaince/includes/logout.php">Cerrar Sesión</a>

                        </div>
                    </div>
                </div>

                &nbsp
                <button style="color:white;" class="btn btn-outline-secondary my-2 my-sm-0" onclick="location='nuevo.php?nueva=5'">
                    <img src="../Iconos/shopping-cart.png" style="max-width: 20px; max-height: 20px;">
                    Carrito
                </button>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->
    <br>
    <br>
    <br>
    <h2 align="center">Detalle de Compra</h2>
    <div style="min-height: 8vh;"></div>

    <div class="container d-flex justify-content-center">
        <form action="agregado.php" method="POST">
            <table border="0">
                <tr>
                    <th rowspan="4">
                        <img src="../Imagenes/<?php echo $imagen; ?>" width="200" height="170" style="margin-right: 15px;">
                    </th>
                    <td><b>NOMBRE: </b><?php echo $nombre; ?></td>
                </tr>
                <tr>
                    <td align="justify"><b>NIVEL: </b><?php echo $nivel; ?></td>
                </tr>
                <tr>
                    <td align="left"><b>PRECIO: </b><?php echo $precio; ?> de oro</td>
                </tr>
                <tr>
                    <td align="right">
                        Ingresar cantidad: <input name="cantidad" type="number" min="1" max="6" value="1">

                    </td>
                </tr>
                <tr>
                    <th align="right" colspan="2">
                        <br>
                        <input value="Agregar al carrito" type="submit" style="margin-left: 31px;">

                    </th>
                </tr>
            </table>
        </form>

    </div>
    <div style="min-height: 12vh;"></div>
    <!-- Footer -->
    <footer class="page-footer font-small mdb-color darken-3 pt-4">
        <div class="colum1">
            <p>VainCE fue creado con el próposito de dar a conocer el juego multiplataforma llamado Vainglory
                Comunity
                Edition. Aquí puedes encontrar todo sobre tus objetos y construcciones favoritas.</p>
            <p>Copyright © 2020 VainCE | Todos los derechos reservados</p>
        </div>
        <div class="colum2">
            <div class="information">
                <a href="https://www.facebook.com/vainglorygame" target="_blank">
                    <img src="facebook.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://twitter.com/vainglory?lang=es" target="_blank">
                    <img src="twitter.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://www.youtube.com/channel/UCAuhvPegawFqaywNw0P7fEQ" target="_blank">
                    <img src="youtube.png" alt=""></a>
            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>