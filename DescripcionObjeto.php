<!DOCTYPE html>
<?php
include '../Modelo/Metodos.php';
$cod = $_REQUEST['cod'];

$objMetodos = new Metodos();
$lista = $objMetodos->ListarProductosID($cod);
$todos = $objMetodos->ListarProductosExceptoUno($cod);
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
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="http://localhost:82/Portal_Web/inicio/">VAINCE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:82/Portal_Web/paginas/Controlador/Index.php">Objetos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Vista/noticias.html">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Vista/comunidad.html">Comunidad</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">
                    <img src="../Iconos/shopping-cart.png" style="max-width: 20px; max-height: 20px;">
                    Carrito
                </button>
                &nbsp
                <button class="btn btn-outline-secondary my-2 my-sm-0 justify-content-center" type="submit">
                    <img src="../Iconos/user.png" style="max-width: 20px; max-height: 20px;">
                    Perfil
                </button>
            </form>
        </div>
    </nav>
    <!-- NAVBAR -->

    <!-- CONTENIDO -->
    <p></p>
    <div class="d-flex justify-content-center">
        <h1>DESCRIPCIÓN DEL OBJETO</h1>
    </div>
    <p></p>
    <div class="container d-flex justify-content-center">
        <div class="card border-secondary mb-3" style="max-width: 90%;">
            <div class="card-header">
                <h3><?php echo $nombre; ?></h3>
            </div>
            <div class="card-body d-flex justify-content-between">
                <img src="./Imagenes/<?php echo $imagen; ?>" style="width: 200px; height:170px;">
                <div class="container">
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
        </div>
    </div>


    <div class="card border-secondary mb-3">
        <div class="card-header">
            <h3>OBJETOS RELACIONADOS</h3>
        </div>
        <div class="card-body">
            <div class="form withscroll">
                <table width="300" cellspacing="1" cellspacing="2" cellpadding="3">
                    <tr>
                        <td>

                            <?php
                            foreach ($todos as $row) {
                                $nomb = $row[1];
                                $niv = $row[5];
                                $prec = $row[2];
                                $im = $row[17];
                                $categ = $row[12];
                                if ($categ == $cate) {
                            ?>
                                    <div class="container">
                                        <div class="card text-white bg-dark border-dark mb-3" style="width: 16rem;">
                                            <div class="card-header">
                                                <img src="./Imagenes/<?php echo $im; ?>" class="card-img-top" alt="Card image cap" title="Click para ver descripción" onclick="caracterizar(<?php echo $row[0]; ?>)" width="55px" height="205px">
                                            </div>
                                            <div class="card-body bg-dark">
                                                <p class="card-text"><b>Nombre:</b> <?php echo $nomb; ?></p>
                                                <p class="card-text"><b>Nivel:</b> <?php echo $niv; ?></p>
                                                <p class="card-text"><b>Precio:</b> <?php echo $prec; ?></p>

                                            </div>
                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>







    <!-- CONTENIDO -->
    <div>
        <p align="center">OBJETOS RELACIONADOS...</p>
        <?php
        foreach ($todos as $row) {
            $nomb = $row[1];
            $niv = $row[5];
            $prec = $row[2];
            $im = $row[17];
            $categ = $row[12];
            if ($categ == $cate) {
        ?>
                <div class="card text-white bg-dark border-dark mb-3" style="width: 16rem;">
                    <div class="card-header">
                        <img src="./Imagenes/<?php echo $im; ?>" class="card-img-top" alt="Card image cap" title="Click para ver descripción" onclick="caracterizar(<?php echo $row[0]; ?>)" width="55px" height="205px">
                    </div>
                    <div class="card-body bg-dark">
                        <p class="card-text"><b>Nombre:</b> <?php echo $nomb; ?></p>
                        <p class="card-text"><b>Nivel:</b> <?php echo $niv; ?></p>
                        <p class="card-text"><b>Precio:</b> <?php echo $prec; ?></p>

                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <script>
        function caracterizar(co) {
            location.href = "DescripcionObjeto.php?cod=" + co;
        }
    </script>
    <!-- Footer -->
    <footer>
        <div class="colum1">
            <p>VainCE fue creado con el proposito de dar a concer el juego multiplataforma llamado vainglory
                Comunity
                edition aqui puedes encontrar todo sobre tus objetos favoritos.</p>
            <p>Copyright © 2020 VainCE | Todos los derechos reservados</p>
        </div>
        <div class="colum2">
            <div class="information">
                <a href="https://www.facebook.com/vainglorygame">
                    <img src="../Iconos/facebook.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://twitter.com/vainglory?lang=es">
                    <img src="../Iconos/twitter.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://www.youtube.com/channel/UCAuhvPegawFqaywNw0P7fEQ">
                    <img src="../Iconos/youtube.png" alt=""></a>
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