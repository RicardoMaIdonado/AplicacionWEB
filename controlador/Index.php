<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script>
        function ingresar() {
            location.href = "Tienda.php?op=0&niv=0";
        }
    </script>
    <?php
        session_start();
        unset($_SESSION['listado']);
        $_SESSION['listado']=array();
    ?>
</head>

<body onload="ingresar()">

</body>

</html>