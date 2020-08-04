
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../Pie.css">
    <title>Administracion VainCE</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['mensaje'])) {
        if ($_REQUEST['mensaje'] == 1) {
            echo '<script language="javascript">alert("Actualizado en el servidor");</script>';
        } else if ($_REQUEST['mensaje'] == 2) {
            echo '<script language="javascript">alert("Se debe seleccionar un archivo");</script>';
        } else if ($_REQUEST['mensaje'] == 3) {
            echo '<script language="javascript">alert("Tamano maximo de 5000 kb");</script>';
        } else if ($_REQUEST['mensaje'] == 4) {
            echo '<script language="javascript">alert("Subido al servidor");</script>';
        } else if ($_REQUEST['mensaje'] == 5) {
            echo '<script language="javascript">alert("Actualizado en el servidor");</script>';
        } else if ($_REQUEST['mensaje'] == 6) {
            echo '<script language="javascript">alert("Error al intentar subir el archivo");</script>';
        } else if ($_REQUEST['mensaje'] == 7) {
            echo '<script language="javascript">alert("Formato de archivo incorrecto");</script>';
        } else if ($_REQUEST['mensaje'] == 8) {
            echo '<script language="javascript">alert("El archivo no es una imagen!");</script>';
        } else if ($_REQUEST['mensaje'] == 9) {
            echo '<script language="javascript">alert("Eliminado con exito desde el servidor");</script>';
        }
    }
    ?>
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

    <div style="min-height: 13vh;"></div>
    <div class="btn-group container d-flex justify-content-center">

        <button class="btn btn-outline-secondary my-2 my-sm-0" type="button" onclick="location.href='http://localhost/vaince/admin/control.php?nueva=0'" style="max-width: 200px; max-height: 200px">
            <img src="../iconos/buff.png" style="max-width: 100px; max-height: 100px;">
            <div style="color:black;">Agregar Objetos</div>
        </button>
        &nbsp &nbsp
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="button" onclick="location.href='http://localhost/vaince/admin/control.php?nueva=1'" style="max-width: 200px; max-height: 200px">
            <img src="../iconos/kill.png" style="max-width: 100px; max-height: 100px;">
            <div style="color:black;">Gestionar Objetos</div>
        </button>
        &nbsp &nbsp
        <button class="btn btn-outline-secondary my-2 my-sm-0 " type="button" onclick="location.href='http://localhost/vaince/admin/control.php?nueva=2'" style="max-width: 200px; max-height: 200px">
            <img src="../iconos/cultures.png" style="max-width: 100px; max-height: 100px;">
            <div style="color:black;">Reporte Objetos</div>
        </button>
    </div>
    <br>
    <div class="btn-group container d-flex justify-content-center">

        <button class="btn btn-outline-secondary my-2 my-sm-0" type="button" onclick="location.href='http://localhost/vaince/admin/control.php?nueva=3'" style="max-width: 200px; max-height: 200px">
            <img src="../iconos/files-and-folders.png" style="max-width: 100px; max-height: 100px;">
            <div style="color:black;">Agregar Noticia</div>
        </button>
        &nbsp &nbsp
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="button" onclick="location.href='http://localhost/vaince/admin/control.php?nueva=4'" style="max-width: 200px; max-height: 200px">
            <img src="../iconos/book.png" style="max-width: 100px; max-height: 100px;">
            <div style="color:black;">Modificar Noticias</div>
        </button>
        &nbsp &nbsp
        <button class="btn btn-outline-secondary my-2 my-sm-0 " type="button" onclick="location.href='http://localhost/vaince/admin/control.php?nueva=5'" style="max-width: 200px; max-height: 200px">
            <img src="../iconos/presentation.png" style="max-width: 100px; max-height: 100px;">
            <div style="color:black;">Vista de Noticias</div>
        </button>
    </div>

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