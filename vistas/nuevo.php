<?php

include_once '../includes/user.php';
include_once '../includes/productos.php';
include_once '../includes/user_session.php';

$userSession = new UserSession();
$user = new User();
$producto = new Producto();
$bol = isset($_SESSION['user']);
if (isset($_SESSION['user'])) {
    //echo "Hay sesion";
    $user->setUser($userSession->getCurrentUser());

    if ($_REQUEST['nueva'] == 0) {
        include_once 'comunidadLog.php';
    } else if ($_REQUEST['nueva'] == 1) {
        include_once 'noticiasLog.php';
    } else if ($_REQUEST['nueva'] == 2) {
        $_SESSION['codigo'] = $_REQUEST['cod'];
        include_once 'DescripcionObjeto.php';
    } else if ($_REQUEST['nueva'] == 3) {
        include_once 'home.php';
    } else if ($_REQUEST['nueva'] == 4) {
        $_SESSION['codigo'] = $_REQUEST['cod'];
        include_once 'Detalle.php';
    } else if ($_REQUEST['nueva'] == 5) {
        include_once '../vistas/carritoPersonal.php';
    } else if ($_REQUEST['nueva'] == 6) {
        include_once 'agregado.php';
    } else if ($_REQUEST['nueva'] == 7) {
        unset($_SESSION['listado']);
        $_SESSION['listado'] = array();
        echo '<script language="javascript">alert("Carrito vacio");</script>';
        include_once '../vistas/carritoPersonal.php';
    } else if ($_REQUEST['nueva'] == 8) {
        if ($_REQUEST['mensaje'] == 0) {
            echo '<script type="text/javascript">alert("Nada para actualizar")</script>';
        } else if ($_REQUEST['mensaje'] == 1) {
            echo '<script type="text/javascript">alert("Nombre y Apellido actualizados con éxito")</script>';
        } else if ($_REQUEST['mensaje'] == 2) {
            echo '<script type="text/javascript">alert("Nombre actualizado con éxito")</script>';
        } else if ($_REQUEST['mensaje'] == 3) {
            echo '<script type="text/javascript">alert("Apellido actualizado con éxito")</script>';
        } else if ($_REQUEST['mensaje'] == 4) {
            echo '<script type="text/javascript">alert("Contraseña actualizada con éxito")</script>';
        } else if ($_REQUEST['mensaje'] == 5) {
            echo '<script type="text/javascript">alert("Las contraseñas no coinciden")</script>';
        }
        include_once 'home.php';
    } else if ($_REQUEST['nueva'] == 9) {
        include '../includes/pedido.php';
        include '../includes/pedido_objeto.php';
        $pedido = new Pedido();
        $pedido->ingreso($user->getID(), $_SESSION["totalprecio"]);

        $objetoscompra = array();
        $objetoscompra = $_SESSION['objetoscompra'];
        $cantidadescompra = array();
        $cantidadescompra = $_SESSION['cantidadescompra'];
        $precioscompra = array();
        $precioscompra = $_SESSION['precioscompra'];

        $ult = 0;
        $ultimo = $pedido->getUltimoPedido();
        foreach ($ultimo as $re) {
            $ult = $re[0];
        }

        $idsobjetos = array();
        $prod = new Producto();

        foreach ($objetoscompra as $nue) {
            $te = array();
            $te = $prod->obtenerObjeto($nue);
            foreach ($te as $oter) {
                $idsobjetos[] = $oter[0];
            }
        }

        $pedido_objeto = new Pedido_Objeto();
        for ($i = 0; $i < sizeof($idsobjetos); $i++) {
            $pedido_objeto->ingreso($ult, $idsobjetos[$i], $cantidadescompra[$i]);
        }

        $estats = array();
        $estats = $_SESSION["estadisticas"];

        include '../plantillaD.php';

        $pdf = new PDF();
        $pdf->AliasNbPages();

        $pdf->AddPage();
        $pdf->SetFillColor(1, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(70, 6, 'Nombre objeto', 1, 0, 'C', 1);
        $pdf->Cell(30, 6, 'Cantidad', 1, 0, 'C', 1);
        $pdf->Cell(30, 6, 'Precio', 1, 1, 'C', 1);

        for ($j = 0; $j < sizeof($objetoscompra); $j++) {
            $pdf->Cell(70, 6, $objetoscompra[$j], 1, 0, 'C');
            $pdf->Cell(30, 6, $cantidadescompra[$j], 1, 0, 'C');
            $pdf->Cell(30, 6, $precioscompra[$j], 1, 1, 'C');
        }

        $pdf->Cell(100, 6, 'Total a pagar', 1, 0, 'R', 1);
        $pdf->Cell(30, 6, $_SESSION["totalprecio"], 1, 1, 'C');
        $pdf->Cell(70, 6, ' ', 0, 1, 'C');
        for ($h = 0; $h < sizeof($estats); $h++) {
            $pdf->Cell(70, 6, utf8_decode($estats[$h]), 0, 1, 'C');
        }

        $pdf->Output('F', 'C:/Users/CRISR/Downloads/Documents/prueba.pdf');

        unset($_SESSION['listado']);
        $_SESSION['listado'] = array();
        //include_once '../vistas/carritoPersonal.php';
        header('Location: ../indexLogin.php?op=0&niv=0&c=1');
    }
}
