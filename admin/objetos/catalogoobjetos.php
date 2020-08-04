<!DOCTYPE html>
<?php
include 'manejoobjetos.php';
$lista = array();
$lista = (new ManejoObjetos())->ListarObjetos();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/vaince/Pie.css">
    <title>Catalogo de objetos VainCE</title>
    <style>
        @media(max-width: 768px) {
            #catalogo {
                margin-right: auto;
                margin-left: 0px;
                margin-top: 10px;
            }

        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="http://localhost/vaince/admin/indexLogin.php">
            <div style="font-family:monaco;font-size:larger">VAINCE</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <div class="btn-group" role="group">
                    <button style="color:white;" id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../iconos/sword_white.png" style="max-width: 20px; max-height: 20px;">
                        Objetos
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="http://localhost/vaince/admin/control.php?nueva=0">Agregar</a>
                        <a class="dropdown-item" href="http://localhost/vaince/admin/control.php?nueva=1">Gestionar</a>
                        <a class="dropdown-item" href="http://localhost/vaince/admin/control.php?nueva=2">Solicitar Catálogo</a>
                    </div>
                </div>
                &nbsp
                <div class="btn-group" role="group">
                    <button style="color:white;" id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../iconos/newspaper_white.png" style="max-width: 20px; max-height: 20px;">
                        Noticias
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="http://localhost/vaince/admin/control.php?nueva=3">Nueva</a>
                        <a class="dropdown-item" href="http://localhost/vaince/admin/control.php?nueva=4">Gestionar</a>
                        <a class="dropdown-item" href="http://localhost/vaince/admin/control.php?nueva=5">Vista previa</a>
                    </div>
                </div>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <div id="botonP" class="btn-group" role="group" aria-label="Button group with nested dropdown" style="margin-left: auto;">
                    <div class="btn-group" role="group">
                        <button style="color:white;" id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/vaince/Iconos/user.png" style="max-width: 20px; max-height: 20px;">
                            <?php echo $admin->getName(); ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                            <a class="dropdown-item" href="http://localhost/vaince/admin/logout.php">Cerrar Sesión</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->
    <p></p>
    <div class="d-flex justify-content-center">
        <h1>PORTAL DE OBJETOS</h1>
    </div>
    <p></p>
    <div class="container">
        <div class="d-flex flex-wrap justify-content-start p-2">
            
            <input type="button" value="Descargar Catalogo" id="catalogo" class="btn btn-dark" style="margin-left: auto;" onclick="location.href='./downloadobjetos.php'" />
            <img src="/vaince/Iconos/pdf.png" alt="" width="35" height="35">
        </div>

        <br>
        <div align="center">
            <p>
                <?php

                echo sizeof($lista);
                echo ' objetos en la base de datos.';
                ?>
            </p>
        </div>

        <?php
        if (is_array($lista) || is_object($lista)) {
            $aux = 0;
        ?>
            <div class="d-flex flex-wrap justify-content-center container">
                <?php
                foreach ($lista as $reg) {
                ?>
                    <div class="card text-white bg-dark border-dark mb-3" style="width: 16rem;">

                        <div class="card-header">
                            <img src="/vaince/Imagenes/<?php echo $reg[17]; ?>" class="card-img-top" alt="Card image cap" title="Click para ver descripción" onclick="caracterizar(<?php echo $reg[0]; ?>)" width="55px" height="205px">
                        </div>

                        <div class="card-body bg-dark">

                            <p class="card-text">NOMBRE: <?php echo $reg[1]; ?></p>

                            <p class="card-text">TIPO:
                                <?php
                                if ($reg[12] == 1) {
                                    echo "Arma";
                                } else if ($reg[12] == 2) {
                                    echo "Cristal";
                                } else if ($reg[12] == 3) {
                                    echo "Defensa";
                                } else if ($reg[12] == 4) {
                                    echo "Utilidad";
                                } else if ($reg[12] == 5) {
                                    echo "Consumible";
                                }
                                ?>

                            </p>

                            <p class="card-text">COSTO: <?php echo $reg[2]; ?></p>

                        </div>

                    </div>
                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <?php
                    $aux++;
                    if ($aux == 3) {
                    ?>
            </div>
            <?php
                        $aux = 0;
            ?>
            <div class="d-flex flex-wrap justify-content-center container">
    <?php
                    }
                }
            } else {
                echo '<script language="javascript">alert("No existen objetos con estas caracteristicas.");</script>';
                echo '<script language="javascript">alert("CLICK EN EL BOTON FILTRAR NUEVAMENTE.");</script>';
            }

    ?>
            </div>
    </div>

    <script>
        function caracterizar(co) {
            location.href = "objetos/descripcion.php?cod=" + co;
        }
    </script>

    <div style="min-height: 4vh;"></div>
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
                    <img src="/vaince/Iconos/facebook.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://twitter.com/vainglory?lang=es" target="_blank">
                    <img src="/vaince/Iconos/twitter.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://www.youtube.com/channel/UCAuhvPegawFqaywNw0P7fEQ" target="_blank">
                    <img src="/vaince/Iconos/youtube.png" alt=""></a>
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