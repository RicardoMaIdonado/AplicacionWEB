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

        #imagen {
            max-width: 60px;
            max-height: 60px;
            margin-right: 10px;
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
                $objeto->dano_cristal = $rows[3];
                $objeto->dano_arma = $rows[4];
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
        $valores = array();
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
            $valores[] = $para;
        }

        $_SESSION["objetoscompra"] = $valores;
        $_SESSION["cantidadescompra"] = $cantidades;
        $_SESSION["precioscompra"] = $precios;

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
        $estadisticas = array();

        if ($totalcristal != 0) {
        ?>
            <p><b>Daño de cristal:</b> +<?php echo $totalcristal; ?> de potencia</p>
        <?php
            $estadisticas[] = "Daño de cristal: " . $totalcristal;
        }
        ?>
        <?php
        if ($totalarma != 0) {
        ?>
            <p><b>Daño de arma:</b> +<?php echo $totalarma; ?> de potencia</p>
        <?php
            $estadisticas[] = "Daño de arma: " . $totalarma;
        }
        ?>
        <?php
        if ($totalescudo != 0) {
        ?>
            <p><b>Escudo:</b> +<?php echo $totalescudo; ?></p>
        <?php
            $estadisticas[] = "Escudo: " . $totalescudo;
        }
        ?>
        <?php
        if ($totalsalud != 0) {
        ?>
            <p><b>Salud:</b> +<?php echo $totalsalud; ?> %</p>
        <?php
            $estadisticas[] = "Salud: " . $totalsalud;
        }
        ?>
        <?php
        if ($totalarm != 0) {
        ?>
            <p><b>Armadura:</b> +<?php echo $totalarm; ?></p>
        <?php
            $estadisticas[] = "Armadura: " . $totalarm;
        }
        ?>
        <?php
        if ($totalvelataque != 0) {
        ?>
            <p><b>Velocidad de ataque:</b> +<?php echo $totalvelataque; ?> %</p>
        <?php
            $estadisticas[] = "Velocidad de ataque: " . $totalvelataque;
        }
        ?>
        <?php
        if ($totaldcri != 0) {
        ?>
            <p><b>Daño crítico:</b> +<?php echo $totaldcri; ?> %</p>
        <?php
            $estadisticas[] = "Daño crítico: " . $totaldcri;
        }
        ?>
        <?php
        if ($totalpcri != 0) {
        ?>
            <p><b>Probabilidad de crítico:</b> +<?php echo $totalpcri; ?> %</p>
        <?php
            $estadisticas[] = "Posibilidad de crítico: " . $totalpcri;
        }
        ?>
        <?php
        if ($totalvamp != 0) {
        ?>
            <p><b>Vampirismo:</b> +<?php echo $totalvamp; ?> %</p>
        <?php
            $estadisticas[] = "Vampirismo: " . $totalvamp;
        }
        ?>
        <?php
        if ($totalperarm != 0) {
        ?>
            <p><b>Perforación de armadura:</b> +<?php echo $totalperarm; ?> %</p>
        <?php
            $estadisticas[] = "Perforación de armadura: " . $totalperarm;
        }
        ?>
        <?php
        if ($totalredrep != 0) {
        ?>
            <p><b>Reducción de reposo:</b> +<?php echo $totalredrep; ?> %</p>
        <?php
            $estadisticas[] = "Reducción de reposo: " . $totalredrep;
        }
        ?>
        <?php
        if ($totalenerrec != 0) {
        ?>
            <p><b>Recarga de energía:</b> +<?php echo $totalenerrec; ?></p>
        <?php
            $estadisticas[] = "Recarga de energía: " . $totalenerrec;
        }
        ?>
        <?php
        if ($totalenermax != 0) {
        ?>
            <p><b>Energía máxima:</b> +<?php echo $totalenermax; ?> %</p>
        <?php
            $estadisticas[] = "Energía máxima: " . $totalenermax;
        }
        ?>
        <?php
        if ($totalperesc != 0) {
        ?>
            <p><b>Perforación de escudo:</b> +<?php echo $totalperesc; ?> %</p>
        <?php
            $estadisticas[] = "Perforación de escudo: " . $totalperesc;
        }
        $_SESSION["totalprecio"] = $totalprecio;
        $_SESSION["estadisticas"] = $estadisticas;
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

    <br>
    <?php
    //include '../Modelo/Objeto.php';
    $primeralista = array();

    $primeralista = $producto->pedidousuario($user->getID());

    foreach ($primeralista as $pre) {
        $objetos = array();
        $lista = array();
        $lista = $producto->carrito($user->getID(), $pre[0]);
        foreach ($lista as $tre) {
            for ($i = 0; $i < $tre[4]; $i++) {
                $objeto = new Objeto();
                $liston = array();
                $liston = $producto->objetoconID($tre[3]);
                foreach ($liston as $row) {
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
                    $objeto->perforacion_escudo = $row[19];
                }
                $objetos[] = $objeto;
            }
        }
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

        foreach ($objetos as $raw) {

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

        $estadisticas = array();

        if ($totalcristal != 0) {
            $estadisticas[] = "Daño de cristal: " . $totalcristal;
        }

        if ($totalarma != 0) {
            $estadisticas[] = "Daño de arma: " . $totalarma;
        }

        if ($totalescudo != 0) {
            $estadisticas[] = "Escudo: " . $totalescudo;
        }

        if ($totalsalud != 0) {
            $estadisticas[] = "Salud: " . $totalsalud;
        }

        if ($totalarm != 0) {
            $estadisticas[] = "Armadura: " . $totalarm;
        }

        if ($totalvelataque != 0) {
            $estadisticas[] = "Velocidad de ataque: " . $totalvelataque;
        }

        if ($totaldcri != 0) {
            $estadisticas[] = "Daño crítico: " . $totaldcri;
        }

        if ($totalpcri != 0) {
            $estadisticas[] = "Posibilidad de crítico: " . $totalpcri;
        }

        if ($totalvamp != 0) {
            $estadisticas[] = "Vampirismo: " . $totalvamp;
        }

        if ($totalperarm != 0) {
            $estadisticas[] = "Perforación de armadura: " . $totalperarm;
        }

        if ($totalredrep != 0) {
            $estadisticas[] = "Reducción de reposo: " . $totalredrep;
        }

        if ($totalenerrec != 0) {
            $estadisticas[] = "Recarga de energía: " . $totalenerrec;
        }

        if ($totalenermax != 0) {
            $estadisticas[] = "Energía máxima: " . $totalenermax;
        }

        if ($totalperesc != 0) {
            $estadisticas[] = "Perforación de escudo: " . $totalperesc;
        }
    ?>

        <!-- CONTENIDO CARRITOS ANTERIORES-->
        <div class="mx-auto" style="max-width: 700px;">
            <form action="formCarrito.php" method="post">
                <div class="card mb-3  text-white bg-secondary">
                    <div class="card-title" style="margin-left: 15px;">
                        <h5>Fecha: <?php echo $pre[2] ?></h5>
                        <div class="input-group input-group-sm mb-3 bg-secondary text-white">
                            <div class="input-group-prepend bg-secondary">
                                <span class="input-group-text bg-secondary text-white border-0" id="inputGroup-sizing-sm">Pedido #</span>
                            </div>
                            <input class="form-control bg-secondary text-white border-0" name="idpedido" type="text" value=<?php echo $pre[0] ?> readonly />
                        </div>
                    </div>
                    <div class="d-flex row no-gutters" style="margin-left: 15px;">

                        <div class="d-flex align-content-start flex-wrap col-md-4">

                            <?php
                            $re = new Objeto();
                            $contador = 1;
                            echo "<br>";

                            foreach ($objetos as $re) {
                            ?>
                                <!--Aqui comineza el bucle de recuperacion para fotos-->
                                <img id="imagen" src="../Imagenes/<?php echo $re->imagen ?>" class="card-img" alt="" title="<?php echo $re->nombre ?>">

                                <?php
                                if ($contador = 3) {
                                    echo "<br>";
                                }
                                $contador = $contador + 1;
                                ?>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <!--Aqui comineza el bucle de recuperacion de estadisticas-->
                                <?php
                                foreach ($estadisticas as $rere) {
                                ?>
                                    <p class="card-text"><?php echo $rere; ?></p>
                                <?php

                                }
                                ?>

                            </div>
                            <div class="card-footer bg-transparent d-flex justify-content-between">
                                <!--Recuperacion del costo total-->
                                <p>ORO TOTAL: <?php echo $pre[4] ?> </p>
                                <!--Boton para enviar al correo del usuario-->
                                <div id="boton" class="btn-group" role="group" aria-label="Button group with nested dropdown" style="margin-left: auto;">
                                    <div class="btn-group" role="group" style="border: black;">
                                        <button style="color:white;" id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="../Iconos/pdf.png" style="max-width: 20px; max-height: 20px;">
                                            Solicitar
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <input type="submit" name="boton1" class="dropdown-item" value="Visualizar PDF">
                                            <input type="submit" name="boton2" class="dropdown-item" value="Enviar por correo">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php
    }
    ?>
    <!-- CONTENIDO -->

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