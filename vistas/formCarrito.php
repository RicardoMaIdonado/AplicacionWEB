<?php

include_once '../includes/user.php';
include_once '../includes/user_session.php';
include '../plantillaC.php';
include '../includes/productos.php';
include '../Modelo/Objeto.php';

//lo siguiente es necesario para la parte de envio del pedido por correo en formato pdf

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../includes/Exception.php';
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';

//

$userSession = new UserSession();
$user = new User();
$user->setUser($userSession->getCurrentUser());
$producto = new Producto();
$primeralista = array();

$primeralista = $producto->pedidousuariofecha($user->getID(), $_POST['idpedido']);
$objetos = array();
$lista = array();
$lista = $producto->carrito($user->getID(), $_POST['idpedido']);
foreach ($lista as $tre) {
    for ($i = 0; $i < $tre[4]; $i++) {
        $objeto = new Objeto();
        $liston = array();
        $liston = $producto->objetoconID($tre[3]);
        foreach ($liston as $row) {
            $objeto->id_objeto = $row[0];
            $objeto->nombre = $row[1];
            $objeto->precio = $row[2];
            $objeto->dano_cristal = $row[3];
            $objeto->dano_arma = $row[4];
            $objeto->nivel = $row[5];
            $objeto->escudo = $row[6];
            $objeto->salud = $row[7];
            $objeto->velocidad_ataque = $row[8];
            $objeto->dano_critico = $row[9];
            $objeto->prob_critico = $row[10];
            $objeto->vampirismo = $row[11];
            $objeto->categoria_objeto = $row[12];
            $objeto->perforacion_armadura = $row[13];
            $objeto->reduccion_reposo = $row[14];
            $objeto->energia_recarga = $row[15];
            $objeto->energia_maxima = $row[16];
            $objeto->imagen = $row[17];
            $objeto->armadura = $row[18];
            $objeto->perforacion_escudo = $row[19];
        }
        $objetos[] = $objeto;
    }
}
$totalprecio = 0;
$totalarma = 0;
$totalcristal = 0;
$totalescudo = 0;
$totalsalud = 0;
$totalvelataque = 0;
$totaldcri = 0;
$totalpcri = 0;
$totalvamp = 0;
$totalperarm = 0;
$totalredrep = 0;
$totalenerrec = 0;
$totalenermax = 0;
$totalarm = 0;
$totalperesc = 0;
$raw = new Objeto();

foreach ($objetos as $raw) {

    $totalprecio = $totalprecio + $raw->precio;
    $totalarma = $totalarma + $raw->dano_arma;
    $totalcristal = $totalcristal + $raw->dano_cristal;
    $totalescudo = $totalescudo + $raw->escudo;
    $totalsalud = $totalsalud + $raw->salud;
    $totalvelataque = $totalvelataque + $raw->velocidad_ataque;
    $totaldcri = $totaldcri + $raw->dano_critico;
    $totalpcri = $totalpcri + $raw->prob_critico;

    if ($raw->vampirismo > $totalvamp) {
        $totalvamp = $raw->vampirismo;
    }

    if ($raw->perforacion_armadura > $totalperarm) {
        $totalperarm = $raw->perforacion_armadura;
    }

    $totalredrep = $totalredrep + $raw->reduccion_reposo;
    $totalenerrec = $totalenerrec + $raw->energia_recarga;
    $totalenermax = $totalenermax + $raw->energia_maxima;
    $totalarm = $totalarm + $raw->armadura;

    if ($raw->perforacion_escudo > $totalperesc) {
        $totalperesc = $raw->perforacion_escudo;
    }
}

$estadisticas = array();

if ($totalcristal != 0) {
    $estadisticas[] = "Daño de cristal: " . $totalcristal;
}

if ($totalarma != 0) {
    $estadisticas[] = "Daño de arma: " . $totalarma;
}

if ($totalescudo != 0) {
    $estadisticas[] = "Escudo: " . $totalescudo;
}

if ($totalsalud != 0) {
    $estadisticas[] = "Salud: " . $totalsalud;
}

if ($totalarm != 0) {
    $estadisticas[] = "Armadura: " . $totalarm;
}

if ($totalvelataque != 0) {
    $estadisticas[] = "Velocidad de ataque: " . $totalvelataque;
}

