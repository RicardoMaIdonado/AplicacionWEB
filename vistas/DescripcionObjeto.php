<!DOCTYPE html>
<?php
include_once '../includes/productos.php';
$cod = $_SESSION['codigo'];

$obj = new Producto();
$lista = $obj->ListarProductosID($cod);
$todos = $obj->ListarProductosExceptoUno($cod);
foreach ($lista as $row) {
    $nombre = $row[1];
    $daño_arma = $row[3];
    $daño_cristal = $row[4];
    $nivel = $row[5];
    $escudo = $row[6];
    $salud = $row[7];
    $velocidad_ataque = $row[8];
    $dano_critico = $row[9];
    $prob_critico = $row[10];
    $vampirismo = $row[11];
    $cate = $row[12];
    $perforacion_armadura = $row[13];
    $reduccion_reposo = $row[14];
    $energia_recarga = $row[15];
    $energia_maxima = $row[16];
    $imagen = $row[17];
    $armadura = $row[18];
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Pie.css">
    <title>VAINCE</title>
    <style>
        .horizontal-scroll-contenedor {

            overflow-y: hidden;
            overflow-x: auto;
            text-align: left;
            white-space: nowrap;
            width: auto;
            height: auto;
            margin: 0 auto;

        }

        .horizontal-scroll-contenedor>div {
            width: auto;
            height: auto;
            display: inline-block;
            margin: 10px 10px 10px 10px;
            background-color: #252323;
            border-style: solid;
            color: white;
        }

        p {
            margin-left: 15px;
            margin-right: 15px;

        }

        #imgen {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
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

    <!-- CONTENIDO -->
    <p></p>
    <div class="d-flex justify-content-center">
        <h1 align="center">DESCRIPCIÓN DEL OBJETO</h1>
    </div>
    <p></p>
    <div class="container d-flex justify-content-center">
        <div class="card border-secondary mb-3" style="max-width: 90%;">
            <div class="card-header">
                <h3><?php echo $nombre; ?></h3>
            </div>
            <div class="card-body d-flex justify-content-between">
                <img id="imgen" src="../Imagenes/<?php echo $imagen; ?>" style="width: 200px; height:170px;">
                <div class="container">
                    <p><b>Categoria:</b>
                        <?php
                        if ($cate == 1) {
                            echo "Arma";
                        } else if ($cate == 2) {
                            echo "Cristal";
                        } else if ($cate == 3) {
                            echo "Defensa";
                        } else if ($cate == 4) {
                            echo "Utilidad";
                        } else if ($cate == 5) {
                            echo "Consumible";
                        }
                        ?>
                    </p>
                    <p><b>Daño de arma:</b> +<?php echo $daño_arma; ?> de potencia</p>
                    <p><b>Daño de cristal:</b> +<?php echo $daño_cristal; ?> de potencia</p>
                    <p><b>Escudo:</b> +<?php echo $escudo; ?></p>
                    <p><b>Salud:</b> +<?php echo $salud; ?> %</p>
                    <p><b>Armadura:</b> +<?php echo $armadura; ?></p>
                    <p><b>Velocidad de ataque:</b> +<?php echo $velocidad_ataque; ?> %</p>
                    <p><b>Daño crítico:</b> +<?php echo $dano_critico; ?> %</p>
                    <p><b>Probabilidad de crítico:</b> +<?php echo $prob_critico; ?> %</p>
                    <p><b>Vampirismo:</b> +<?php echo $vampirismo; ?> %</p>
                    <p><b>Perforación de armadura:</b> +<?php echo $perforacion_armadura; ?> %</p>
                    <p><b>Reducción de reposo:</b> +<?php echo $reduccion_reposo; ?> %</p>
                    <p><b>Recarga de energía:</b> +<?php echo $energia_recarga; ?></p>
                    <p><b>Energía máxima:</b> +<?php echo $energia_maxima; ?> %</p>
                    <p></p>

                </div>

            </div>
            <p></p>
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-secondary" onclick="enviar(<?php echo $row[0]; ?>)">
                    <img src="../Iconos/smart-cart.png" style="max-width: 20px; max-height: 20px;">
                    <div style="color:black;">Agregar al Carrito</div>
                </button>
            </div>
            <p></p>
        </div>
    </div>

    <!-- CONTENIDO -->
    <div>
        <div class="card-header" >
            <h3>OBJETOS RELACIONADOS</h3>
        </div>
        <br>
        <div class="horizontal-scroll-contenedor">
            <?php
            foreach ($todos as $row) {
                $nomb = $row[1];
                $niv = $row[5];
                $prec = $row[2];
                $im = $row[17];
                $categ = $row[12];
                if ($categ == $cate) {
            ?>
                    <div style="border-radius: 15px;">
                        <img id="imgen" src="../Imagenes/<?php echo $im; ?>" title="Click para ver descripción" onclick="caracterizar(<?php echo $row[0]; ?>)" style="width: 200px; height:170px;">
                        <p class="img-footer">
                        </p>
                        <p class="img-footer">
                            Nombre:</b> <?php echo $nomb; ?>
                        </p>
                        <p class="img-footer">
                            Nivel:</b> <?php echo $niv; ?>
                        </p>
                        <p class="img-footer">
                            Precio:</b> <?php echo $prec; ?>
                        </p>

                    </div>

            <?php
                }
            }
            ?>
        </div>

    </div>

    <script>
        function caracterizar(co) {
            location.href = "nuevo.php?cod=" + co + "&nueva=2";
        }
    </script>

    <script>
        function enviar(c) {

            location.href = "nuevo.php?cod=" + c + "&nueva=4";
        }
    </script>

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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>