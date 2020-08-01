<!DOCTYPE html>
<html lang="en">
<?php

$listado = $_SESSION['listado'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Pie.css">
    <title>VAINCE</title>
    <style>
        img {
            width: 550px;
            height: 300px;
        }

        table {
            font-family: "Helvetica Neue", Helvetica, sans-serif
        }

        caption {
            text-align: left;
            color: silver;
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px;
        }

        thead {
            background: black;
            color: white;
        }

        th,
        td {
            padding: 5px 10px;
        }

        tbody tr:nth-child(even) {
            background: WhiteSmoke;
        }

        tbody tr td:nth-child(2) {
            text-align: center;
        }

        tbody tr td:nth-child(3),
        tbody tr td:nth-child(4) {
            text-align: right;
            font-family: monospace;
        }

        tfoot {
            background: SeaGreen;
            color: white;
            text-align: right;
        }

        tfoot tr th:last-child {
            font-family: monospace;
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
                <button class="btn btn-outline-secondary my-2 my-sm-0 justify-content-center" onclick="location='nuevo.php?nueva=3'">
                    <img src="user.png" style="max-width: 20px; max-height: 20px;">
                    <div style="color:white;"><?php echo $user->getName(); ?></div>
                </button>
                &nbsp
                <button class="btn btn-outline-secondary my-2 my-sm-0" onclick="location='nuevo.php?nueva=5'">
                    <img src="shopping-cart.png" style="max-width: 20px; max-height: 20px;">
                    <div style="color:white;">Carrito</div>
                </button>
                &nbsp
                <button class="btn btn-outline-secondary my-2 my-sm-0" onclick="location='../includes/logout.php'">
                    <img src="../Iconos/logout.png" style="max-width: 20px; max-height: 20px;">
                    <div style="color:white;">Cerrar Sesión</div>
                </button>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <p></p>
    <!-- CONTENIDO -->
    <div class="d-flex justify-content-center">
        <h1>Carrito Personal</h1>
        <br>

    </div>
    <div class="d-flex justify-content-center">
        <?php
        foreach ($listado as $rowi) {
            echo $rowi;
            echo "<br>";
        }
        ?>

    </div>
    <p></p>
    <div class="d-flex justify-content-center">
        <?php
        include '../Modelo/Objeto.php';

        $producto = new Producto();
        $conjunto = array();


        $repetidas = array_unique($listado);
        
        $cantidades = array();
        
        $precios = array();

        sort($listado);

        foreach ($listado as $row) {

            $aray = array();
            $objeto = new Objeto();
            $aray = $producto->obtenerObjeto($row);
            foreach ($aray as $rows) {
                $objeto->id_objeto = $rows[0];
                $objeto->nombre = $rows[1];
                $objeto->precio = $rows[2];
                $objeto->dano_arma = $rows[3];
                $objeto->dano_cristal = $rows[4];
                $objeto->nivel = $rows[5];
                $objeto->escudo = $rows[6];
                $objeto->salud = $rows[7];
                $objeto->velocidad_ataque = $rows[8];
                $objeto->dano_critico = $rows[9];
                $objeto->prob_critico = $rows[10];
                $objeto->vampirismo = $rows[11];
                $objeto->categoria_objeto = $rows[12];
                $objeto->perforacion_armadura = $rows[13];
                $objeto->reduccion_reposo = $rows[14];
                $objeto->energia_recarga = $rows[15];
                $objeto->energia_maxima = $rows[16];
                $objeto->imagen = $rows[17];
                $objeto->armadura = $rows[18];
                $objeto->perforacion_escudo = $rows[19];
            }

            $conjunto[] = $objeto;
        }

        foreach ($repetidas as $para) {
            $cant = 0;
            $pre = 0;
            $porque = new Objeto();
            foreach ($conjunto as $porque) {
                if ($para == $porque->nombre) {
                    $cant = $cant + 1;
                    $pre = $pre + $porque->precio;
                }
            }

            $cantidades[] = $cant;
            $precios[] = $pre;
        }

        $_SESSION["objetoscompra"]=$repetidas;
        $_SESSION["cantidadescompra"]=$cantidades;
        $_SESSION["precioscompra"]=$precios;

        $totalprecio = 0;
        $totalarma = 0;
        $totalcristal = 0;
        $totalescudo = 0;
        $totalsalud = 0;
        $totalvelataque = 0;
        $totaldcri = 0;
        $totalpcri = 0;
        $totalvamp = 0;
        $totalperarm = 0;
        $totalredrep = 0;
        $totalenerrec = 0;
        $totalenermax = 0;
        $totalarm = 0;
        $totalperesc = 0;
        $raw = new Objeto();
        foreach ($conjunto as $raw) {
            //echo $raw->id_objeto;
            //echo "<br>";
            $totalprecio = $totalprecio + $raw->precio;
            $totalarma = $totalarma + $raw->dano_arma;
            $totalcristal = $totalcristal + $raw->dano_cristal;
            $totalescudo = $totalescudo + $raw->escudo;
            $totalsalud = $totalsalud + $raw->salud;
            $totalvelataque = $totalvelataque + $raw->velocidad_ataque;
            $totaldcri = $totaldcri + $raw->dano_critico;
            $totalpcri = $totalpcri + $raw->prob_critico;

            if ($raw->vampirismo > $totalvamp) {
                $totalvamp = $raw->vampirismo;
            }

            if ($raw->perforacion_armadura > $totalperarm) {
                $totalperarm = $raw->perforacion_armadura;
            }

            $totalredrep = $totalredrep + $raw->reduccion_reposo;
            $totalenerrec = $totalenerrec + $raw->energia_recarga;
            $totalenermax = $totalenermax + $raw->energia_maxima;
            $totalarm = $totalarm + $raw->armadura;

            if ($raw->perforacion_escudo > $totalperesc) {
                $totalperesc = $raw->perforacion_escudo;
            }
        }
        ?>
    </div>
    <div class="d-flex justify-content-center">
        <h2>Detalle del pedido</h2>
    </div>
    <div class="d-flex justify-content-center">

        <table>

            <thead>
                <tr>
                    <th>OBJETO</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>TOTAL</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $contado = 0;
                foreach ($repetidas as $rowen) {
                ?>
                    <tr>
                        <td><?php echo $rowen ?></td>
                        <td><?php
                            foreach ($conjunto as $otra) {
                                if ($otra->nombre == $rowen) {
                                    echo $otra->precio;

                                    break;
                                }
                            }
                            ?></td>
                        <td> <?php echo $cantidades[$contado] ?> </td>
                        <td> <?php echo $precios[$contado] ?> </td>
                    </tr>

                <?php
                    $contado = $contado + 1;
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th><?php echo $totalprecio ?></th>
                </tr>
            </tfoot>
        </table>

    </div>
    <br>
    <h2 align="center">ESTADÍSTICAS DE LA CONSTRUCCIÓN</h2>

    <div align="center">
        <?php
        if ($totalarma != 0) {
        ?>
            <p><b>Daño de cristal:</b> +<?php echo $totalarma; ?> de potencia</p>
        <?php
        }
        ?>
        <?php
        if ($totalcristal != 0) {
        ?>
            <p><b>Daño de arma:</b> +<?php echo $totalcristal; ?> de potencia</p>
        <?php
        }
        ?>
        <?php
        if ($totalescudo != 0) {
        ?>
            <p><b>Escudo:</b> +<?php echo $totalescudo; ?></p>
        <?php
        }
        ?>
        <?php
        if ($totalsalud != 0) {
        ?>
            <p><b>Salud:</b> +<?php echo $totalsalud; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totalarm != 0) {
        ?>
            <p><b>Armadura:</b> +<?php echo $totalarm; ?></p>
        <?php
        }
        ?>
        <?php
        if ($totalvelataque != 0) {
        ?>
            <p><b>Velocidad de ataque:</b> +<?php echo $totalvelataque; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totaldcri != 0) {
        ?>
            <p><b>Daño crítico:</b> +<?php echo $totaldcri; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totalpcri != 0) {
        ?>
            <p><b>Probabilidad de crítico:</b> +<?php echo $totalpcri; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totalvamp != 0) {
        ?>
            <p><b>Vampirismo:</b> +<?php echo $totalvamp; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totalperarm != 0) {
        ?>
            <p><b>Perforación de armadura:</b> +<?php echo $totalperarm; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totalredrep != 0) {
        ?>
            <p><b>Reducción de reposo:</b> +<?php echo $totalredrep; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totalenerrec != 0) {
        ?>
            <p><b>Recarga de energía:</b> +<?php echo $totalenerrec; ?></p>
        <?php
        }
        ?>
        <?php
        if ($totalenermax != 0) {
        ?>
            <p><b>Energía máxima:</b> +<?php echo $totalenermax; ?> %</p>
        <?php
        }
        ?>
        <?php
        if ($totalperesc != 0) {
        ?>
            <p><b>Perforación de escudo:</b> +<?php echo $totalperesc; ?> %</p>
        <?php
        }
        $_SESSION["totalprecio"]=$totalprecio;
        ?>
        <br>
        <p></p>

        <h2> <img src="../Iconos/money.png" style="max-width: 50px; max-height: 50px;" alt="" title="Valoración de moneda virtual: Oro"> COSTO TOTAL DEL PEDIDO: <?php echo $totalprecio ?> de oro</h2>
    </div>
    <br>
    <div class="d-flex justify-content-around">
        <button class="btn btn-outline-secondary" onclick="location='nuevo.php?nueva=7'">
            <img src="../Iconos/recycle.png" style="max-width: 20px; max-height: 20px;">
            <div style="color:black;">Vaciar Carrito</div>
        </button>
        <button class="btn btn-outline-secondary" onclick="location='nuevo.php?nueva=9'">
            <img src="../Iconos/buy.png" style="max-width: 20px; max-height: 20px;">
            <div style="color:black;">Solicitar</div>
        </button>
    </div>
    <div style="min-height: 10vh;"></div>
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