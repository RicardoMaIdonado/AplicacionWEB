<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Pie.css">
    <title>VAINCE</title>
    <meta charset="UTF-8">
    <title>Vainglory Community Edition</title>
    <style>
        img {
            width: 700px;
            height: 500px;
            margin-right: 20px;
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
                <button class="btn btn-outline-secondary my-2 my-sm-0 justify-content-center" onclick="location='nuevo.php?nueva=3'">
                    <img src="user.png" style="max-width: 20px; max-height: 20px; margin-right: 0;">
                    <div style="color:white;"><?php echo $user->getName(); ?></div>
                </button>
                &nbsp
                <button class="btn btn-outline-secondary my-2 my-sm-0" onclick="location='nuevo.php?nueva=5'">
                    <img src="shopping-cart.png" style="max-width: 20px; max-height: 20px; margin-right: 0;">
                    <div style="color:white;">Carrito</div>
                </button>

            </div>
        </div>
    </nav>
    <!-- NAVBAR -->
    <p></p>
    <!-- CONTENIDO -->
    <div class="d-flex justify-content-center">
        <h1>Noticias VainCE</h1>
    </div>
    <p></p>
    <div class="container d-flex justify-content-center">
        <div class="card text-white bg-secondary mb-3" style="max-width: 90%;">
            <div class="card-header">
                <h3>1 DE ABRIL DEL 2020</h3>
            </div>
            <div class="card-body">
                <p style="text-align: justify;">
                    <img src="../Imagenes/vce.jpg" class="img-fluid" alt="Vainglory Community Edition" align="left">
                    Rogue recientemente hizo un llamado para cerrar los servidores de Vainglory. En los últimos días
                    los desarrolladores del juego han estado luchando para tener una mejor solución para el juego y
                    la base de jugadores
                    que continúan brindando su apoyo a Vainglory. Se prentende tomar como la mejor opción poner el
                    futuro de Vainglory
                    (fuera de China) en manos de la comunidad en diferentes entornos y servidores. partidarios que
                    son aficionados del
                    juego desde sus inicios.
                    Se incluye un resumen para respaldar los planes y expectativas descritos en el anuncio, los
                    mismos que se pueden encontrar
                    detallados en el siguiente <a href="https://youtu.be/g-jIIZodPP0" class="text-light font-italic">enlace</a>. El
                    objetivo es darle una idea de hacia dónde
                    se esta dirigiendo el futuro de Vainglory en los próximos días y semanas, esto a través de
                    etapas que dan inicio por la
                    descomposición de cuentas y servidores hasta una progresiva restauración donde cada una de las
                    funcionalidades y modalidades
                    de juego se irán implementando nuevamente conforme el tiempo.

                </p>
            </div>
            <div class="card-footer">
                <p><a href="http://www.vainglorygame.com/news/vainglory-community-edition" class="text-light">LEER
                        MAS...</a></p>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="card text-white bg-secondary mb-3" style="max-width: 90%;">
            <div class="card-header">
                <h3>24 DE ABRIL DEL 2020</h3>
            </div>
            <div class="card-body">
                <p style="text-align: justify;">
                    <img src="../Imagenes/artece.png" class="img-fluid" alt="Vainglory Community Edition" align="left">
                    El equipo de SEMC siempre ha estado asombrado por los increíbles artistas fanáticos que han
                    puesto energía en la
                    creación de obras de arte en Vainglory. En el pasado, se han realizado una serie de eventos de
                    fan art que
                    permitieron mostrar parte del trabajo ya realizado e incluso proporcionar recompensas virtuales
                    a algunos de los mejores diseñadores.
                    En el espíritu de cambiar Vainglory: CE en manos de la comunidad, se busca llevar este evento de
                    arte un paso más
                    allá e incorporar las piezas ganadoras directamente en la aplicación CE.
                    Se necesita actualizar elementos de la aplicación tales como
                    el logotipo/icono de la aplicación para representar el cambio
                    enfocado a la comunidad y de igual forma el
                    arte de la pantalla de inicio del juego. Como fecha límite de envío de diseños se tiene hasta el
                    15 de mayo a través de la plataforma
                    de Twiter (indicaciones y especificaciones de diseños sobre esta temática se encuentra
                    disponible en el enlace LEER MAS... de esta sección).

                </p>
            </div>
            <div class="card-footer">
                <p><a href="http://www.vainglorygame.com/news/vainglory-ce-art-event" class="text-light">LEER
                        MAS...</a></p>
            </div>
        </div>
    </div>
    <!-- CONTENIDO -->

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>