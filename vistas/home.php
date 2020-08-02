<!DOCTYPE html>
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

    <section>
        <h1>Bienvenido <?php echo $user->getName();
                        echo " ";
                        echo $user->getApellido(); ?></h1>
    </section>
    <!-- CONTENIDDO -->
    <div class="d-flex justify-content-center">
        <h1 align="center">Perfil de Usuario VainCE</h1>
    </div>
    <br>
    <div class="container d-flex justify-content-center">
        <div class="card text-white bg-secondary mb-3" style="max-width: 23rem;">
            <div class="card-header">
                <h3>Datos Personales</h3>
            </div>
            <form action="actualizacion.php" method="POST">
                <?php
                if (isset($ninguno)) {
                    echo '<script language="javascript">alert("Nada que actualizar");</script>';
                }
                if (isset($success)) {
                    echo '<script language="javascript">alert("Datos actualizados con exito");</script>';
                }

                ?>
                <div class="card-body">
                    <div class="container">
                        <h5 class="card-title">Nombre:</h5>
                        <div class="input">
                            <input name="username_reg" type="text" placeholder=<?php echo $user->getName(); ?> />
                        </div>
                        &nbsp
                    </div>

                    <div class="container">
                        <h5 class="card-title">Apellido:</h5>
                        <div class="input">
                            <input name="userapell_reg" type="text" placeholder=<?php echo $user->getApellido(); ?>/>
                        </div>
                        &nbsp
                    </div>

                    <label for="correo_usuario" class="center"><?php echo $user->getUser(); ?></label>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <p class="center"><input type="submit" value="Actualizar Datos">
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="card text-white bg-secondary mb-3" style="max-width: 23rem;">
            <div class="card-header">
                <h3>Contraseña</h3>
            </div>
            <form action="actualizacionPass.php" method="POST">
                <?php
                if (isset($errorPass)) {
                    echo '<script language="javascript">alert("Las contraseñas no coinciden!");</script>';
                }
                if (isset($successP)) {
                    echo '<script language="javascript">alert("Contraseña actualizada con éxito");</script>';
                }
                ?>
                <div class="card-body">
                    <div class="container">
                        <h5 class="card-title">Contraseña:</h5>
                        <div class="input">
                            <input name="password" required type="password" placeholder="eg. X8df!90EO" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra minúscula y mayúscula, y al menos 8 o más caracteres" />
                        </div>
                        &nbsp
                    </div>
                    <div class="container">
                        <h5 class="card-title">Confirmar contraseña:</h5>
                        <div class="input">
                            <input name="password_confirm" required type="password" placeholder="eg. X8df!90EO" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra minúscula y mayúscula, y al menos 8 o más caracteres" />
                        </div>
                        &nbsp
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <p class="center"><input type="submit" value="Actualizar Contraseña">
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- CONTENIDDO -->
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