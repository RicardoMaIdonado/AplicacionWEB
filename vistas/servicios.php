<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Pie.css">
    <title>Campeones Gratis</title>
    <style>
        .horizontal-scroll-contenedor {
            overflow-y: hidden;
            overflow-x: auto;
            text-align: left;
            white-space: nowrap;
            width: auto;
            height: auto;
            margin: 0 auto;
            max-width: 900;
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
        <a class="navbar-brand" href="https://localhost/vaince/inicio.html">
            <div style="font-family:monaco;font-size:larger">VAINCE</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://localhost/vaince/controlador/Index.php">
                        <div style="color:white;">Objetos</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://localhost/vaince/vistas/noticias.php">
                        <div style="color:white;">Noticias</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://localhost/vaince/vistas/comunidad.php">
                        <div style="color:white;">Comunidad</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://webvaince.herokuapp.com/vistas/servicios.php">
                        <div style="color:white;">Héroes</div>
                    </a>
                </li>
            </ul>

        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button style="color:white;" class="btn btn-outline-secondary my-2 my-sm-0" type="button"
                    onclick="location.href='https://localhost/vaince/indexLogin.php'">
                    <img src="user.png" style="max-width: 20px; max-height: 20px;">
                    Iniciar Sesion
                </button>
                &nbsp
                <button style="color:white;" class="btn btn-outline-secondary my-2 my-sm-0" type="button"
                    onclick="location.href='https://localhost/vaince/indexSignIn.php'">
                    <img src="signin.png" style="max-width: 20px; max-height: 20px;">
                    Registrarse
                </button>
            </form>
        </div>
    </nav>
    <!-- NAVBAR -->
    <p></p>
    <div class="d-flex justify-content-center">
        <h2>Rotacion gratuita</h2>
    </div>
    <p></p>
    <!-- Contenido -->

    <?php
    //SE DEBE ACTUALIZAR LA CLAVE
    $apilol = "RGAPI-e2f4a61b-91e5-4611-81b8-ff360293f78f";
    $uri_relativa = "https://la1.api.riotgames.com/lol/platform/v3/champion-rotations?api_key=".$apilol;
    $gratuito = json_decode(file_get_contents($uri_relativa), true);
    $path = "../dragontail/10.10.3224670/data/es_MX/champion.json";
    $info = json_decode(file_get_contents($path), true);
    foreach ($info["data"] as $reg) {
        $id = $reg["id"]; //esto son los nombres no los #id!
        $blurb = $reg["blurb"];
        $name = $reg["name"];
        $key = $reg["key"];
        if (
            $gratuito["freeChampionIds"][0] == $key || $gratuito["freeChampionIds"][1] == $key || $gratuito["freeChampionIds"][6] == $key
            || $gratuito["freeChampionIds"][3] == $key || $gratuito["freeChampionIds"][4] == $key || $gratuito["freeChampionIds"][5] == $key
        ) {
    ?>
            <div class="container d-flex justify-content-center">
                <div class="card-deck">
                    <div class="card">
                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                            <?php
                            $API_KEY = "AIzaSyB9Q0j7eqvS1cF-aK1RTdTrl6LcVJamZas";
                            $uri_relativa = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&q=' . $name . '%20champion%20spotlight&key=' . $API_KEY;
                            $video_lista = json_decode(file_get_contents($uri_relativa), true);
                            $vidID = $video_lista['items'][0]['id']['videoId'];
                            ?>
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $vidID ?>" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $name ?></h5>
                            <?php
                            $path2 = "../dragontail/10.10.3224670/data/es_MX/champion/" . $id . ".json";
                            $info2 = json_decode(file_get_contents($path2), true);
                            foreach ($info2["data"] as $reg2) {
                                $idsito = $reg2["id"];
                                $lore = $reg2["lore"];
                            ?>
                                <p class="card-text">
                                    <?php echo $lore ?>
                                </p>
                        </div>
                        <div class="card-footer">
                            <div class="horizontal-scroll-contenedor">
                                <?php
                                $skins = $reg2["skins"];
                                $totalskins = sizeof($reg2["skins"]);
                                for ($i = 0; $i < $totalskins; $i++) {
                                    $imagenText = $idsito . "_" . $skins[$i]["num"] . ".jpg";
                                ?>
                                    <a href="../dragontail/img/champion/splash/<?php echo $imagenText ?>" target="_blank">
                                        <img src="../dragontail/img/champion/splash/<?php echo $imagenText ?>" class="card-img-top" alt="Card image cap" title="Click para ver descripción" style="max-width: 500px;">
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                            }
                    ?>
                    </div>
                </div>
            </div>
            <br>
    <?php
        }
    }
    ?>
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
