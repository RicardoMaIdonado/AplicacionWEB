<!DOCTYPE html>

<?php
$lista = array();
$lista = $_SESSION['lista'];

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../vaince/Pie.css">
    <title>VAINCE</title>
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
        <a class="navbar-brand"><div style = "font-family:monaco;font-size:larger">VAINCE</div></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/vaince/indexLogin.php?op=0&niv=0"><div style="color:white;">Objetos</div></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/vaince/vistas/nuevo.php?nueva=1"><div style="color:white;">Noticias</div></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/vaince/vistas/nuevo.php?nueva=0"><div style="color:white;">Comunidad</div></a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-secondary my-2 my-sm-0 justify-content-center" onclick="location='vistas/nuevo.php?nueva=3'">
                    <img src="../vaince/Iconos/user.png" style="max-width: 20px; max-height: 20px;">
                    <div style="color:white;"><?php echo $user->getName(); ?></div>
                </button>
                &nbsp
                <button class="btn btn-outline-secondary my-2 my-sm-0" onclick="location='vistas/nuevo.php?nueva=5'">
                    <img src="../vaince/Iconos/shopping-cart.png" style="max-width: 20px; max-height: 20px;">
                    <div style="color:white;">Carrito</div>
                </button>

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

            <select id="producto" name="producto" onchange="ShowSelected();">
                <option value="0">Categoria</option>
                <option value="1">Arma</option>
                <option value="2">Cristal</option>
                <option value="3">Defensa</option>
                <option value="4">Utilidad</option>
                <option value="5">Consumible</option>
            </select>
            &nbsp &nbsp
            <select id="nivel" name="nivel" onchange="ShowSelected();">
                <option value="0">Nivel</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            &nbsp &nbsp
            <input type="button" value="Filtrar" class="btn btn-dark" onclick="filtrar()" />

            <input type="button" value="Solicitar Catalogo" id="catalogo" class="btn btn-dark" style="margin-left: auto;" onclick="location.href=''"/>

        </div>

        <br>
        <div align="center">
            <p>
                <?php

                echo sizeof($lista);
                echo ' objetos encontrados en la búsqueda.';
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
                        <div class="card-footer" align="right">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="button" class="btn btn-outline-light" onclick="enviar(<?php echo $reg[0]; ?>)">
                                <img src="../vaince/Iconos/shopping-cart.png" style="max-width: 20px; max-height: 20px;">
                            </button>
                        </div>
                        <div class="card-header">
                            <img src="../vaince/Imagenes/<?php echo $reg[17]; ?>" class="card-img-top" alt="Card image cap" title="Click para ver descripción" onclick="caracterizar(<?php echo $reg[0]; ?>)" width="55px" height="205px">
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
        function enviar(c) {

            location.href = "vistas/nuevo.php?cod=" + c +"&nueva=4";
        }
    </script>

    <script>
        function caracterizar(co) {
            location.href = "vistas/nuevo.php?cod=" + co + "&nueva=2";
        }
    </script>
    <script type="text/javascript"></script>
    <script language="javascript">
        function filtrar() {
            var combo = document.getElementById("producto").value;
            var combo2 = document.getElementById("nivel").value;
            location.href = 'indexLogin.php?op=' + combo + '&niv=' + combo2;

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
                    <img src="../vaince/Iconos/facebook.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://twitter.com/vainglory?lang=es">
                    <img src="../vaince/Iconos/twitter.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://www.youtube.com/channel/UCAuhvPegawFqaywNw0P7fEQ">
                    <img src="../vaince/Iconos/youtube.png" alt=""></a>
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