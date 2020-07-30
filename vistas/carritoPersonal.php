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
        foreach ($listado as $row) {
            echo "<br>";
            echo $row;
        }
        ?>
        <br>
    </div>
    <p></p>
    <div class="d-flex justify-content-center">
        <button class="btn btn-outline-secondary" onclick="location='nuevo.php?nueva=7'">
            <img src="../Iconos/recycle.png" style="max-width: 20px; max-height: 20px;">
            <div style="color:black;">Vaciar Carrito</div>
        </button>
    </div>
    

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
                    <img src="facebook.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://twitter.com/vainglory?lang=es">
                    <img src="twitter.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://www.youtube.com/channel/UCAuhvPegawFqaywNw0P7fEQ">
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