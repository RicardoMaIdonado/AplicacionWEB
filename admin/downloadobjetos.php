<?php
include '../plantillaC.php';
include_once '../includes/ConexionDB.php';
include 'objetos/manejoobjetos.php';

$productos = new ManejoObjetos();
$lista = array();
$lista = $productos->ListarObjetos();

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);

foreach ($lista as $reg) {
    $image = "C:/xampp/htdocs/vaince/Imagenes/" . $reg[17];
    $img = imagecreatefrompng($image);

    imagealphablending($img, false);
    imagesavealpha($img, true);

    imageinterlace($img, 0);
    imagepng($img, "C:/xampp/htdocs/vaince/Imagenes/" . $reg[17]);

    $pdf->Cell(80, 6, $reg[1], 1, 1, 'C', 1);
    $pdf->Cell(30, 30, $pdf->Image('C:/xampp/htdocs/vaince/Imagenes/' . $reg[17], $pdf->GetX(), $pdf->GetY(), 30), 1, 0, 'C');
    $pdf->Cell(30, 6, '', 0, 1, 'C');
    $pdf->Cell(30, 0, '', 0, 0, 'C');
    if ($reg[12] == 1) {
        $pdf->Cell(30, 6, '         Tipo: Arma', 0, 1, 'C');
    } else if ($reg[12] == 2) {
        $pdf->Cell(30, 6, '         Tipo: Cristal', 0, 1, 'C');
    } else if ($reg[12] == 3) {
        $pdf->Cell(30, 6, '         Tipo: Defensa', 0, 1, 'C');
    } else if ($reg[12] == 4) {
        $pdf->Cell(30, 6, '         Tipo: Utilidad', 0, 1, 'C');
    } else if ($reg[12] == 5) {
        $pdf->Cell(30, 6, '         Tipo: Consumible', 0, 1, 'C');
    }
    $pdf->Cell(30, 0, '', 0, 0, 'C');
    $pdf->Cell(30, 6, '     Precio: ' . $reg[2], 0, 1, 'C');
    $pdf->Ln(25);
}
$pdf->Output();

header('Location: catalogoobjetos.php');