if ($totaldcri != 0) {
    $estadisticas[] = "Daño crítico: " . $totaldcri;
}

if ($totalpcri != 0) {
    $estadisticas[] = "Posibilidad de crítico: " . $totalpcri;
}

if ($totalvamp != 0) {
    $estadisticas[] = "Vampirismo: " . $totalvamp;
}

if ($totalperarm != 0) {
    $estadisticas[] = "Perforación de armadura: " . $totalperarm;
}

if ($totalredrep != 0) {
    $estadisticas[] = "Reducción de reposo: " . $totalredrep;
}

if ($totalenerrec != 0) {
    $estadisticas[] = "Recarga de energía: " . $totalenerrec;
}

if ($totalenermax != 0) {
    $estadisticas[] = "Energía máxima: " . $totalenermax;
}

if ($totalperesc != 0) {
    $estadisticas[] = "Perforación de escudo: " . $totalperesc;
}

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(70, 6, ' ', 0, 1, 'C');
$pdf->Cell(107, 6, utf8_decode('USUARIO: ' . $user->getUser()), 0, 1, 'C');
$pdf->Cell(70, 6, ' ', 0, 1, 'C');
foreach ($primeralista as $wer) {
    $pdf->Cell(127, 6, utf8_decode('FECHA DE PEDIDO: ' . $wer[2] . ' a las ' . $wer[3]), 0, 1, 'C');
}

$pdf->Cell(70, 6, ' ', 0, 1, 'C');
$pdf->Cell(70, 6, ' ', 0, 1, 'C');

$pdf->Cell(190, 6, 'Objetos', 0, 1, 'C', 1);

for ($j = 0; $j < sizeof($objetos); $j++) {
    $image = "C:/xampp/htdocs/vaince/Imagenes/" . $objetos[$j]->imagen;
    $img = imagecreatefrompng($image);

    imagealphablending($img, false);
    imagesavealpha($img, true);

    imageinterlace($img, 0);
    imagepng($img, "C:/xampp/htdocs/vaince/Imagenes/" . $objetos[$j]->imagen);
    $pdf->Cell(190, 6, $objetos[$j]->nombre, 0, 0, 'C');
    $pdf->Cell(90, 6, '', 0, 1, 'C');
    $pdf->Cell(90, 0, '', 0, 0, 'C');
    $pdf->Cell(10, 10, $pdf->Image('C:/xampp/htdocs/vaince/Imagenes/' . $objetos[$j]->imagen, $pdf->GetX(), $pdf->GetY(), 10), 1, 1, 'C');
    $pdf->Ln(5);
}

$pdf->Cell(70, 6, ' ', 0, 1, 'C');
$pdf->Cell(70, 6, ' ', 0, 1, 'C');
$pdf->Cell(190, 6, utf8_decode('ESTADÍSTICAS DE LA CONSTRUCCIÓN'), 0, 1, 'C');
$pdf->Cell(70, 6, ' ', 0, 1, 'C');
for ($h = 0; $h < sizeof($estadisticas); $h++) {
    $pdf->Cell(185, 6, utf8_decode($estadisticas[$h]), 0, 1, 'C');
}

if (isset($_POST['boton1'])) {
    $pdf->Output();
}else if (isset($_POST['boton2'])) {
    $pdf->Output('F', 'C:/xampp/htdocs/vaince/CatalogosAnteriores/Catalogo' . $user->getID() . '.pdf');
    $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'respaldos602@gmail.com';                     // SMTP username
            $mail->Password   = 'pandemia411';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('respaldos602@gmail.com', 'Administrador VAINCE');
            $mail->addAddress($user->getUser());     // Add a recipient

            // Attachments
            $mail->addAttachment('C:/xampp/htdocs/vaince/CatalogosAnteriores/Catalogo' . $user->getID() . '.pdf');         // Add attachments

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = utf8_decode('Carrito de pedido antiguo obtenido de la Plataforma VainCE.');
            $mail->Body    = utf8_decode('Se adjunta el informe del carrito generado por pedido tiempo atras desde la plataforma web VainCE.</b>');

            $mail->send();
            echo 'El mensaje se envio correctamente';
        }catch (Exception $e) {
            echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
        }
    }
    header('Location: http://localhost/vaince/vistas/nuevo.php?nueva=5&corr=1');