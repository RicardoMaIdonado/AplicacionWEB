<!doctype html>
<html>

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

            display: inline-block;
            margin: 10px 10px 10px 10px;
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
                    <a class="nav-link" href="/vaince/indexLogin.php?op=0&niv=0">
                        <div style="color:white;">Objetos</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nuevo.php?nueva=1">
                        <div style="color:white;">Noticias</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nuevo.php?nueva=0">
                        <div style="color:white;">Comunidad</div>
                    </a>
                </li>
              
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <div id="botonP" class="btn-group" role="group" aria-label="Button group with nested dropdown" style="margin-left: auto;">
                    <div class="btn-group" role="group">
                        <button style="color:white;" id="btnGroupDrop1" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (isset($_SESSION['user_image'])) {
                                echo '<img src="' . $_SESSION["user_image"] . '" style="max-width: 20px; max-height: 20px;" />';
                            } else {
                            ?>
                                <img src="/vaince/Iconos/user.png" style="max-width: 20px; max-height: 20px;">
                            <?php
                            }
                            ?>

                            <?php

                            echo $user->getName();

                            ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="nuevo.php?nueva=3">Perfil</a>
                            <a class="dropdown-item" href="/vaince/includes/logout.php">Cerrar Sesión</a>

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
    <!-- Contenido -->
    <p></p>
    <div class="d-flex justify-content-center">
        <h1>Comunidad VainCE</h1>
    </div>
    <p></p>
    <div class="container">
        <div class="card text-white bg-secondary mb-3">
            <div class="card-header">
                <h3>Videos destacados</h3>
            </div>
            <div class="card-body">
                <div class="horizontal-scroll-contenedor">


                    <?php
                    //$API_KEY = "AIzaSyA38ZHKVV9slEstCqXJtVZvFHcPXOwTpqM";
                    $CHANNEL_ID = "UCAuhvPegawFqaywNw0P7fEQ";
                    $MAX_RESULT = 10;
                    $uri_relativa = 'https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCAuhvPegawFqaywNw0P7fEQ&maxResults=10&order=date&key=' . $API_KEY;
                    $video_lista = json_decode(file_get_contents($uri_relativa), true);

                    echo "<br>";
                    for ($id = 0; $id < sizeof($video_lista['items']); $id++) {
                    ?>
                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video_lista['items'][$id]['id']['videoId'] ?>" allowfullscreen></iframe>
                        </div>
                    <?php
                    }
                    ?>




                </div>
            </div>
        </div>
        <br>



        <p></p>

        <script>
            function buscar() {
                location = "nuevo.php?nueva=0&buscar=" + document.getElementById("buscador").value;

            }
        </script>

        <div class="card text-white bg-secondary mb-3">
            <div class="card-header">
                <h3>Imagenes detacadas</h3>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="q" id="buscador" value="<?php
                                                                                            if (isset($_SESSION['buscar'])) {
                                                                                                echo $_SESSION['buscar'];
                                                                                            } else {
                                                                                                echo "vainglory";
                                                                                            } ?>" />
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="button" id="button-addon2" onclick="buscar()">BUSCAR</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="horizontal-scroll-contenedor">
                    <?php
                    $img_pattern = '/<img[^>]+>/i';
                    //$datos = array();
                    if (isset($_REQUEST['buscar'])) {
                        $word = $_REQUEST['buscar'];
                    } else {
                        $word = "vainglory";
                    }

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://www.google.com.mx/search?q=" . urlencode($word) . "&source=lnms&tbm=isch");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $curlout = curl_exec($ch);
                    curl_close($ch);
                    preg_match_all($img_pattern, $curlout, $img_tags);
                    for ($id = 1; $id < sizeof($img_tags[0]); $id++) {
                    ?>
                        <a target="_blank" href="https://www.google.com.mx/search?q=<?php echo urlencode($word) ?>&source=lnms&tbm=isch">
                            <?php echo $img_tags[0][$id]; ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <br>
        <h3 align="center"><i>Apóyanos para continuar desarrollando...</i></h3>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" align="center">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="2T7L3SFL2EBYJ">
            <input type="image" src="/vaince/Iconos/donate.png" border="0" width="105px" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>

    <!-- Contenido -->

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