<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Pie.css">
    <title>VAINCE</title>
    <meta charset="UTF-8">
    <title>Vainglory Community Edition</title>
    <style>
        #imge {
            width: 700px;
          
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/vaince/inicio.html">
            <div style="font-family:monaco;font-size:larger">VAINCE</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/vaince/controlador/Index.php">
                        <div style="color:white;">Objetos</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="noticias.php">
                        <div style="color:white;">Noticias</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comunidad.php">
                        <div style="color:white;">Comunidad</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios.php">
                        <div style="color:white;">Héroes</div>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- NAVBAR -->
    <p></p>
    <!-- CONTENIDO -->
    <div class="d-flex justify-content-center">
        <h1>Noticias VainCE</h1>
    </div>
    <p></p>

    <?php
    include '../includes/ConexionDB.php';
    include '../admin/noticias/manejonoticias.php';
    $noticias = array();
    $noticias = (new ManejoNoticias())->ListarNoticias();
    foreach ($noticias as $raw) {
    ?>
        <div class="container d-flex justify-content-center">
            <div class="card text-white bg-secondary mb-3" style="max-width: 90%;">
                <div class="card-header">
                    <h3><?php echo $raw[1] . ' [' . $raw[5] .']'?></h3>
                </div>
                <div class="card-body">
                    <p style="text-align: justify;">
                        <img id="imge" src="../admin/uploads/<?php echo $raw[4] ?>" class="img-fluid" alt="Vainglory Community Edition" align="left" title="Etiqueta publicitaria de Vainglory CE.">
                        <?php
                        echo $raw[3];
                        ?>
                    </p>
                </div>
                <div class="card-footer">
                    <p><a href=<?php echo $raw[2] ?> target="_blank" class="text-light">LEER
                            MAS...</a></p>

                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- CONTENIDO -->

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