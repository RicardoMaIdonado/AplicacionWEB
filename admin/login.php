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
    </nav>
    <!-- NAVBAR -->

    <!-- CONTENIDDO -->
    <p></p>
    <br>
    <div class="d-flex justify-content-center">

        <h1 align="center">Formulario de Ingreso para Administradores VainCE</h1>

    </div>
    <p></p>

    <div class="container d-flex justify-content-center">
        <div class="card text-white bg-secondary mb-3" style="max-width: 23rem;">
            <div class="card-header">
                <h3>Datos Personales</h3>
            </div>
            
            <form action="" method="POST">
                <?php
                if (isset($errorLogin)) {
                    echo '<script language="javascript">alert("Nombre de usuario o password incorrectos");</script>';
                }
                ?>

                <div class="card-body">
                    <div class="container">
                        <h5 class="card-title">Email</h5>
                        <div class="input">
                            <input name="mail" required type="email" placeholder="usuario@mail.com" />
                        </div>
                        &nbsp
                    </div>
                    <div class="container">
                        <h5 class="card-title">Contraseña:</h5>
                        <div class="input">
                            <input name="password" required type="password" placeholder="eg. X8df!90EO" title="Debe contener al menos un número y una letra minúscula y mayúscula, y al menos 8 o más caracteres" />
                        </div>
                        &nbsp
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <p class="center"><input type="submit" value="Iniciar Sesion">
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- CONTENIDDO -->
  

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
                    <img src="../Iconos/facebook.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://twitter.com/vainglory?lang=es" target="_blank">
                    <img src="../Iconos/twitter.png" alt=""></a>
            </div>
            <div class="information">
                <a href="https://www.youtube.com/channel/UCAuhvPegawFqaywNw0P7fEQ" target="_blank">
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